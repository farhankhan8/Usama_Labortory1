@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Edit Test
    </div>

    <div class="card-body">
 
 
    
    <form method="POST" action="{{ route("performed-test-update", [$performed->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
    <div class="col-md-4 mb-3">
    <div class="form-group"> 
                <label class="required" for="available_test_id">Select Test Name</label>
                <select class="form-control"name="available_test_id" id="available_test_id" required>
                    @foreach($getNameFromAvailbles as $id => $getNameFromAvailble)
                        <option  value="{{ $id }}" {{ $performed->available_test_id   == $id ? 'selected' : '' }}>{{ $getNameFromAvailble }}</option>

                    @endforeach
                </select>
                @if($errors->has('available_test_id '))
                    <div class="invalid-feedback">
                        {{ $errors->first('available_test_id ') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>


    <div class="col-md-4 mb-3">
    <div class="form-group">
                <label class="required" for="patient_id">Select Patient Name</label>
                <select class="form-control"  name="patient_id" id="patient_id" required>
                    @foreach($patientNames as $id => $patientName)
                        <option value="{{ $id }}" {{ $performed->patient_id == $id ? 'selected' : '' }}>{{ $patientName }}</option>
                    @endforeach
                </select>
                @if($errors->has('patient_id '))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient_id ') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    


    <div class="col-md-4 mb-3">                                                                                                                                                                     
    <div class="form-group">
                <label class="required" for="Sname_id ">Select State</label>
                <select class="form-control"name="Sname_id" id="Sname_id" required>

                    @foreach($books as $id => $book)
                        <option value="{{ $id }}" {{ $performed->Sname_id == $id ? 'selected' : '' }}>{{ $book }}</option>
                    @endforeach
                </select>
                @if($errors->has('Sname_id '))
                    <div class="invalid-feedback">
                        {{ $errors->first('Sname_id ') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
    </div>
  </div>






  <div class="form-row">
    <div class="col-md-4 mb-3">
       <div class="form-group">
                <label for="testResult">Test Result</label>
                <input class="form-control {{ $errors->has('testResult') ? 'is-invalid' : '' }}" type="number" name="testResult" id="testResult" value="{{ old('testResult', $performed->testResult) }}" step="0.01">
                @if($errors->has('testResult'))
                    <div class="invalid-feedback">
                        {{ $errors->first('testResult') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>




    <div class="col-md-4 mb-3">
     <div class="form-group">
                <label for="testResult"></label>
                <!-- <input class="form-control {{ $errors->has('testResult') ? 'is-invalid' : '' }}" type="number" name="testResult" id="testResult" value="{{ old('testResult', $performed->testResult) }}" step="0.01"> -->
                @if($errors->has('testResult'))
                    <div class="invalid-feedback">
                        {{ $errors->first('testResult') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>


  




 


  
    <div class="col-md-3 mb-3">
      <label for="validationServer05"></label>
      <!-- <input type="text" class="form-control is-invalid" id="validationServer05" placeholder="Zip" required> -->
      <div class="invalid-feedback">
        <!-- Please provide a valid zip. -->
      </div>
    </div>
  </div>







  <div class="form-group">
    <div class="form-check">
      <label class="form-check-label" for="invalidCheck3">
      </label>
      <div class="invalid-feedback">
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>


@endsection