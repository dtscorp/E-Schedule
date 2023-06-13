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

<div class="container px-5 my-5">
<h2 id='creH2'>Form Edit Peserta</h2>
    <form id="contactForm" method="POST" action="{{route('peserta.update',$peserta->id)}}" enctype="multipart/form-data" data-sb-form-api-token="API_TOKEN">
    @csrf
    @method('PUT')
        <div class="form-floating mb-3">
            <input class="form-control" id="name" value="{{$peserta->nama}}" name="nama" type="text" placeholder="name" data-sb-validations="required" />
            <label for="name">name</label>
            <div class="invalid-feedback" data-sb-feedback="name:required">name is required.</div>
        </div>
        <div class="mb-3">
            <label id="gender" class="form-label d-block">gender</label>
            <div class="form-check form-check-inline">
            <input id='inp-gender' name="gender" value="L" {{$peserta->gender == "L"?'checked': ''}} type="radio" placeholder="gender" data-sb-validations="required" /> L 
            <input id='inp-gender' name="gender" value="P" {{$peserta->gender == "P"?'checked': ''}} type="radio" placeholder="gender" data-sb-validations="required" /> P
            </div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="telephone" value="{{$peserta->telp}}" name="telp" type="text" placeholder="telephone" data-sb-validations="required" />
            <label for="telephone">telephone</label>
            <div class="invalid-feedback" data-sb-feedback="telephone:required">telephone is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="email" value="{{$peserta->email}}" type="email" name="email" placeholder="email" data-sb-validations="required,email" />
            <label for="email">email</label>
            <div class="invalid-feedback" data-sb-feedback="email:required">email is required.</div>
            <div class="invalid-feedback" data-sb-feedback="email:email">email Email is not valid.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="address" value="{{$peserta->alamat}}"  type="text" name="alamat" placeholder="Address" style="height: 10rem;" data-sb-validations="required"></input>
            <label for="address">Address</label>
            <div class="invalid-feedback" data-sb-feedback="address:required">Address is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="photo" value="{{$peserta->foto}}" type="file" name="foto" placeholder="photo" data-sb-validations="required" />
            <label for="photo">photo</label>
            <div class="invalid-feedback" data-sb-feedback="photo:required">photo is required.</div>
        </div>
            <button id='tbn-prst1' value='update' name='proses' class="btn btn-success btn-lg" id="submitButton" type="submit">Save</button>
            <input type="hidden" name="id" value="{{ $peserta->id }}"/>
           <a href="{{ url('/peserta') }}" id='tbn-ccncl1' class="btn btn-warning btn-lg">Batal</a>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection