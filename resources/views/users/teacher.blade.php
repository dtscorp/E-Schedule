@extends('users.layout.index')
@section('content')
<section id="get-started" class="padd-section text-center">

<div class="container" data-aos="fade-up">
  <div class="section-title text-center">

    <h2>simple systeme fordiscount </h2>
    <p class="separator">Integer cursus bibendum augue ac cursus .</p>

  </div>
</div>

<div class="container">
  <div class="row">
@foreach($pengajar as $data)
    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
      <div class="feature-block">
      @empty($data->foto)
                    <img src="{{asset('admin/assets/images/nophoto.jpg')}}" class="card-img-top"  alt="...">
                    @else
                    <img src="{{asset('admin/assets/images')}}/{{$data->foto}}" class="card-img-top" style="width : 100%; height : 100%" alt="{{$data->foto}}">
                    @endempty
        <h4>{{$data->nama}}</h4>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        <a href="#">read more</a>

      </div>
    </div>
    @endforeach
  </div>
</div>

</section><!-- End Get Started Section -->
@endsection