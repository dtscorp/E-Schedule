@extends('admin.layout.index')
@section('content')   
        <div class="card w-100">
              <div class="card-body p-4">
                <a id='container-CratPeserta' href="{{route('jadwal.create')}}" class="btn btn-success">Tambah Data</a>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                @endif

                <h5 id='container-jadwlH5' class="card-title fw-semibold mb-4">Jadwal Kelas</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Kode Kelas</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Kelas</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Materi</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Jam Masuk</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Jam Keluar</h6>
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
                        @foreach($jadwal as $data)
                      <tr>
                        <td class="border-bottom-0"><h6 id='container-THHH' class="fw-semibold mb-0">{{$no++}}</h6></td>
                        <td id='container-THHH' class="border-bottom-0">{{$data->kode_kelas}}</td>
                        <td id='container-THHH' class="border-bottom-0">{{$data->kelas}}</td>
                        <td id='container-THHH' class="border-bottom-0">{{$data->materi}}</td>
                        <td id='container-THHH' class="border-bottom-0">{{$data->jam_masuk}}</td>
                        <td id='container-THHH' class="border-bottom-0">{{$data->jam_keluar}}</td>
                        <td>
                            <form action="{{route('jadwal.destroy',$data->id)}}" method="POST">
                            <a id='continer-edit' href="{{route('jadwal.edit',$data->id)}}" class="btn">
                            <i class="ti ti-pencil"></i>
                            </a>
                            <a id='continer-view' href="{{route('jadwal.edit',$data->id)}}" class="btn">
                            <i class="ti ti-eye"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button id='container-dlete' type="submit" class="btn" onclick="alert('anda yakin ingin menghapus data ini?')">   
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