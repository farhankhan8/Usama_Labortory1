@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
    Patients Detail
    </div>

    <div class="card-body">
        <div class="form-group">
         <div class="row">
            <div class="col">
            <b> <label  for="user_id">Patient Name</label></b>
            <p>{{ $patient->Pname ?? '' }}</p>
            </div>
              <div class="col">
              <b> <label  for="user_id">Phone</label></b>
               <p>{{ $patient->phone ?? '' }}</p>
              </div>
              <div class="col">
            <b> <label  for="user_id">Email</label></b>
            <p>{{ $patient->email ?? '' }}</p>
            </div>
              <div class="col">
              <b> <label  for="user_id">Register Date</label></b>
               <p>{{ $patient->start_time ?? '' }}</p>
              </div>
              <div class="col">
            <b> <label  for="user_id">Birthday </label></b>
            <p>{{ $patient->dob ?? '' }}</p>
            </div>
              <div class="col">
              <b> <label  for="user_id">Tests Performed</label></b>
               <p>{{ $tests ?? '' }}</p>
              </div>
          </div>
            
           
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
    Tests Performed By <span>{{ $patient->Pname ?? '' }}</span>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Event">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                      
                        <th>
                        Test Name
                        </th>
                        <th>
                        Result
                        </th>
                        <th>
                        Range
                        </th>
                        <th>
                         Date
                        </th>
                     
                        
                        <th>
                          
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allTests as $key => $test)
                        <tr>
                            <td>

                            </td>
                          
                            <td>
                                {{ $test->name  ?? '' }}
                            </td>
                            <td>
                            {{ $test->testResult ?? '' }}
                            </td>
                            <td>
                            {{ $test->initialNormalValue ?? '' }}-{{ $test->finalNormalValue ?? '' }}
                            </td>
                            <td>
                            {{ $test->created_at ?? '' }}

                            </td>
                            <td>
                            <a class="btn btn-xs btn-info" href="#">
                           <span class="glyphicon glyphicon-cog"></span>
                           Generate Report
                           </a>
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