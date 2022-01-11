<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRadioProgramRequest;
use App\Http\Requests\StoreRadioProgramRequest;
use App\Http\Requests\UpdateRadioProgramRequest;
use App\RadioProgram;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RadioProgramController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('radio_program_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $radioPrograms = RadioProgram::all();

        return view('admin.radioPrograms.index', compact('radioPrograms'));
    }

    public function create()
    {
        abort_if(Gate::denies('radio_program_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.radioPrograms.create');
    }

    public function store(StoreRadioProgramRequest $request)
    {
        $radioProgram = RadioProgram::create($request->all());

        if ($request->input('file', false)) {
            $radioProgram->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $radioProgram->id]);
        }

        return redirect()->route('admin.radio-programs.index');
    }

    public function edit(RadioProgram $radioProgram)
    {
        abort_if(Gate::denies('radio_program_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.radioPrograms.edit', compact('radioProgram'));
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

        return redirect()->route('admin.radio-programs.index');
    }

    public function show(RadioProgram $radioProgram)
    {
        abort_if(Gate::denies('radio_program_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.radioPrograms.show', compact('radioProgram'));
    }

    public function destroy(RadioProgram $radioProgram)
    {
        abort_if(Gate::denies('radio_program_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $radioProgram->delete();

        return back();
    }

    public function massDestroy(MassDestroyRadioProgramRequest $request)
    {
        RadioProgram::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('radio_program_create') && Gate::denies('radio_program_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RadioProgram();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
