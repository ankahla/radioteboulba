<?php

namespace App\Http\Requests;

use App\RadioProgram;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRadioProgramRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('radio_program_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'time'  => [
                'string',
                'required',
            ],
            'file'  => [
                'required',
            ],
        ];
    }
}
