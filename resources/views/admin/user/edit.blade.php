@extends('layouts.dashboard')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center"> 
        

    <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Add New User</h5>
                      <small class="text-muted float-end"></small>
                    </div>
                    <div class="card-body">
                      <form action="{{route('user.update',$userdata->id)}}"method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" class="form-control" name="name"value="{{$userdata->name}}" id="basic-icon-default-fullname" placeholder="yash pujari" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
                          </div>
                          @error('name')
                          <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-email">Email</label>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input type="text" id="basic-icon-default-email" name="email" value="{{$userdata->email}}"class="form-control" placeholder="yash pujari" aria-label="john.doe" aria-describedby="basic-icon-default-email2">
                            <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                          </div>
                          @error('email')
                          <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          
                          <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password32">Password</label>
                        <div class="input-group input-group-merge">
                          <input type="password" class="form-control"  name="password" value="{{old('password')}}"id="basic-default-password32" placeholder="············" aria-describedby="basic-default-password">
                          <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                        </div>

                      </div>
                      @error('password')
                          <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>
                        

                            <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-email">Roles:</label>
                          <div class="input-group input-group-merge">
                            
                          @foreach($roles as $role)
                          <span class="m-1">
                                <input class="form-check-input" name="role[]" type="checkbox" value="{{$role->id}}" id="defaultCheck3"
                               {{in_array($role->id,$userdata->roles()->pluck('id')->toarray())?"checked":""}}
                                >
                               <label class="form-check-label" for="defaultCheck3"> {{$role->name}} </label>
                              </span>
                                @endforeach
                          </div>
                          
                        </div>
                        <button type="reset" class="btn btn-primary mx-4">Reset</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                      </form>
                    </div>
                  </div>
                </div>
    </div> 
</div>
@endsection