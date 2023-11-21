@extends('layouts.frontend')
@section('content')
<div class="container-fluid p-0" style="position:relative">

  <img src="{{$page->GetFirstMediaUrl('image')}}" class="img-fluid" alt="Responsive image" >
    <div class="hero-slider-content" style="left:8%;">
        <h1 class="title">Page/{{$page->name}}</h1>

    </div>
</div>
<div class="container-fluid p-5 my-5">
<div class="para-content aos-init aos-animate" data-aos="fade-up" data-aos-delay="600">
                            {!!$page->description!!}
                        </div></div>
@endsection