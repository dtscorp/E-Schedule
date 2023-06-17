@extends('admin.layout.index')
@section('content')
@if(Auth::user()->role_access == 'peserta')
@include('access_denied')
@endif
<!--  Row 1 -->
<div class="row">
  <div class="col-lg-8 d-flex align-items-strech">

    <br>
    @include('admin.dashboard.grafik_peserta')
    <br>
    
    @include('admin.dashboard.grafik_pengajar')
    @include('admin.dashboard.grafik_kelas')

    @include('admin.dashboard.grafik_materi')

    </div>
</div>
@endsection