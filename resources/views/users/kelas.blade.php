@extends('users.layout.index')
@section('content')
<section id="pricing" class="padd-section text-cente">

      <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="section-title text-center">

          <h2>Kelas yang tersedia</h2>
          <p class="separator">dengan materi yang menunjang skill</p>
        </div>

        <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        @foreach($kelas as $k)
          <div class="col-md-6 col-lg-3">
            <div class="block-pricing">
              <div class="pricing-table">
                <h4>{{$k->nama}}</h4>
                <ul class="list-unstyled">
                    @foreach($materi as $m)
                    @if($m->kelas_id == $k->id)
                     <li><b>{{$m->nama}}</b></li>
                     @endif
                    @endforeach
                </ul>
                <div class="table_btn">
                  <a href="#" class="btn"><i class="bi bi-eye"></i>Detail</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        </div>
      </div>
    </section>
    @endsection