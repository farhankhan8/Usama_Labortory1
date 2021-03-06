@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("patient-create") }}">
            Register New Patient
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
    List of All Patients
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Event">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Id
                        </th>
                        <th>
                        Patient Name
                        </th>
                        <th>
                        Catagory
                        </th>
                        <th>
                        Phone
                        </th>
                        <th>
                         Birthday
                        </th>
                        <th>
                        Email
                        </th>
                        <th>
                        Start Time

                        </th>
                        
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $key => $patient)
                        <tr data-entry-id="{{ $patient->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $patient->id ?? '' }}
                            </td>
                            <td>
                                {{ $patient->Pname  ?? '' }}
                            </td>
                            <td>
                            General
                            </td>
                            <td>
                                {{ $patient->phone ?? '' }}
                            </td>
                            <td>
                                {{ $patient->dob ?? '' }}
                            </td>
                            <td>
                            {{ $patient->email ?? '' }}
                            </td>
                            <td>
                                {{ $patient->start_time ?? '' }}
                            </td>
                            <td>
                                    <a class="btn btn-xs btn-primary" href="{{ route('patient-show', $patient->id) }}">
                                        {{ trans('global.view') }}
                                    </a>

                                    <a class="btn btn-xs btn-info" href="{{ route('patient-edit', $patient->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                    <form  method="POST" action="{{ route("patient-delete", [$patient->id]) }}" onsubmit="return confirm('{{ trans('Are You Sure to Deleted  ?') }}');"  style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>

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
@can('event_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.events.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Event:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
    
})

</script>
@endsection