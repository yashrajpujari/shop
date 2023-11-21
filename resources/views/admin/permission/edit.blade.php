@extends('layouts.dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center"> <!-- Center the row -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Permission</h5>
                    <div class="col-sm-10" >
                        
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('permission.update',$permission_data->id)}}"method="Post">
                        @csrf
                        @method('PUT')
                        <div class="addform-data">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text"  name="name" value="{{$permission_data->name}}"class="form-control" id="basic-default-name" placeholder="Permission Name">
                                   @error('name')
                                   <span class="text-danger">{{($message)}}</sapn>
                                    @enderror
                                   
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- End of centered row -->
</div>


@endsection
