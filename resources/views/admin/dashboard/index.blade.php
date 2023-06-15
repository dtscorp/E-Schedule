@extends('admin.layout.index')
@section('content')
@if(Auth::user()->role_access == 'peserta')
@include('access_denied')
@endif
<!--  Row 1 -->
<div class="row">
  <div class="col-lg-8 d-flex align-items-strech">
    <h1>Hallo</h1>
    </div>
</div>
@endsection