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
          <li><a id='container-HIDA' class="nav-link scrollto active" href="{{url('/team')}}">Team</a></li>
          <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/contact')}}">Contact</a></li>
          <li><a id='container-HIDA' class="nav-link scrollto" href="{{url('/login')}}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
</header>
    <!-- ======= End Header ======= -->
 
 <!-- ======= Team Section ======= -->
 <section id="team" class="padd-section text-center">

<div class="container" data-aos="fade-up">
  <div class="section-title text-center">

    <h2 id='container-PTm1'>Team Member</h2>
    <p id='container-pd0' class="separator">My Project Team E-Schedule</p>
  </div>

  <div class='row'>

  <div id='container-DFTeam' class="col-md-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
      <div id='container-KetuA' class="team-block bottom">
        <img id='container-TeM1' src="{{url('assets/img/team/Profile.png')}}" class="img-responsive" alt="img">
        <div class="team-content">
          <ul class="list-unstyled">
            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
            <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
          </ul>
          <span class='container-spa'>Ketua Kelompok</span>
          <br>
          <span class='container-spa'>Database</span>
          <h4>Fatchan Muhammad Hakim</h4>
        </div>
      </div>
    </div>

  </div>

  <div id='container-TB' class="row">

    <div class="col-md-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
      <div class="team-block bottom">
        <img id='container-TeM1' src="{{url('assets/img/team/2.jpg')}}" class="img-responsive" alt="img">
        <div class="team-content">
          <ul class="list-unstyled">
            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
            <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
          </ul>
          <span class='container-spa'>Anggota Kelompok</span>
          <br>
          <span class='container-spa'>Developer</span>
          <h4>Anisa Yuniarti</h4>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
      <div class="team-block bottom">
        <img id='container-TeM1' src="{{url('assets/img/team/3.jpg')}}" class="img-responsive" alt="img">
        <div class="team-content">
          <ul class="list-unstyled">
            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
            <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
          </ul>
          <span class='container-spa'>Anggota Kelompok</span>
          <br>
          <span class='container-spa'>Developer</span>
          <h4>Danang Tri Saputro</h4>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
      <div class="team-block bottom">
        <img id='container-TeM1' src="{{url('assets/img/team/3.jpg')}}" class="img-responsive" alt="img">
        <div class="team-content">
          <ul class="list-unstyled">
            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
            <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
          </ul>
          <span class='container-spa'>Anggota Kelompok</span>
          <br>
          <span class='container-spa'>Laporan</span>
          <h4>Fajar Nofrian Syahputra</h4>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
      <div class="team-block bottom">
        <img id='container-TeM1' src="{{url('assets/img/team/profile 1.png')}}" class="img-responsive" alt="img">
        <div class="team-content">
          <ul class="list-unstyled">
            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
            <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
          </ul>
          <span class='container-spa'>Anggota Kelompok</span>
          <br>
          <span class='container-spa'>Laporan</span>
          <h4>M. Khalfan Rama Darmawan</h4>
        </div>
      </div>
    </div>

  </div>
</div>
</section><!-- End Team Section -->
@endsection