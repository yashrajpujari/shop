@extends('layouts.dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center"> <!-- Center the row -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Attribute</h5>
                    <div class="col-sm-10" style="text-align:end;">
                    <button type="btn" class="btn btn-primary" >Add Attribute value</button>
                        <button type="btn" class="btn btn-primary" id="add-permisson">+</button>
                    </div>
                </div>
                <div class="card-body">
                @if(session('message'))
          <div class="alert alert-danger" style="text-align:center;">{{ session('message') }}</div>
           @endif
                    <form action="{{route('attribute.update',$attribute->id)}}" method="Post">
                        @csrf
                        @method('PUT')
                        <div class="addform-data">


                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" value="{{$attribute->name}}" class="form-control" id="name" placeholder="Enter Attribute Name">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="status" class="form-label">status</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="">-select-option--</option>
                                        <option value="1"{{$attribute->status ==1?"selected":""}}>Active</option>
                                        <option value="2"{{$attribute->status ==2?"selected":""}}>Inactive</option>
                                    </select>
                                    @error('status')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                                </div>



                                <div class="col-md-4">
                                <label class="form-label">Is Variant :</label>
                                <div class="">
                                <div class="col-sm-10" style="display:inline-block;">
                                <span class="m-1">
                                <input class="form-check-input" name="Is_variant"{{($attribute->Is_variant) =='yes'?"checked":""}} type="checkbox" value="yes" id="defaultRadio2">
                                 <label for="defaultCheck3">Yes</label>
                             </span>
                             <span class="m-1">
                                <input class="form-check-input" name="Is_variant" type="checkbox" value="no" id="defaultRadio2"{{($attribute->Is_variant) =='no'?"checked":""}}>
                                 <label for="defaultCheck3">No</label>
                             </span>
                                                          
                               </div>
                                </div>
                                @error('Is_variant')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <h5> Attribute Value</h5>
                                </div>
                            </div>
                            @foreach($attributevalues as $attributevalue)
                            <div class="row mb-3 addnew-row">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="hidden" value="{{$attributevalue->id}}" name="value_id[]">
                                    <input type="text" name="attributename[]" value="{{$attributevalue->name}}" class="form-control" id="name" placeholder="Enter Attribute name">
                                </div>
                                <div class="col-md-4">
                                    <label for="status" class="form-label">status</label>
                                    <select name="attributestatus[]" id="status" class="form-select">
                                        <option value="">-select-option--</option>
                                        <option value="1"{{($attributevalue->status)==1?"selected":""}}>Active</option>
                                        <option value="2"{{($attributevalue->status)==2?"selected":""}}>Inactive</option>
                                    </select>
                                   </div>
                                   <div class="col-md-2 my-4">
                                   <label for="status" class="form-label"></label>
                                   <button  type="button"class="btn btn-danger mx-4" id ="remove"> Remove</button>
                                   </div>
                            </div>
                            @endforeach
                           
                        </div>

                        <div class="row j">
                            <div class="col-sm-10">
                            <button type="reset" class="btn btn-primary">Reset</button>

                                <button type="submit" class="btn btn-primary">update</button>
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
                                <div class="col-md-6">\
                                    <label for="name" class="form-label">Name</label>\
                                    <input type="text" name="attributename[]" value="" class="form-control" id="name" placeholder="Enter Attribute name">\
                                </div>\
                                <div class="col-md-4">\
                                    <label for="status" class="form-label">status</label>\
                                    <select name="attributestatus[]" id="status" class="form-select">\
                                        <option value="">-select-option--</option>\
                                        <option value="1">Active</option>\
                                        <option value="2">Inactive</option>\
                                    </select>\
                                   </div>\
                                   <div class="col-md-2 my-4">\
                                   <label for="status" class="form-label"></label>\
                                   <button  type="button"class="btn btn-danger mx-4" id ="remove"> Remove</button>\
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