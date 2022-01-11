@extends('layouts.admin')
@section('content')
@can('radio_program_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.radio-programs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.radioProgram.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.radioProgram.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-RadioProgram">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.radioProgram.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.radioProgram.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.radioProgram.fields.time') }}
                        </th>
                        <th>
                            {{ trans('cruds.radioProgram.fields.file') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($radioPrograms as $key => $radioProgram)
                        <tr data-entry-id="{{ $radioProgram->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $radioProgram->id ?? '' }}
                            </td>
                            <td>
                                {{ $radioProgram->title ?? '' }}
                            </td>
                            <td>
                                {{ $radioProgram->time ?? '' }}
                            </td>
                            <td>
                                @if($radioProgram->file)
                                    <a href="{{ $radioProgram->file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('radio_program_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.radio-programs.show', $radioProgram->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('radio_program_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.radio-programs.edit', $radioProgram->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('radio_program_delete')
                                    <form action="{{ route('admin.radio-programs.destroy', $radioProgram->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('radio_program_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.radio-programs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-RadioProgram:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection