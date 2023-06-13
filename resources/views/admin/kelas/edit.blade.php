@extends('admin.layout.index')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
<div class="card-title">
    <h2>Form Edit Data Kelas</h2>
</div>
<div class="card-body">
    <form method="POST" action="{{route('kelas.update',$kelas->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kode kelas</label>
        <input type="text" name="kode_kelas" value="{{$kelas->kode_kelas}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{$kelas->nama}}" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
        <textarea class="form-control" name="desk" id="" cols="30" rows="10">{{$kelas->desk}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
@endsection