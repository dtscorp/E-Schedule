@extends('admin.layout.index')
@section('content')
@include('sweetalert::alert')
        <div class="card w-100">
              <div class="card-body p-4">
                <a id='container-CratMT' href="{{route('materi.create')}}" class="btn btn-success">Tambah Data</a>
                <h5 id='container-mterH5' class="card-title fw-semibold mb-4">Data Materi</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Kode Materi</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Materi</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Kelas</h6>
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
                        @foreach($materi as $data)
                      <tr>
                        <td id='container-THHH' class="border-bottom-0"><h6 id='container-THHH' class="fw-semibold mb-0">{{$no++}}</h6></td>
                        <td id='container-THHH' class="border-bottom-0">{{$data->kode_materi}}</td>
                        <td id='container-THHH' class="border-bottom-0">{{$data->nama}}</td>
                        <td id='container-THHH' class="border-bottom-0">{{$data->kelas}}</td>
                        <td>
                            <form action="{{route('materi.destroy',$data->id)}}" method="POST">
                            <a id='continer-editMTT' href="{{route('materi.edit',$data->id)}}" class="btn">
                            <i class="ti ti-pencil"></i>
                            </a>
                            <a id='continer-viewMTT' href="{{route('materi.edit',$data->id)}}" class="btn">
                            <i class="ti ti-eye"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button id='continer-dtelwMTT' type="submit" class="btn delete-confirm" >   
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