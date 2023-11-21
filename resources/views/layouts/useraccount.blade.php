@extends('layouts/frontend')
@section('content')

<div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">My Account</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="{{route('home')}}">Home</a></li>
                                    <li><a href="{{route('home')}}">Shop</a></li>
                                    <a href="{{ request()->url() }}">{{ Str::after(request()->url(), 'http://127.0.0.1:8000/') }}</a>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="account-dashboard">
        <div class="container shadow p-3 mb-5 bg-white rounded">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="userimg">
                    <img src="{{asset('frontend/assets/images/banner/banner-style-6-img-1.jpg')}}" alt="Sample photo" class="d-block rounded" style=" width:200px; " />

                </div>
                    <!-- Nav tabs -->
                    @include('frontend/myaccount/accountsidebar')
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    @yield('dcontent')
                    <div>
                </div>
            </div>
        </div>
    </div>
@endsection