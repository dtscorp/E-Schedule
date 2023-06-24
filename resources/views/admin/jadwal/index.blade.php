@extends('admin.layout.index')
@section('content')
@include('sweetalert::alert')

                <h5 id='container-jadwlH5' class="card-title fw-semibold mb-4">Jadwal Kelas</h5>
                <div class="card w-100">
              <div class="card-body p-4">
                @if(Auth::user()->role_access =='admin')
                <a href="{{route('jadwal.create')}}" class="btn btn-primary"><i class="ti ti-plus"></i></a>
                @endif
                <a href="{{url('jadwal-PDF')}}" class="btn btn-success"><i class="ti ti-file-lambda"></i></a>
                <a href="{{url('surat-tugas')}}" class="btn btn-danger"><i class="ti ti-file-import"></i></a>
                <br>
                <br>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                @endif


        <form action="/jadwal" method="GET" class="mb-3">
            <div class="input-group">
                <input type="search" name="search" class="form-control" placeholder="Cari...">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 id="fw-semibold mb-0" class="fw-semibold mb-0">No</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 id="fw-semibold mb-0" class="fw-semibold mb-0">Kode Kelas</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 id="fw-semibold mb-0" class="fw-semibold mb-0">Kelas</h6>
                          </th>
                          @if(Auth::user()->role_access =='admin')
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Peserta</h6>
                          </th>
                          @endif
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Materi</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Pengajar</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Tanggal Mulai</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Tanggal Berakhir</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Jam Masuk</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Jam Keluar</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Status</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Action</h6>
                          </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $data)
                    <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$loop->iteration}}</h6></td>
                        <td class="border-bottom-0">{{$data->kode_kelas}}</td>
                        <td class="border-bottom-0">{{$data->kelas}}</td>
                        @if(Auth::user()->role_access =='admin')
                        <td class="border-bottom-0">{{$data->peserta}}</td>
                        @endif
                        <td class="border-bottom-0">{{$data->materi}}</td>
                        <td class="border-bottom-0">{{$data->pengajar}}</td>
                        <td class="border-bottom-0">{{$data->tgl_mulai}}</td>
                        <td class="border-bottom-0">{{$data->tgl_akhir}}</td>
                        <td class="border-bottom-0">{{$data->jam_masuk}}</td>
                        <td class="border-bottom-0">{{$data->jam_keluar}}</td>
                        @php
                          if(now() < $data->tgl_mulai){
                            $status = 'Pending';
                          }elseif(now()->between($data->tgl_mulai,$data->tgl_akhir)){
                            $status = 'Running';
                          }else{
                            $status = 'Done';
                          }
                        @endphp

                        <td class="border-bottom-0">
                        <span class="badge {{ ($status == 'Running')? 'bg-success' : 'bg-danger' }} rounded-3 fw-semibold">{{$status}}</span>
                        </td>
                        <td>
                        @if(Auth::user()->role_access =='admin')
                        <a id='continer-view' href="{{route('jadwal.edit',$data->id)}}" class="btn">
                            <i class="ti ti-eye"></i>
                            </a>
                        @endif
                            <form action="{{route('jadwal.destroy',$data->id)}}" method="POST">
                            <a id='continer-edit' href="{{route('jadwal.edit',$data->id)}}" class="btn">
                            <i class="ti ti-pencil"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button id='container-dlete' type="submit" class="btn delete-confirm">
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
