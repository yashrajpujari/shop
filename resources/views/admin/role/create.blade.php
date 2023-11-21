@extends('layouts.dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center"> <!-- Center the row -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Add Roles</h4>
                    <div class="col-sm-10">
                       
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('role.store')}}"method="Post">
                        @csrf
                        
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text"  name="name"class="form-control" id="basic-default-name" placeholder="Role Name">
                                        @error('name')
                                   <span class="text-danger">{{($message)}}</sapn>
                                    @enderror
                                   
                                    
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Permissions:</label>
                                <div class="col-sm-10">
                                <input class="form-check-input checkall" type="checkbox" value="" id="defaultCheck3" >
                               <label class="form-check-label" for="defaultCheck3"> Checked-All </label>
                                   
                                    
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name"></label>
                                
                                <div class="col-sm-10" style="display:inline-block;">
                                @foreach($permissions as $permission)
                                <span class="m-1">
                                <input class="form-check-input" name="permissions[]" {{ old('permissions') && in_array($permission->id, old('permissions')) ? 'checked':''}} type="checkbox" value="{{$permission->id}}" id="defaultCheck3" >
                               <label class="form-check-label" for="defaultCheck3">{{$permission->name}}</label>
                             </span>
                            @endforeach
                                   
                                    
                                </div>
                            </div>
                            

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                          
                                <button type="submit" class="btn btn-primary">Add Role</button>
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
   $(document).ready(function(){
    $('#defaultCheck3').click(function(){
        $('input[type=checkbox]').prop('checked',$(this).prop('checked'));
    });
   });
</script>

@endsection
