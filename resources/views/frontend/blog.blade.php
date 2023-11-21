@extends('layouts.frontend')
@section('content')
<!--<div class="container-fluid p-0" style="position:relative">

  <img src="{{$blogs->GetFirstMediaUrl('image')}}" class="img-fluid" alt="Responsive image" >
    <div class="hero-slider-content" style="left:8%;">
        <h1 class="title">Page/{{$blogs->name}}</h1>

    </div>
</div>
<div class="container xl">
    <div class="row my-3">
        {!!$blogs->discription!!}
    </div>
</div>-->






<div class="blog-section">
        <div class="container py-5 my-5">
            <div class="row">
   
                <div class="col-lg-12">
                    <!-- Start Blog Single Content Area -->
                    <div class="blog-single-wrapper">
                        <div class="blog-single-img aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                            <img class="img-fluid" src="{{$blogs->GetFirstMediaUrl('image')}}" class="img-fluid" alt="Responsive image">
                        </div>
                        <ul class="post-meta aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                            <li>POSTED BY : <a href="#" class="author">Admin</a></li>
                            
                        </ul>
                        <h4 class="post-title aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">{!!$blogs->name!!}</h4>
                        <div class="para-content aos-init aos-animate" data-aos="fade-up" data-aos-delay="600">
                            {!!$blogs->discription!!}
                        </div>
                        
                    </div> <!-- End Blog Single Content Area -->
                    
                </div>
            </div>
        </div>
    </div>

@endsection