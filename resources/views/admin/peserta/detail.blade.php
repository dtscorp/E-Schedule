@extends('admin.layout.index')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    @empty($peserta->foto)
                    <img src="{{asset('admin/assets/images/nophoto.jpg')}}" width="500" height="500" class="rounded-circle">
                    @else
                    <img src="{{asset('admin/assets/images')}}/{{$peserta->foto}}" width="500" height="500" class="img-thumbnail">
                    @endempty
                    <h3 align="center">{{$peserta->nama}}</h3>
                </div>

                <div class="col-md-8">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Overview</a>
                        </li>
                    </ul>
                    <hr>
                    <h4>Profile Details</h4> </br>
                    <div class="row">
                        <div class="col-md-4">
                            <p><b>Full Name</b></p>
                            <p><b>Email</b></p>
                            <p><b>Telp</b></p>
                            <p><b>Alamat</b></p>
                            <p><b>Gender</b></p>
                        </div>
                        <div class="col-md-8">
                            <p>{{$peserta->nama}}</p>
                            <p>{{$peserta->email}}</p>
                            <p>{{$peserta->telp}}</p>
                            <p>{{$peserta->alamat}}</p>
                            <p>
                                @if($peserta->gender == 'P')
                                    Perempuan
                                @else
                                    Laki-Laki
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-2">
                        <a id='continer-view' href="{{route('peserta.index')}}" class="btn btn-secondary">
                           Kembali<i class="ti ti-arrow-back-up"></i>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
