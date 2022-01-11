<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\FansMessage;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreFansMessageRequest;
use App\Http\Requests\UpdateFansMessageRequest;
use App\Http\Resources\Admin\FansMessageResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FansMessageApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('fans_message_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FansMessageResource(FansMessage::all());
    }

    public function store(StoreFansMessageRequest $request)
    {
        $fansMessage = FansMessage::create($request->all());

        return (new FansMessageResource($fansMessage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FansMessage $fansMessage)
    {
        abort_if(Gate::denies('fans_message_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FansMessageResource($fansMessage);
    }

    public function update(UpdateFansMessageRequest $request, FansMessage $fansMessage)
    {
        $fansMessage->update($request->all());

        return (new FansMessageResource($fansMessage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FansMessage $fansMessage)
    {
        abort_if(Gate::denies('fans_message_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fansMessage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
