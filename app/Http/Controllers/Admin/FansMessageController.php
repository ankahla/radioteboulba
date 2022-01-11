<?php

namespace App\Http\Controllers\Admin;

use App\FansMessage;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFansMessageRequest;
use App\Http\Requests\StoreFansMessageRequest;
use App\Http\Requests\UpdateFansMessageRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class FansMessageController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('fans_message_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fansMessages = FansMessage::all();

        return view('admin.fansMessages.index', compact('fansMessages'));
    }

    public function create()
    {
        abort_if(Gate::denies('fans_message_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fansMessages.create');
    }

    public function store(StoreFansMessageRequest $request)
    {
        $fansMessage = FansMessage::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $fansMessage->id]);
        }

        return redirect()->route('admin.fans-messages.index');
    }

    public function edit(FansMessage $fansMessage)
    {
        abort_if(Gate::denies('fans_message_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fansMessages.edit', compact('fansMessage'));
    }

    public function update(UpdateFansMessageRequest $request, FansMessage $fansMessage)
    {
        $fansMessage->update($request->all());

        return redirect()->route('admin.fans-messages.index');
    }

    public function show(FansMessage $fansMessage)
    {
        abort_if(Gate::denies('fans_message_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fansMessages.show', compact('fansMessage'));
    }

    public function destroy(FansMessage $fansMessage)
    {
        abort_if(Gate::denies('fans_message_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fansMessage->delete();

        return back();
    }

    public function massDestroy(MassDestroyFansMessageRequest $request)
    {
        FansMessage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('fans_message_create') && Gate::denies('fans_message_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new FansMessage();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
