@extends('users.layout.index')
@section('content')

    <!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div id="logo">
        <h1><a href="{{url('/beranda')}}"><span></span>E-Schedule</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/beranda')}}">Home</a></li>
          <li><a id='container-HIDA' class="nav-link scrollto active" href="{{url('/about')}}">About</a></li>
          <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/team')}}">Team</a></li>
          <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/schedule')}}">schedule</a></li>
          <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/contact')}}">Contact</a></li>
          <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/login')}}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
</header>
    <!-- ======= End Header ======= -->

<!-- ======= About Us Section ======= -->
<section id="about-us" class="about-us padd-section">
<div class="container" data-aos="fade-up">
  <div class="row justify-content-center">

    <div class="col-md-5 col-lg-3">
      <img src="assets/img/about-img.png" alt="About" data-aos="zoom-in" data-aos-delay="100">
    </div>

    <div class="col-md-7 col-lg-5">
      <div class="about-content" data-aos="fade-left" data-aos-delay="100">

        <h2><span>E-Schedule</span></h2>
        <p>An information system website to monitor your schedule such as office schedules, class schedules, and so on.  A system that is easy to understand and can be accessed comfortably and efficiently on your handphone.
        </p>

        <ul class="list-unstyled">
          <li><i class="vi bi-chevron-right"></i>Matematika</li>
          <li><i class="vi bi-chevron-right"></i>Bahasa Indonesia</li>
          <li><i class="vi bi-chevron-right"></i>Bahasa Inggris</li>
          <li><i class="vi bi-chevron-right"></i>Fisika</li>
          <li><i class="vi bi-chevron-right"></i>Biologi</li>
        </ul>

      </div>
    </div>

  </div>
</div>
</section><!-- End About Us Section -->
@endsection