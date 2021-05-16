@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Edit Test
    </div>
 
    <div class="card-body">


    <form method="POST" action="{{ route("availabel-tests-update", [$availableTest->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
             <div class="form-row">
    <div class="col-md-4 mb-3">
    <div class="form-group">
                <label  for="catagory_id ">Test Catagory</label>
                <select class="form-control"  name="catagory_id" id="catagory_id" required>
                    @foreach($catagorys as $id => $catagory)
                        <option  value="{{ $id }}" {{ $availableTest->catagory_id  == $id ? 'selected' : '' }}>{{ $catagory }}</option>
                    @endforeach
                </select>
                @if($errors->has('catagory_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('catagory_id') }}
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
                <label  for="name">Test Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $availableTest->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
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
                <label for="testFee">Test Fee</label>
                <input class="form-control {{ $errors->has('testFee') ? 'is-invalid' : '' }}" type="number" name="testFee" id="testFee" value="{{ old('testFee', $availableTest->testFee) }}" step="1">
                @if($errors->has('testFee'))
                    <div class="invalid-feedback">
                        {{ $errors->first('testFee') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
    </div>
  </div>






  <div class="form-row">
    <div class="col-md-4 mb-3">
       <div class="form-group">
                <label for="initialNormalValue">First Normal Range</label>
                <input class="form-control {{ $errors->has('initialNormalValue') ? 'is-invalid' : '' }}" type="number" name="initialNormalValue" id="initialNormalValue" value="{{ old('initialNormalValue', $availableTest->initialNormalValue) }}" step="1">
                @if($errors->has('initialNormalValue'))
                    <div class="invalid-feedback">
                        {{ $errors->first('initialNormalValue') }}
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
                <label for="finalNormalValue">Final Normal Range</label>
                <input class="form-control {{ $errors->has('finalNormalValue') ? 'is-invalid' : '' }}" type="number" name="finalNormalValue" id="finalNormalValue" value="{{ old('finalNormalValue', $availableTest->finalNormalValue) }}" step="0.01">
                @if($errors->has('finalNormalValue'))
                    <div class="invalid-feedback">
                        {{ $errors->first('finalNormalValue') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>


    <div class="col-md-4 mb-3">
     <div class="form-group">
                <label for="firstCriticalValue">First Critical Range</label>
                <input class="form-control {{ $errors->has('firstCriticalValue') ? 'is-invalid' : '' }}" type="number" name="firstCriticalValue" id="firstCriticalValue" value="{{ old('firstCriticalValue', $availableTest->firstCriticalValue) }}" step="0.01">
                @if($errors->has('firstCriticalValue'))
                    <div class="invalid-feedback">
                        {{ $errors->first('firstCriticalValue') }}
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



  <div class="form-row">
    <div class="col-md-4 mb-3">
       <div class="form-group">
                <label for="finalCriticalValue">Final Critical Range</label>
                <input class="form-control {{ $errors->has('finalCriticalValue') ? 'is-invalid' : '' }}" type="number" name="finalCriticalValue" id="finalCriticalValue" value="{{ old('finalCriticalValue', $availableTest->finalCriticalValue) }}" step="1">
                @if($errors->has('finalCriticalValue'))
                    <div class="invalid-feedback">
                        {{ $errors->first('finalCriticalValue') }}
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
                <label for="units">Test Units</label>
                <input class="form-control {{ $errors->has('units') ? 'is-invalid' : '' }}" type="text" name="units" id="units" value="{{ old('units', $availableTest->units) }}" >
                @if($errors->has('units'))
                    <div class="invalid-feedback">
                        {{ $errors->first('units') }}
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
  <button class="btn btn-primary" type="submit">Update</button>
</form>


@endsection