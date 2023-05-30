@extends('admin.index')
@section('content')
<h3>Daftar Pengajar</h3>
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<br />
<a href="{{ route('pengajar.create') }}" class="btn btn-primary">Tambah</a>
<table class="table table-hover datatable">
  <thead>
    <tr>
      <th>No</th>
      <th>NIP</th>
      <th>Nama</th>
      <th>Gender</th>
      <th>Telpon</th>
      <th>Email</th>
      <th>Alamat</th>
      <th>Foto</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @php
    $no = 1;
    @endphp
    @foreach($pengajar as $data)
    <tr>
      <th>{{ $no }}</th>
      <td>{{ $data->nip }}</td>
      <td>{{ $data->nama }}</td>
      <td>{{ $data->gender }}</td>
      <td>{{ $data->telp }}</td>
      <td>{{ $data->email }}</td>
      <td>{{ $data->alamat }}</td>
      <td>
        @empty($data->foto)
        <img src="{{ url('assets/img/noimage.jpg') }}" width="15%" style="width: 50px;border-radius: 10px;">
        @else
        <img src="{{ url('assets/img')}}/{{$data->foto}}" width="15%" style="width: 50px;border-radius: 10px;">
        @endempty
      </td>
      <td>
        <form method="POST" action="{{ route('pengajar.destroy',$data->id) }}">
          @csrf
          @method('DELETE')
          <a class="btn btn-info" href="{{ route('pengajar.show',$data->id) }}" title="detail">
            <i class="bi bi-eye-fill"></i>
          </a>
          <a class="btn btn-warning" href="{{ route('pengajar.edit',$data->id) }}" title="ubah">
            <i class="bi bi-pencil-fill"></i>
          </a>
          <!-- hapus data -->
          <button class="btn btn-danger" type="submit" title="Hapus"
          name="proses" value="hapus"
          onclick="return confirm('Anda Yakin Data Dihapus?')">
          <i class="bi bi-trash-fill"></i>
        </button>
        <input type="hidden" name="idx" value="" />
      </form>
    </td>
  </tr>
  @php $no++ @endphp
  @endforeach
</tbody>
</table>
@endsection
