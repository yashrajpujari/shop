@extends('layouts/useraccount')
@section('dcontent')
<div>
                        <h3>Account details </h3>
                        @if(session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                        @endif
                        <div class="login">
                            <div class="login_form_container">
                                @if(session('error'))
                                <div class="alert alert-danger">{{session('error')}}</div>
                                @endif
                                <div class="account_login_form">
                                    <form action="{{route('user/update',$user->id)}}" method="Post">

                                        @csrf
                                        <div class="default-form-box mb-20">
                                            <label> Name</label>
                                            <input type="text" name="name" value="{{$user->name}}">
                                        </div>
                                        @error('name')
                                        <div class="text text-danger">{{$message}}</div>
                                        @enderror
                                        
                                        <div class="default-form-box mb-20">
                                            <label>Email</label>
                                            <input type="text" name="email"value="{{$user->email}}">
                                        </div>
                                        @error('email')
                                        <div class="text text-danger">{{$message}}</div>
                                        @enderror
                                       

                                        <div class="default-form-box mb-20">
                                            <label>New Password</label>
                                            <input type="password" name="newpassword" >
                                        </div>
                                        @error('newpassword')
                                        <div class="text text-danger">{{$message}}</div>
                                        @enderror
                                        <br>
                                        <div class="default-form-box mb-20">
                                            <label>confirm Password</label>
                                            <input type="password" name="c_password">
                                        </div>
                                        @error('c_password')
                                        <div class="text text-danger">{{$message}}</div>
                                        @enderror
                                        <br>

                                        <div class="save_button mt-3">
                                            <button class="btn btn-md btn-black-default-hover mx-2" type="reset">reset</button>
                                            <button class="btn btn-md btn-black-default-hover" type="submit">update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection