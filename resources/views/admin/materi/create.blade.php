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
    <h2>Form Data Materi</h2>
</div>
<div class="card-body">
    <form method="POST" action="{{route('materi.store')}}">
        @csrf
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kode Materi</label>
        <input type="text" name="kode_materi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kategori</label>
          <select class="form-control" name="kategori_id" id="">
            <option value="">Pilih Kategori</option>
            @foreach($kategori as $data)
            <option value="{{$data->id}}">{{$data->nama}}</option>
            @endforeach
          </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
@endsection