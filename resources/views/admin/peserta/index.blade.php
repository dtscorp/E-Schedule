@extends('admin.layout.index')
@section('content')

<div class="card w-100">
              <div class="card-body p-4">
              <a href="{{route('peserta.create')}}" class="btn btn-success">Tambah Data</a>
                <br>
                <br>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                @endif
                <br>
                <h5 class="card-title fw-semibold mb-4">Data Peserta</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">nama</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">gender</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">telp</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">email</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">alamat</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">foto</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @php 
                        $no = 1;
                        @endphp
                        @foreach($peserta as $dbpeserta)
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$no++}}</h6></td>
                        <td class="border-bottom-0">{{$dbpeserta->nama}}</td>
                        <td class="border-bottom-0">{{$dbpeserta->gender}}</td>
                        <td class="border-bottom-0">{{$dbpeserta->telp}}</td>
                        <td class="border-bottom-0">{{$dbpeserta->email}}</td>
                        <td class="border-bottom-0">{{$dbpeserta->alamat}}</td>
                        <td class="border-bottom-0">@empty($data->foto)
                    <img src="{{asset('admin/assets/images/nophoto.jpg')}}" class="card-img-top" alt="...">
                    @else
                    <img src="{{asset('admin/assets/images')}}/{{$data->foto}}" class="card-img-top" alt="{{$data->foto}}">
                    @endempty</td>
                        <td >
                            <form action="{{route('peserta.destroy',$dbpeserta->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="alert('anda yakin ingin menghapus data ini?')">   
                                <i class="ti ti-trash"></i>
                            </button>
                            </form>
                            <a href="{{route('peserta.edit',$dbpeserta->id)}}" class="btn btn-warning">
                            <i class="ti ti-pencil"></i>
                            </a>
                        </td>
                      </tr>
                      @endforeach                       
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
@endsection