@extends('admin.layout.index')
@section('content')
<section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="" alt="Profile">
              <h2></h2>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Detail Kelas</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Kode Kelas</div>
                    <div class="col-lg-9 col-md-8">{{$kelas->kode_kelas}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama Kelas</div>
                    <div class="col-lg-9 col-md-8">{{$kelas->nama}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Deksripsi</div>
                    <div class="col-lg-9 col-md-8">{{$kelas->desk}}</div>
                  </div>
                </div>
              </div><!-- End Bordered Tabs -->
              <a href="{{Route('kelas.index')}}" class="btn btn-primary">Go Back</a>
            </div>
          </div>

        </div>
      </div>
</section>
@endsection