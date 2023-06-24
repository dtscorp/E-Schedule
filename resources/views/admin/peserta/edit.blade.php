@extends('admin.layout.index')
@section('content')
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->

<div class="container px-5 my-5">
<h2 id='creH2'>Form Edit Peserta</h2>
    <form id="contactForm" method="POST" action="{{route('peserta.update',$peserta->id)}}" enctype="multipart/form-data" data-sb-form-api-token="API_TOKEN">
    @csrf
    @method('PUT')
        <div class="form-floating mb-3">
            <input class="form-control @error('nama') is-invalid @enderror" id="name" value="{{$peserta->nama}}" name="nama" type="text" placeholder="name" data-sb-validations="required" />
            <label for="name">name</label>
            @error('nama')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label id="gender" class="form-label d-block">gender</label>
            <div class="form-check form-check-inline">
            @if($peserta->gender == 'L')
            <input class="@error('gender') is-invalid @enderror" name="gender" value="L" id="gender" type="radio" placeholder="gender" data-sb-validations="required" checked/> L <br>
            <input class="@error('gender') is-invalid @enderror" name="gender" value="P" id="gender" type="radio" placeholder="gender" data-sb-validations="required" /> P
            @else
            <input class="@error('gender') is-invalid @enderror" name="gender" value="L" id="gender" type="radio" placeholder="gender" data-sb-validations="required" /> L <br>
            <input class="@error('gender') is-invalid @enderror" name="gender" value="P" id="gender" type="radio" placeholder="gender" data-sb-validations="required" checked/> P
            @endif
            @error('gender')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
            </div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control @error('telp') is-invalid @enderror" id="telephone" value="{{$peserta->telp}}" name="telp" type="text" placeholder="telephone" data-sb-validations="required" />
            <label for="telephone">telephone</label>
            @error('telp')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input class="form-control @error('email') is-invalid @enderror" id="email" value="{{$peserta->email}}" type="email" name="email" placeholder="email" data-sb-validations="required,email" />
            <label for="email">email</label>
            @error('email')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input class="form-control  @error('alamat') is-invalid @enderror" id="address" value="{{$peserta->alamat}}"  type="text" name="alamat" placeholder="Address" style="height: 10rem;" data-sb-validations="required"></input>
            <label for="address">Address</label>
            @error('alamat')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input class="form-control  @error('foto') is-invalid @enderror" id="photo" value="{{$peserta->foto}}" type="file" name="foto" placeholder="photo" data-sb-validations="required" />
            <label for="photo">photo</label>
            @error('foto')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
            <button  value='update' name='proses' class="btn btn-success " id="submitButton" type="submit">Update</button>
            <input type="hidden" name="id" value="{{ $peserta->id }}"/>
           <a href="{{ url('/peserta') }}" class="btn btn-warning ">Batal</a>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection