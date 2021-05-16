
@extends('layouts.admin')
@section('content')
<style type="text/css">
    form{
        margin: 20px 0;
    }
    form input, button{
        padding: 5px;
    }
    table{
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }
    table, th, td{
        border: 1px solid #cdcdcd;
    }
    table th, table td{
        padding: 10px;
        text-align: left;
    }
</style>
<div class="card">
    <div class="card-header">
    Create New Test
    </div>
    <div class="card-body">
    <form method="POST" action="{{ route("availale-tests-store") }}" enctype="multipart/form-data">
            @csrf   <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Test Category</label>
      <select class="form-control select2 {{ $errors->has('category_id') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categoryNames as $id => $categoryName)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $categoryName }}</option>
                    @endforeach
                </select>      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Test Name</label>
      <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Test Fee</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">Rs</span>
        </div>
        <input class="form-control {{ $errors->has('testFee') ? 'is-invalid' : '' }}" type="number" name="testFee" id="testFee" value="{{ old('testFee', '') }}" step="1"required>
        <div class="invalid-feedback">
          Please choose a username.
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-2 mb-3">
      <label for="validationCustom03">First Normal Range</label>
      <input class="form-control {{ $errors->has('initialNormalValue') ? 'is-invalid' : '' }}" type="number" name="initialNormalValue" id="initialNormalValue" value="{{ old('initialNormalValue', '') }}" step="1"required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationCustom04">Final Normal Range</label>
      <input class="form-control {{ $errors->has('finalNormalValue') ? 'is-invalid' : '' }}" type="number" name="finalNormalValue" id="finalNormalValue" value="{{ old('finalNormalValue', '') }}" step="1"required>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">First Critical Value</label>
      <input class="form-control {{ $errors->has('firstCriticalValue') ? 'is-invalid' : '' }}" type="number" name="firstCriticalValue" id="firstCriticalValue" value="{{ old('firstCriticalValue', '') }}" step="1"required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Final Critical Value</label>
      <input class="form-control {{ $errors->has('finalCriticalValue') ? 'is-invalid' : '' }}" type="number" name="finalCriticalValue" id="finalCriticalValue" value="{{ old('finalCriticalValue', '') }}" step="1"required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationCustom05">Test Units</label>
      <input class="form-control {{ $errors->has('units') ? 'is-invalid' : '' }}" type="text" name="units" id="units" value="{{ old('name', '') }}" required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>
    <div class="col-md-2 mb-3">
    <label>Select Items:</label> 
        <select id="namee"class="selectpicker"name="inventory_id" > 
        @foreach($inventoryes as $id => $inventory)
                        <option value="{{ $inventory }}" {{ old('inventory_id') == $id ? 'selected' : '' }}>{{ $inventory }}</option>
        @endforeach
        </select>
        </div>
        <div class="col-md-3 mb-3">
      <input class="form-control {{ $errors->has('finalNormalValue') ? 'is-invalid' : '' }}" type="number" name="itemUsed" id="itemUsed" value="{{ old('itemUsed', '') }}" step="1"required placeholder="Enter Quantity Used For Test">
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>
     
        <div class="col-md-2 mb-3">
        <input type="button" class="add-row btn btn-xs btn-primary" value="Add Items">
        <button type="button" class="delete-row btn btn-xs btn-danger">Delete Row</button>
        </div>

    <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>Inventory Name</th>
                <th>Item Used</th>
                <!-- <th>Email</th> -->
            </tr>
        </thead>
        <tbody>
            <tr>
        
            </tr>
        </tbody>
    </table>
  </div>
  <button class="btn btn-primary" type="submit">Submit</button>
</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".add-row").click(function(){
            var name = $("#namee").val();
            var nameQuantity = $("#itemUsed").val();

            var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + name + "</td><td> "+ nameQuantity + "</td></td></tr>";
            
            $("table tbody").append(markup);
        });

        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });

</script>

@endsection