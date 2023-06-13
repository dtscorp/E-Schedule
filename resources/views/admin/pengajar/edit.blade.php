@extends('admin.layout.index')
@section('content')
<h3>Form Update Pengajar</h3>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container px-5 my-5">
    <form method="POST" action="{{ route('pengajar.update',$pengajar->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="form-floating mb-3">
            <input class="form-control" name="nip" value="{{ $pengajar->nip }}" id="nipPengajar" type="text" placeholder="NIP Pengajar" data-sb-validations="required" />
            <label for="nipPengajar">NIP</label>
            <div class="invalid-feedback" data-sb-feedback="nipPengajar:required">NIP is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="nama" value="{{ $pengajar->nama }}" id="nama" type="text" placeholder="nama" data-sb-validations="required" />
            <label for="nama">Nama</label>
            <div class="invalid-feedback" data-sb-feedback="nama:required">Nama is required.</div>
        </div>
        <div class="form-control mb-3">
            <label class="mb-2" for="gender">Gender</label> <br>
            <input name="gender" value="L" id="gender" type="radio" placeholder="gender" data-sb-validations="required" /> L <br>
            <input name="gender" value="P" id="gender" type="radio" placeholder="gender" data-sb-validations="required" /> P
            <div class="invalid-feedback" data-sb-feedback="telp:required">Gender is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="telp" value="{{$pengajar->telp}}" id="telp" type="text" placeholder="telp" data-sb-validations="required" />
            <label for="telp">Telpon</label>
            <div class="invalid-feedback" data-sb-feedback="telp:required">Telepon is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="email" value="{{$pengajar->email}}" id="email" type="text" placeholder="email" data-sb-validations="required" />
            <label for="email">Email</label>
            <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="alamat" value="{{$pengajar->alamat}}" id="alamat" type="text" placeholder="alamat" data-sb-validations="required" />
            <label for="alamat">Alamat</label>
            <div class="invalid-feedback" data-sb-feedback="alamat:required">Alamat is required.</div>
        </div>
        <div class="form-control mb-3">
            <label for="foto">Foto</label>
            <input class="form-control" name="foto" value="{{$pengajar->foto}}" id="foto" type="file" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="foto:required">Foto is required.</div>
        </div>
        <button class="btn btn-primary" name="proses" value="update" id="update" type="submit">Update</button>
        <input type="hidden" name="id" value="{{ $pengajar->id }}"/>
        <a href="{{ url('/pengajar') }}" class="btn btn-info">Batal</a>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
