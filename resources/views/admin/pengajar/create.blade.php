@extends('admin.layout.index')
@section('content')
<h3>Input Pengajar</h3>
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
    <form method="POST" action="{{ route('pengajar.store') }}" id="contactForm" data-sb-form-api-token="API_TOKEN">
    @csrf
        <div class="form-floating mb-3">
            <input class="form-control" name="nip" value="" id="nipPengajar" type="text" placeholder="NIP Pengajar" data-sb-validations="required" />
            <label for="nipPengajar">NIP</label>
            <div class="invalid-feedback" data-sb-feedback="kodeProduk:required">NIP is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="nama" value="" id="nama" type="text" placeholder="nama" data-sb-validations="required" />
            <label for="nama">Nama</label>
            <div class="invalid-feedback" data-sb-feedback="pengajar:required">Nama is required.</div>
        </div>
        <div class="form-floating mb-3">
            Gender <br>
            <input name="gender" value="l" id="gender" type="radio" placeholder="gender" data-sb-validations="required" /> L <br>
            <input name="gender" value="p" id="gender" type="radio" placeholder="gender" data-sb-validations="required" /> P
            <div class="invalid-feedback" data-sb-feedback="telp:required">Gender is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="telp" value="" id="telp" type="text" placeholder="telp" data-sb-validations="required" />
            <label for="telp">Telpon</label>
            <div class="invalid-feedback" data-sb-feedback="telp:required">Telepon is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="email" value="" id="email" type="text" placeholder="email" data-sb-validations="required" />
            <label for="email">Email</label>
            <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="alamat" value="" id="alamat" type="text" placeholder="alamat" data-sb-validations="required" />
            <label for="alamat">Alamat</label>
            <div class="invalid-feedback" data-sb-feedback="alamat:required">Alamat is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="foto" value="" id="foto" type="text" placeholder="Foto" data-sb-validations="required" />
            <label for="foto">Foto</label>
            <div class="invalid-feedback" data-sb-feedback="foto:required">Foto is required.</div>
        </div>
        <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
        <a href="{{ url('/pengajar') }}" class="btn btn-info">Batal</a>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
