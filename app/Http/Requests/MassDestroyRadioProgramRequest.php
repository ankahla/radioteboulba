<?php

namespace App\Http\Requests;

use App\RadioProgram;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRadioProgramRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('radio_program_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:radio_programs,id',
        ];
    }
}
