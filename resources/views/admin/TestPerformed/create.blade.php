@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Performed New Test
    </div>

    <div class="card-body">



    <form method="POST" action="{{ route("test-performed") }}" enctype="multipart/form-data">
            @csrf
            
            
            <div class="form-row">
    <div class="col-md-4 mb-3">
    <div class="form-group">
                <label class="required" for="patient_id">Select Patient Name</label>
                <select class="form-control select2 {{ $errors->has('patients') ? 'is-invalid' : '' }}" name="patient_id" id="patient_id" required>
                    @foreach($patientNames as $id => $patientName)
                        <option value="{{ $id }}" {{ old('patient_id') == $id ? 'selected' : '' }}>{{ $patientName }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
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
                <label class="required" for="available_test_id">Select Test Name</label>
                <select class="form-control select2 {{ $errors->has('available_tests') ? 'is-invalid' : '' }}" name="available_test_id" id="available_test_id" required>
                    @foreach($availableTests as $id => $availableTest)
                        <option value="{{ $id }}" {{ old('available_test_id') == $id ? 'selected' : '' }}>{{ $availableTest }}</option>
                    @endforeach
                </select>
                @if($errors->has('available_tests'))
                    <div class="invalid-feedback">
                        {{ $errors->first('available_tests') }}
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
                <label class="required" for="Sname_id">Select Test Status</label>
                <select class="form-control select2 {{ $errors->has('Sname_id') ? 'is-invalid' : '' }}" name="Sname_id" id="Sname_id" required>
                    @foreach($stat as $id => $sta)
                        <option value="{{ $id }}" {{ old('Sname_id') == $id ? 'selected' : '' }}>{{ $sta }}</option>
                    @endforeach
                </select>
                @if($errors->has('Sname_id'))   
                    <div class="invalid-feedback">
                        {{ $errors->first('Sname_id') }}
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
                <label class="required" for="testResult">Test Result  Value</label>
                <input class="form-control  {{ $errors->has('testResult') ? 'is-invalid' : '' }}" type="number" name="testResult" id="testResult" value="{{ old('testResult') }}" required>
                @if($errors->has('testResult'))
                    <div class="invalid-feedback">
                        {{ $errors->first('testResult') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
    </div>


  </div>
  <div class="col-md-3 mb-3">
  <button class="btn btn-primary" type="submit">Submit</button>
  </div> 
  </form>
@endsection