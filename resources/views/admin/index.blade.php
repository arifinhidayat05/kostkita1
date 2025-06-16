@extends('layout.main')
@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('kost.create' ) }}" class="btn btn-primary">Tambah Kost</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Kost</th>
                            <th>Alamat</th>
                            <th>No.Wa</th>
                            <th>Gambar</th>
                            <th>email</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <!-- <th>No</th> -->
                            <th>Nama Kost</th>
                            <th>Alamat</th>
                            <th>No.Wa</th>
                            <th>Gambar</th>
                            <th>Email</th>
                            <th>Action</th>


                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($kosts as $kost)

                        <tr>
                            <!-- <td>{{ $loop->iteration }}</td> -->
                            <td>{{ $kost->nama_kost }}</td>
                            <td>{{ $kost->alamat }}</td>
                            <td>{{ $kost->No_Wa }}</td>
                            <td>
                                @if($kost->gambar)
                                <img src="{{ asset($kost->gambar) }}" alt="Gambar Kost" style="width: 100px;height: 100px;">
                                @else
                                <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>{{ $kost->Email }}</td>
                            <td><a href="{{ route('kost.edit', ["id"=>$kost->kost_id])}}" class="btn btn-sm btn-warning mx-1" title="Edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="{{ route("kost.delete",["id"=>$kost->kost_id]) }}" class="btn btn-sm btn-danger mx-1" title="Delete" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash-alt me-1"></i> Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection