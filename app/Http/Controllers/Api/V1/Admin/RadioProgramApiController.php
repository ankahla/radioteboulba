<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreRadioProgramRequest;
use App\Http\Requests\UpdateRadioProgramRequest;
use App\Http\Resources\Admin\RadioProgramResource;
use App\RadioProgram;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RadioProgramApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('radio_program_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RadioProgramResource(RadioProgram::all());
    }

    public function store(StoreRadioProgramRequest $request)
    {
        $radioProgram = RadioProgram::create($request->all());

        if ($request->input('file', false)) {
            $radioProgram->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
        }

        return (new RadioProgramResource($radioProgram))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RadioProgram $radioProgram)
    {
        abort_if(Gate::denies('radio_program_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RadioProgramResource($radioProgram);
    }

    public function update(UpdateRadioProgramRequest $request, RadioProgram $radioProgram)
    {
        $radioProgram->update($request->all());

        if ($request->input('file', false)) {
            if (!$radioProgram->file || $request->input('file') !== $radioProgram->file->file_name) {
                if ($radioProgram->file) {
                    $radioProgram->file->delete();
                }

                $radioProgram->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
            }
        } elseif ($radioProgram->file) {
            $radioProgram->file->delete();
        }

        return (new RadioProgramResource($radioProgram))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RadioProgram $radioProgram)
    {
        abort_if(Gate::denies('radio_program_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $radioProgram->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
