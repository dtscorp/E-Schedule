@extends('admin.layout.index')
@section('content')

<div id='container-viewss' class="card">
	@empty($pesert->foto)
    	<img src="{{url('admin/assets/images/arvian.jpg')}}" class="card-img-top">
    @else
        <img src="{{url('admin/assets/images')}}/{{$pesert->foto}}" class="card-img-top">
    @endempty
	<div class="card-body">
		<h5 class="card-title">{{ $pesert->nama }}</h5>
		<p class="card-text">
			Gender: {{ $pesert->gender }}
			<br/>Telp : {{ $pesert->telp }}
			<br/>Email : {{ $pesert->email }}
			<br/>Alamat : {{ $pesert->alamat }}
		</p>
		<a href="{{ url('/peserta') }}" class="btn">Go Back</a>
	</div>
</div>

@endsection