@extends('admin.layout.index')
@section('content')
    <h3>Input Pengguna</h3>
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
        <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input class="form-control" name="name" value="" id="nama" type="text" placeholder="nama"
                    data-sb-validations="required" />
                <label for="nama">Nama</label>
                <div class="invalid-feedback" data-sb-feedback="users:required">Nama is required.</div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="nip" value="" id="nipPengajar" type="text"
                    placeholder="NIP Pengajar" data-sb-validations="required" />
                <label for="nipPengajar">NIP/NIK</label>
                <div class="invalid-feedback" data-sb-feedback="users:required">NIP/NIK is required.</div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="email" value="" id="email" type="text" placeholder="email"
                    data-sb-validations="required" />
                <label for="email">Email</label>
                <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.</div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="password" value="" id="alamat" type="password" placeholder="alamat"
                    data-sb-validations="required" />
                <label for="alamat">Password</label>
                <div class="invalid-feedback" data-sb-feedback="alamat:required">Password is required.</div>
            </div>  
            <div class="form-floating mb-3">
                <select class="form-control" name="pengajar_id" id="">
                    <option value="">Pilih Pengajar</option>
                    @foreach($pengajar as $data)
                    <option value="{{$data->id}}">{{$data->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-floating mb-3">
                <select class="form-control" name="peserta_id" id="">
                    <option value="">Pilih Peserta</option>
                    @foreach($peserta as $data)
                    <option value="{{$data->id}}">{{$data->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-floating mb-3">
                <select class="form-control" name="role" id="">
                    <option value="">Pilih Role</option>
                    <option value="pengajar">Pengajar</option>
                    <option value="peserta">Peserta</option>
                    <option value="admin">Administrator</option>
                </select>
            </div>
            <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
            <a href="{{ url('/user') }}" class="btn btn-info">Batal</a>
        </form>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
