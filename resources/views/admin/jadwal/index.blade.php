@extends('admin.layout.index')
@section('content')        
        <div class="card w-100">
              <div class="card-body p-4">
                <a href="{{route('jadwal.create')}}" class="btn btn-primary"><i class="ti ti-plus"></i></a>
                <a href="{{url('jadwal-PDF')}}" class="btn btn-success"><i class="ti ti-file"></i></a>
                <a href="{{url('surat-tugas')}}" class="btn btn-success"><i class="ti ti-pencil"></i></a>
                <br>
                <br>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                @endif
                <br>
                <h5 class="card-title fw-semibold mb-4">Jadwal Kelas</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kode Kelas</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kelas</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Peserta</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Materi</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Pengajar</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Jam Masuk</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Jam Keluar</h6>
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
                        @foreach($jadwal as $data)
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$no++}}</h6></td>
                        <td class="border-bottom-0">{{$data->kode_kelas}}</td>
                        <td class="border-bottom-0">{{$data->kelas}}</td>
                        <td class="border-bottom-0">{{$data->peserta}}</td>
                        <td class="border-bottom-0">{{$data->materi}}</td>
                        <td class="border-bottom-0">{{$data->pengajar}}</td>
                        <td class="border-bottom-0">{{$data->jam_masuk}}</td>
                        <td class="border-bottom-0">{{$data->jam_keluar}}</td>
                        <td >
                            <form action="{{route('jadwal.destroy',$data->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="alert('anda yakin ingin menghapus data ini?')">   
                                <i class="ti ti-trash"></i>
                            </button>
                            </form>
                            <a href="{{route('jadwal.edit',$data->id)}}" class="btn btn-warning">
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