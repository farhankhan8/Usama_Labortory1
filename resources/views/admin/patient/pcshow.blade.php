@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
    Patients Category Detail
    </div>

    <div class="card-body">
        <div class="form-group">
         <div class="row">
            <div class="col">
            <b> <label  for="user_id">Patient Category</label></b>
            <p>{{ $patientCategory->Pcategory ?? '' }}</p>
            </div>
              <div class="col">
              <b> <label  for="user_id">Discount</label></b>
               <p>{{ $patientCategory->discount ?? '' }}</p>
              </div>    
            

   </div>
   <div class="sticky-top">
              <a class="btn btn-primary" href="{{ route('patient-category') }}">
                <button class="btn btn-primary">
                   Back
                 </button>
               </a>
              </div>
</div>

@endsection