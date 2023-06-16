@extends('admin.layout.index')
@section('content')
<div class="row">
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2"> 
              <div class="card-body pt-3 p-4">
                <h4 class="fw-semibold fs-4">Peserta</h4>
                <h6 class="fw-semibold fs-4 mb-0">{{$peserta_count}}</h6>
                <div class="d-flex align-items-center justify-content-between">
                </div> 
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2"> 
              <div class="card-body pt-3 p-4">
                <h4 class="fw-semibold fs-4">Pengajar</h4>
                <h6 class="fw-semibold fs-4 mb-0">{{$pengajar_count}}</h6>
                <div class="d-flex align-items-center justify-content-between">
                </div> 
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2"> 
              <div class="card-body pt-3 p-4">
                <h4 class="fw-semibold fs-4">Kelas</h4>
                <h6 class="fw-semibold fs-4 mb-0">{{$kelas_count}}</h6>
                <div class="d-flex align-items-center justify-content-between">
                </div> 
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Sales Overview</h5>
                  </div>
                  <div>
                    <select class="form-select">
                      <option value="1">March 2023</option>
                      <option value="2">April 2023</option>
                      <option value="3">May 2023</option>
                      <option value="4">June 2023</option>
                    </select>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
              
@endsection