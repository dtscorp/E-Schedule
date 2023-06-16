@extends('admin.layout.index')
@section('content')
@include('sweetalert::alert')

        <div class="card w-100">
              <div class="card-body p-4">
                <a id='container-CratMT' href="{{route('kelas.create')}}" class="btn btn-success">Tambah Data</a>
                <h5 id='container-mterH5' class="card-title fw-semibold mb-4">Data Kelas</h5>
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
                          <h6 id='container-THHH' class="fw-semibold mb-0">Action</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @php 
                        $no = 1;
                        @endphp
                        @foreach($kelas as $data)
                      <tr>
                        <td id='container-THHH' class="border-bottom-0"><h6 id='container-THHH' class="fw-semibold mb-0">{{$no++}}</h6></td>
                        <td id='container-THHH' class="border-bottom-0">{{$data->kode_kelas}}</td>
                        <td id='container-THHH' class="border-bottom-0">{{$data->nama}}</td>
                        <td>
                            <form action="{{route('kelas.destroy',$data->id)}}" method="POST">
                            <a id='continer-editMTT' href="{{route('kelas.edit',$data->id)}}" class="btn">
                            <i class="ti ti-pencil"></i>
                            </a>
                            <a id='continer-viewMTT' href="{{route('kelas.show',$data->id)}}" class="btn">
                            <i class="ti ti-eye"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button id='continer-dtelwMTT' type="submit" class="btn delete-confirm">   
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