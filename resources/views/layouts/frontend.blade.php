<!DOCTYPE html>
<html lang="zxx">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
 @include('frontend/include.head')

 
</head>

<body>
  <!--header start-->
  @include('frontend/include.header')
  <!--header end-->

  <!--content-section-->
  @yield('content')
  <!--content-section end-->

    <!-- Start Footer Section -->
    @include('frontend/include.footer')
    <!-- end Footer Section -->
 

  

    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    @include('frontend/include.script')
</body>


</html>