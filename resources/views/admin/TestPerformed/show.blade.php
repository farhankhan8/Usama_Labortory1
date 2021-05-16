
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Test Deatail
    </div>

    <div class="card-body">            
            <div class="form-row">
    <div class="col-md-2 mb-3">
    <div class="form-group">
               <b> <label  for="user_id">Test Catagory</label></b>
              
            <p>{{ $getavailableTestName->catagory->Cname }}</p>

            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-2 mb-3">
           <div class="form-group">
                <b><label  for="available_test_id">Test Name</label></b>
               


                <p>{{ $getavailableTestName->name }}</p>

            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>


    
    <div class="col-md-2 mb-3">
           <div class="form-group">
                <b><label  for="available_test_id">Patient Name</label></b>
               <p> {{ $getpatient->Pname }}</p>


            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>








    <div class="col-md-2 mb-3">
           <div class="form-group">
                <b><label  for="state">Stander Charges</label></b>
             
<p>{{ $getavailableTestName->testFee+100 }}</p>


            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    
    <div class="col-md-2 mb-3">
        <div class="form-group">
                <b><label  for="start_time">Charged Amount</label></b>
           

                <p>{{ $getavailableTestName->testFee }}</p>


            </div>
    </div>
    <div class="col-md-2 mb-3">
        <div class="form-group">
                <b><label  for="">Status</label></b>
             <p>
                @if ($getSatusData->Sname  == 'Progressing')
                            <button class="btn btn-xs btn-info">{{ $getSatusData->Sname  ?? '' }}</button>
                               @elseif ($getSatusData->Sname  == 'Verified')
                               <button class="btn btn-xs btn-primary">{{ $getSatusData->Sname  ?? '' }}</button>
                          
                               @elseif ($getSatusData->Sname  == 'Not Received')
                               <button class="btn btn-xs  btn-warning">{{ $getSatusData->Sname  ?? '' }}</button>
                               @elseif ($getSatusData->Sname  =='Cancelled')
                               <button class="btn btn-xs btn-danger">{{ $getSatusData->Sname  ?? '' }}</button>
                             @else
                             I don't have any records!
                                 @endif
</p>

            </div>
    </div>



    
  </div>
  </div>


  <div class="card-body">



   
            
            
<div class="form-row">
<div class="col-md-2 mb-3">
<div class="form-group">
    <b><label  for="user_id">Test Time</label></b>
    <p>{{ $testPerformedsId->created_at }}</p>




</div>
<div class="valid-feedback">
Looks good!
</div>
</div>



<div class="col-md-2 mb-3">
<div class="form-group">
    <b><label  for="available_test_id">Reporting Time</label></b>
   
    <p>{{ $testPerformedsId->created_at }}</p>


</div>
<div class="valid-feedback">
Looks good!
</div>
</div>



<div class="col-md-2 mb-3">
<div class="form-group">
    <b><label  for="available_test_id">Normal Range</label></b>
   
<p>  {{ $getavailableTestName->initialNormalValue }}{{ $getavailableTestName->units ?? '' }}-{{ $getavailableTestName->finalNormalValue }}{{ $getavailableTestName->units ?? '' }}</p>


</div>
<div class="valid-feedback">
Looks good!
</div>
</div>








<div class="col-md-2 mb-3">
<div class="form-group">
  <b><label for="state">Test Result</label></b>
 
  <p>{{ $testPerformedsId->testResult }}</p>



</div>
<div class="valid-feedback">
Looks good!
</div>
</div>

<div class="col-md-2 mb-3">
<div class="form-group">
   


</div>
</div>
<div class="col-md-2 mb-3">
<div class="form-group">
    


</div>
</div>







</div>
<div>




   
            
            
<div class="form-row">
<div class="col-md-12 mb-5">
<div class="form-group">
    <b><label  for="user_id">Result</label></b>
    <div style="background-color:gray;color:white;padding:20px;">
  <p>London is the capital city of England.London is the capital city of England.London is the capital city of England.London is the capital city of England. It is the most populous city in the United Kingdom, with a metropolitan area of over 13 million inhabitants.
  </p>
</div> 




</div>
<div class="valid-feedback">
Looks good!
</div>
</div>


</div>

  <div class="col-md-3 mb-3">
  <button class="btn btn-primary"onclick="window.print()">Print Report</button>
  </div> 




  
@endsection