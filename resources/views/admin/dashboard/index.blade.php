@extends('admin.layout.index')
@section('content')

<!--  Row 1 -->
<div class="row">
  <div class="col-lg-8 d-flex align-items-strech">
    
    @include('admin.dashboard.grafik_peserta')

    </div>
</div>
@endsection