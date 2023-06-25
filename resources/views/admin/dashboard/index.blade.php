@extends('admin.layout.index')
@section('content')
@if(Auth::user()->role_access == 'peserta')
@include('access_denied')
@endif
<!--  Row 1 -->     
 <div class="container-fluid">
     @include('admin.dashboard.table_count') 
     <div class="card">
     <div class="card-body"> 
    @include('admin.dashboard.table_jadwal_run')
     
    @include('admin.dashboard.table_jadwal_pen')
     </div>
     </div>
</div>
@endsection