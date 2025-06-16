@extends('layout.main')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Penyewa Kost</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Penyewa</th>
                            <th>Kamar</th>
                            <th>Kost</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Keluar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penyewas as $index => $penyewa)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $penyewa->pelanggan->nama }}</td>
                            <td>{{ $penyewa->kamar->nama_kamar }}</td>
                            <td>{{ $penyewa->kamar->kost->nama_kost }}</td>
                            <td>{{ $penyewa->tanggal_masuk->format('d/m/Y') }}</td>
                            <td>{{ $penyewa->tanggal_keluar->format('d/m/Y') }}</td>
                            <td>
                                <span class="badge {{ $penyewa->status == 'aktif' ? 'badge-success' : 'badge-secondary' }}">
                                    {{ ucfirst($penyewa->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
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

@section('scripts')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endsection