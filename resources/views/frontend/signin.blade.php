@extends('layouts.frontend')
@section('content')
<section class="bg-dark section-top-gap-100" style="display:block;">
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="{{asset('frontend/assets/images/banner/banner-style-6-img-1.jpg')}}" alt="Sample photo" class="img-fluid userform" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>


            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                @if(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <h3 class="mb-5 text-uppercase">Sign In</h3>
                <form action="{{route('customer/login')}}" method="Post">
                  @csrf


                  <div class="row">
                    <div class="col-md-12 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="form3Example1m1">email</label>
                        <input type="email" name="email" id="form3Example1m1" placeholder="@.com" value="{{old('email')}}" class="form-control form-control-lg" />
                      </div>
                      @error('email')
                      <div class="text text-danger">{{$message}}</div>
                      @enderror
                    </div>

                  </div>
                  <!-- Password Field -->
                  <div class="row">
                    <div class="col-md-12 mb-4">
                      <div class="form-outline relative">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" value="{{ old('password') }}" name="password" id="password" placeholder="***********" class="form-control form-control-lg" />
                        <div class="absolte">

                          <i class="fa fa-eye" id="toggleConfirmPassword" onclick="togglePasswordVisibility()"></i>

                          </button>
                        </div>

                      </div>
                      @error('password')
                      <div class="text text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    </div>
                    











                    <div class="d-flex justify-content-end pt-3">
                      <button type="reset" class="btn btn-light btn-lg mx-4" style="background:black;color:white;">Reset all</button>
                      <button type="submit" class="btn btn-warning btn-lg ms-2" style="background:#047B42;color:white;">login</button>
                    </div>

                  </div>
                </form>
              </div>



            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function togglePasswordVisibility() {
    var passwordField = document.getElementById("password");
    var confirmPasswordField = document.getElementById("confirmPassword");

    if (passwordField.type === "password") {
      passwordField.type = "text";
      confirmPasswordField.type = "text";
    } else {
      passwordField.type = "password";
      confirmPasswordField.type = "password";
    }
  }
</script>


@endsection