@extends('layouts.dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center"> <!-- Center the row -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Attribute</h5>
                    <div class="col-sm-10" style="text-align:end;">
                     
                    </div>
                </div>
                <div class="card-body">
                @if(session('message'))
          <div class="alert alert-danger" style="text-align:center;">{{ session('message') }}</div>
           @endif
                    <form action="{{route('attributevalue.update',$attribute->id)}}" method="Post">
                        @csrf
                        @method('PUT')
                        <div class="addform-data">


                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" value="{{$attribute->name}}" class="form-control" id="name" placeholder="Enter Attribute Name">
                                    @error('name')
                                    <div class="text-danger">{{($message)}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="status" class="form-label">attribute_id</label>
                                    <select name="attribute_id" id="status" class="form-select">
                                        <option value="">-select-option--</option>
                                        @foreach($attributes as $attrib)
                                        <option value="{{$attrib->id}}" {{($attrib->id) == $attribute->attribute_id ? 'selected' : '' }}>{{ $attrib->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('attribute_id')
                                    <div class="text-danger">{{($message)}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="status" class="form-label">status</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="">-select-option--</option>
                                        <option value="1"{{($attribute->status==1)?"selected":""}}>Active</option>
                                        <option value="2"{{($attribute->status==2)?"selected":""}}>Inactive</option>
                                    </select>
                                    @error('status')
                                    <div class="text-danger">{{($message)}}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="row j">
                            <div class="col-sm-10">
                            <button type="reset" class="btn btn-primary">Reset</button>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- End of centered row -->
</div>

@endsection