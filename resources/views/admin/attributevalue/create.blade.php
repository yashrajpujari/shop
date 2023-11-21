@extends('layouts.dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center"> <!-- Center the row -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add Attribute value</h5>
                    <div class="col-sm-10" style="text-align:end;">
                        <button type="btn" class="btn btn-primary" id="add-permisson">Add more</button>
                    </div>
                </div>
                <div class="card-body">
                @if(session('message'))
          <div class="alert alert-danger" style="text-align:center;">{{ session('message') }}</div>
           @endif
                    <form action="{{route('attributevalue.store')}}" method="Post">
                        @csrf
                        <div class="addform-data">


                            <div class="row mb-3">
                            <div class="col-md-4">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name[]" value="" class="form-control" id="name" placeholder="Enter Attribute Name">
                                </div>
                            <div class="col-md-4">
                                    <label for="status" class="form-label">Attribute id</label>
                                    <select name="attribute_id[]" id="status" class="form-select">
                                        <option value="">-select-option--</option>
                                        @foreach($attributevalues as $attribute)
                                        <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                                        @endforeach
                                       
                                    </select>
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="status" class="form-label">status</label>
                                    <select name="status[]" id="status" class="form-select">
                                        <option value="">-select-option--</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>



                             
                            </div>
                        </div>

                        <div class="row j">
                            <div class="col-sm-10">
                            <button type="reset" class="btn btn-primary">Reset</button>

                                <button type="submit" class="btn btn-primary mx-2">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- End of centered row -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#add-permisson').click(function() {
            var html = '<div class="row mb-3 addnew-row">\
            <div class="col-md-4">\
                                    <label for="name" class="form-label">Name</label>\
                                    <input type="text" name="name[]" value="" class="form-control" id="name" placeholder="Enter Attribute Name">\
                                </div>\
                            <div class="col-md-4">\
                                    <label for="attribute_id" class="form-label">attribute_id</label>\
                                    <select name="attribute_id[]" id="status" class="form-select">\
                                        <option value="">-select-option--</option>\
                                        @foreach($attributevalues as $attribute)\
                                        <option value="{{$attribute->id}}">{{$attribute->name}}</option>\
                                        @endforeach\
                                    </select>\
                                </div>\
                                 <div class="col-md-4">\
                                    <label for="status" class="form-label">status</label>\
                                    <div class="d-flex">\
                                    <select name="status[]" id="status" class="form-select" style="width:70%;">\
                                        <option value="">-select-option--</option>\
                                        <option value="1">Active</option>\
                                        <option value="2">Inactive</option>\
                                    </select>\
                                    <button  type="button"class="btn btn-danger" id ="remove" style="margin-left:10px;"> Remove</button>\
                                    </div>\
                                </div>\
                                 </div> ';
            $('.addform-data').append(html);
        });

        $('.addform-data').on('click', '#remove', function() {
            $(this).closest('.addnew-row').remove();
        });
    });
</script>
@endsection

                             