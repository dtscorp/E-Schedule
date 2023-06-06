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
<div class="card-body">
    <h2>Form Create Peserta</h2>
    <form method="POST" action="{{route('peserta.store')}}">
        @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-floating mb-3">
            Gender <br>
            <input name="gender" value="l" id="gender" type="radio" placeholder="gender" data-sb-validations="required" /> L <br>
            <input name="gender" value="p" id="gender" type="radio" placeholder="gender" data-sb-validations="required" /> P
            <div class="invalid-feedback" data-sb-feedback="telp:required">Gender is required.</div>
        </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">telp</label>
        <input type="text" name="telp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">email</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">alamat</label>
        <textarea class='form-control' name="alamat" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">foto</label>
        <input type="file" name="foto" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
@endsection