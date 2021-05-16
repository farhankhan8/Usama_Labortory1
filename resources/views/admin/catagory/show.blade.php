
@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
    Category  Detail

    </div>

    <div class="card-body">
        <div class="form-group">
         <div class="row">
            <div class="col">
            <b> <label  for="user_id">Test Category</label></b>
            <p>{{  $catagoryId->Cname ?? '' }}</p>
            </div>
              <div class="col">
              <b> <label  for="user_id">Test in Category</label></b>
              <p> {{ $testInThisCategory ?? '' }}</p>
              </div>
             
          </div>
            
           
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
    Tests In<p>{{  $catagoryId->Cname ?? '' }}</p>



    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Event">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                      
                        <th>
                        Category 
                        </th>
                        <th>
                        Test
                        </th>
                        <th>
                        Patients
                        </th>
                      
                     
                        
                        <th>
                          
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testPerformeds as $key => $testPerformed)
                        <tr>
                            <td>

                            </td>
                          
                            <td>
                                {{ $testPerformed->Cname  ?? '' }}
                            </td>
                            <td>
                            {{ $testPerformed->name ?? '' }}
                            </td>
                            <td>
                            {{ $testPerformed->Pname ?? '' }}
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