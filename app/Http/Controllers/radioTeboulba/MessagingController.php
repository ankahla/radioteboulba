<?php

namespace App\Http\Controllers\RadioTeboulba;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\User;
use App\Message;
use App\Conversation;
use Auth;
use App\Notifications\NewMessage;

class MessagingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchMessages(Request $request)
    {
        //Read all this user NewMessage Notifications
        Auth::user()->unreadNotifications->where('type','App\Notifications\NewMessage')->markasread();

        //When i fetch Messages the last message will be displayed
        $lastMessage = new Message;
        $lastMessage = Message::where('conversation_id', '=',  $request->id)->latest()->first();
        $lastMessage->seen = true;
        $lastMessage->save();

        $result = DB::table('messages')
            ->where('conversation_id', '=', $request->id)
            ->orderBy('created_at')
            ->get();

         return response()->json($result);
    }

    public function fetchConversations()
    {
        // //Read all this user NewMessage Notifications
        // Auth::user()->unreadNotifications->where('type','App\Notifications\NewMessage')->markasread();

        $id = auth()->id();
        $conversations = DB::table('conversations')
                        ->where('user1_id', '=', Auth::user()->id)
                        ->orWhere('user2_id', '=', Auth::user()->id)
                        ->orderBy('updated_at','desc')
                        ->get();

        return view('messaging',[ 'conversations' => $conversations ]);

    }


    public function sendMessage(Request $request)
    {

        if($request->conversation_id == null)
        {
            //checking if sender or receiver had a conversation before
            $hadAConversation = DB::table('conversations')
            ->where([
                        ['user1_id', '=', Auth::user()->id],
                        ['user2_id', '=', $request->id]
                    ])
            ->orWhere([
                        ['user2_id', '=', Auth::user()->id],
                        ['user1_id', '=', $request->id]
                      ])
            ->value('id');

            if($hadAConversation == null)
            {
                //new conversation
                $conversation = new Conversation;
                $conversation->user1_id = Auth::user()->id;
                $conversation->user2_id = $request->id;
                $conversation->save();

                //new message
                $message = new Message;
                $message->sender_id = Auth::user()->id; //auth
                $message->content = $request->content;
                $message->conversation_id = $conversation->id;
                $message->save();

                $notificationData = [
                    'sender_id' => Auth::user()->id,
                    'sender_name' => Auth::user()->name,
                    'message_content' => $message->content,
                    'sender_img' => auth::user()->user_img
                ];

                //send NewMessage Notification to receiver user
                $receiverUser = User::find($request->id);
                $receiverUser->notify(new NewMessage($notificationData));


            }
            else {

                //update the conversation
                $conversation = Conversation::find($hadAConversation)->first();
                $conversation->updated_at = date('Y-m-d H:i:s');
                $conversation->save();

                //new message
                $message = new Message;
                $message->sender_id = Auth::user()->id; //auth
                $message->content = $request->content;
                $message->conversation_id = $hadAConversation;
                $message->save();


                $notificationData = [
                    'sender_id' => Auth::user()->id,
                    'sender_name' => Auth::user()->name,
                    'message_content' => $message->content,
                    'sender_img' => auth::user()->user_img
                ];


                 //send NewMessage Notification to receiver user
                $receiverUser = User::find($request->id);
                $receiverUser->notify(new NewMessage($notificationData));

            }
        }
        else
        {
            //update the conversation
            $conversation = Conversation::find($request->conversation_id)->first();
            $conversation->updated_at = date('Y-m-d H:i:s');
            $conversation->save();

            //new message
            $message = new Message;
            $message->sender_id = Auth::user()->id; //auth
            $message->content = $request->content;
            $message->conversation_id = head($request->conversation_id);
            $message->save();

            //send NewMessage Notification to receiver user

            $notificationData = [
                'sender_id' => Auth::user()->id,
                'sender_name' => Auth::user()->name,
                'message_content' => $message->content,
                'sender_img' => auth::user()->user_img
            ];
            $receiverUser = User::find($request->id);
            $receiverUser->notify(new NewMessage($notificationData));

        }

        return response(['status'=>'Message private sent successfully','message'=>$message]);

    }
}
