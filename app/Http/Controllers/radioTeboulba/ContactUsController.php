<?php

namespace App\Http\Controllers\RadioTeboulba;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class ContactUsController extends Controller
{
    //
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('radioteboulba.contact-us');
    }
    public function sendMail(Request $request){

        $this->validate($request, [
            'name'     =>  'required',
            'email'  =>  'required|email',
            'phone'  =>  'required|numeric',
            'message' =>  'required',
            'g-recaptcha-response' => 'required|captcha',

        ]);

        $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message,
            'email' => $request->email,
            'phone' => $request->phone
        );

        Mail::to('radioteboulbatn@gmail.com')->send(new SendMail($data));
        return back()->with('success', '!شكرا على مراسلتنا');

    }
}
