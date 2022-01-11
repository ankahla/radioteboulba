<?php

namespace App\Http\Requests;

use App\FansMessage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreFansMessageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('fans_message_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [];
    }
}
