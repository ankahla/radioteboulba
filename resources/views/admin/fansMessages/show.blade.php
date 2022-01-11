@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.fansMessage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fans-messages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fansMessage.fields.id') }}
                        </th>
                        <td>
                            {{ $fansMessage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fansMessage.fields.title') }}
                        </th>
                        <td>
                            {{ $fansMessage->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fansMessage.fields.content') }}
                        </th>
                        <td>
                            {!! $fansMessage->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fansMessage.fields.content') }}
                        </th>
                        <td>
                            {!! $fansMessage->content !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fans-messages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
