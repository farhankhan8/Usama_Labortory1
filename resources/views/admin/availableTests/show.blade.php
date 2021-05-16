
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
              
            <p>{{ $availableTestId->catagory->Cname ?? '' }}</p>

            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  


    
    <div class="col-md-2 mb-3">
           <div class="form-group">
                <b><label  for="available_test_id">Test Name</label></b>
               <p> {{ $availableTestId->name ?? '' }}</p>


            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>








    <div class="col-md-2 mb-3">
           <div class="form-group">
                <b><label  for="state">Test Fee</label></b>
             
<p>{{ $availableTestId->testFee }}</p>


            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    
    <div class="col-md-2 mb-3">
        <div class="form-group">
                <b><label  for="start_time">Charged Amount</label></b>
           

                <p>{{ $availableTestId->testFee }}</p>


            </div>
    </div>



    

<div class="col-md-2 mb-3">
<div class="form-group">
    <b><label  for="available_test_id">Normal Range</label></b>
   
<p>  {{ $availableTestId->initialNormalValue }}{{ $availableTestId->units ?? '' }}-{{ $availableTestId->finalNormalValue }}{{ $availableTestId->units ?? '' }}</p>


</div>
<div class="valid-feedback">
Looks good!
</div>
</div>



<div class="col-md-2 mb-3">
<div class="form-group">
    <b><label  for="available_test_id">Units</label></b>
   
<p>  {{ $availableTestId->units }}</p>


</div>
<div class="valid-feedback">
Looks good!
</div>
</div>





    
  </div>
  </div>


  <div class="card-body">











</div>
<div>


<div class="card-body">            
            <div class="form-row">
    <div class="col-md-2 mb-3">
    <div class="form-group">
              

            </div>
      <div class="valid-feedback">
      </div>
    </div>

   
            
            
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
  <a class="btn btn-primary" href="{{ route('available-tests') }}">
  <button class="btn btn-primary">
  Back
  </button>
  </a>
  </div> 




  
@endsection