@extends('admin.layout.index')
@section('content')
@include('sweetalert::alert')
<div class="card w-100">
              <div class="card-body p-4">
              <a href="{{route('peserta.create')}}" class="btn btn-success" title="Tambah Data">
                Tambah Data
                <i class="ti ti-plus"></i>
              </a>
                
                <h5 id='container-mterH5' class="card-title fw-semibold mb-4">Data Peserta</h5>
                <div class="table-responsive">
                  <table id='container-Tble' class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">nama</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">gender</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">telp</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">email</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">alamat</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">foto</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Action</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @php 
                        $no = 1;
                        @endphp
                        @foreach($peserta as $dbpeserta)
                      <tr>

                        <td class="border-bottom-0"><h6 id='container-THHH' class="fw-semibold mb-0">{{$no++}}</h6></td>
                        <td id='container-THHH' class="border-bottom-0">{{$dbpeserta->nama}}</td>
                        <td id='container-THHH' class="border-bottom-0">{{$dbpeserta->gender}}</td>
                        <td id='container-THHH' class="border-bottom-0">{{$dbpeserta->telp}}</td>
                        <td id='container-THHH' class="border-bottom-0">{{$dbpeserta->email}}</td>
                        <td id='container-THHH' class="border-bottom-0">{{$dbpeserta->alamat}}</td>
                        <td id='container-LLL' class="border-bottom-0">
                        @empty($dbpeserta->foto)
                          <img src="{{url('admin/assets/images/')}}">
                        @else
                          <img src="{{url('admin/assets/images')}}/{{$dbpeserta->foto}}">
                        @endempty
                        </td>
                        <td>
                            <form action="{{route('peserta.destroy',$dbpeserta->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('peserta.edit',$dbpeserta->id)}}" title="Edit Data" class="btn btn-warning ">
                            <i class="ti ti-pencil"></i>
                            </a> 
                            <a  href="{{route('peserta.show',$dbpeserta->id)}}" title="Detail Data" class="btn btn-info ">
                            <i class="ti ti-eye"></i>
                            </a>
                            <button type="submit" title="Hapus Data" class="btn btn-danger delete-confirm">   
                                <i class="ti ti-trash"></i>
                            </button>
                            </form>
                        </td>
                      </tr>
                      @endforeach                       
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
@endsection