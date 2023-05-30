@extends('admin.layout.index')
@section('content');        
        <div class="card w-100">
              <div class="card-body p-4">
                <a href="{{route('kategori.create')}}" class="btn btn-success">Tambah Data</a>
                <br>
                <br>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                @endif
                <br>
                <h5 class="card-title fw-semibold mb-4">Daftar Pengajar</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">NIP</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Gender</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">telp</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">email</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Foto</h6>
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
                        @foreach($pengajar as $data)
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$no++}}</h6></td>
                        <td class="border-bottom-0">{{$data->nip}}</td>
                        <td class="border-bottom-0">{{$data->nama}}</td>
                        <td class="border-bottom-0">{{$data->telp}}</td>
                        <td class="border-bottom-0">{{$data->email}}</td>
                        <td class="border-bottom-0">{{$data->alamat}}</td>
                        <td class="border-bottom-0">{{$data->foto}}</td>
                        <td >
                            <form action="{{route('pengajar.destroy',$data->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="alert('anda yakin ingin menghapus data ini?')">   
                                <i class="ti ti-trash"></i>
                            </button>
                            </form>
                            <a href="{{route('pengajar.edit',$data->id)}}" class="btn btn-warning">
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