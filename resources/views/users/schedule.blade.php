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
          <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/about')}}">About</a></li>
          <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/team')}}">Team</a></li>
          <li><a id='container-HIDA' class="nav-link scrollto active" href="{{url('/schedule')}}">schedule</a></li>
          <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/contact')}}">Contact</a></li>
          <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/login')}}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
</header>
    <!-- ======= End Header ======= -->

<div class="container" data-aos="fade-up">

  <div class="section-title text-center">

    <h2 id='container-schd'>schedule</h2>
    <p id='container-scd' class="separator">My Class Schedule</p>
  </div>



</div>

@endsection