@extends('admin.layout.index')
@section('content')
<h3>Daftar Pengajar</h3></br>
<a href="{{route('pengajar.create')}}" class="btn btn-info">Tambah Data</a></br></br>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($pengajar as $data)
            <div class="col" style="width : 25%">
                <div class="card h-100">
                    @empty($data->foto)
                    <img src="{{asset('admin/assets/images/nophoto.jpg')}}" class="card-img-top"  alt="...">
                    @else
                    <img src="{{asset('admin/assets/images')}}/{{$data->foto}}" class="card-img-top" style="width : 100%; height : 50%" alt="{{$data->foto}}">
                    @endempty
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->nama }}</h5>
                        <p class="card-text">NIP : {{$data->nip}}</p>
                        <p class="card-text">Gender : {{$data->gender}}</p>
                        <p class="card-text">No HP : {{$data->telp}}</p>
                        <p class="card-text">Email : {{$data->email}}</p>
                        <p class="card-text">Alamat : {{$data->alamat}}</p>
                    </div>
                    <td>
                        <form align="center" method="POST" action="{{ route('pengajar.destroy',$data->id) }}">
                          @csrf
                          @method('DELETE')
                          <a class="btn btn-warning" href="{{ route('pengajar.edit',$data->id) }}" title="ubah">
                            <i class="ti ti-pencil"></i>
                          </a>
                          <!-- hapus data -->
                          <button class="btn btn-danger" type="submit" title="Hapus"
                          name="proses" value="hapus"
                          onclick="return confirm('Anda Yakin Data Dihapus?')">
                          <i class="ti ti-trash"></i>
                        </button>
                        <input type="hidden" name="idx" value="" />
                      </form>
                    </td>
                </div>
            </div>
        @endforeach
    </div>
@endsection
