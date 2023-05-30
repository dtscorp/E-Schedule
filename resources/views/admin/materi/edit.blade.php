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
    <h2>Form Edit Data Materi</h2>
</div>
<div class="card-body">
    <form method="POST" action="{{route('materi.update',$materi->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kode Materi</label>
        <input type="text" name="kode_materi" value="{{$materi->kode_materi}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{$materi->nama}}" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kategori</label>
          <select class="form-control" name="kategori_id" id="">
            @foreach($kategori as $data)
            @if($data->id == $materi->kategori_id)
            <option value="{{$data->id}}" checked>{{$data->nama}}</option>
            @endif
            <option value="{{$data->id}}">{{$data->nama}}</option>
            @endforeach
          </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
@endsection