@extends('layout.main')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Pemesanan Kost</h1>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Kamar</th>
                            <th>Kost</th>
                            <th>Status</th>
                            <th>Tanggal Pesan</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Keluar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pemesananList as $index => $pemesanan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pemesanan->pelanggan->nama ?? 'N/A' }}</td>
                            <td>{{ $pemesanan->kamar->nama_kamar ?? 'N/A' }}</td>
                            <td>{{ $pemesanan->kamar->kost->nama_kost ?? 'N/A' }}</td>
                            <td>
                                <span class="badge 
                                    @if($pemesanan->status_pemesanan == 'diterima') badge-success
                                    @elseif($pemesanan->status_pemesanan == 'ditolak') badge-danger
                                    @elseif($pemesanan->status_pemesanan == 'dibatalkan') badge-warning
                                    @else badge-secondary
                                    @endif">
                                    {{ ucfirst($pemesanan->status_pemesanan) }}
                                </span>
                            </td>
                            <td>
                                {{ $pemesanan->created_at ? $pemesanan->created_at->format('d/m/Y') : '-' }}
                            </td>


                            <td>
                                @if($pemesanan->tanggal_masuk)
                                {{ $pemesanan->tanggal_masuk->format('d/m/Y') }}
                                @else
                                -
                                @endif
                            </td>
                            <td>
                                @if($pemesanan->tanggal_keluar)
                                {{ $pemesanan->tanggal_keluar->format('d/m/Y') }}
                                @else
                                -
                                @endif
                            </td>
                            <td>
                                @if($pemesanan->status_pemesanan != 'dibatalkan')
                                <form action="{{ route('pemesanan.updateStatus', $pemesanan->pemesanan_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status_pemesanan" class="form-control form-control-sm" onchange="this.form.submit()">
                                        <option value="belum di proses" {{ $pemesanan->status_pemesanan == 'belum di proses' ? 'selected' : '' }}>Belum diproses</option>
                                        <option value="diterima" {{ $pemesanan->status_pemesanan == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                        <option value="ditolak" {{ $pemesanan->status_pemesanan == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                        <option value="dibatalkan" {{ $pemesanan->status_pemesanan == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                    </select>
                                </form>
                                @else
                                <form action="{{ route('pemesanan.updateStatus', $pemesanan->pemesanan_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pemesanan ini?')">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status_pemesanan" value="ditolak">
                                    <button type="submit" class="btn btn-sm btn-danger ">Hapus</button>
                                </form>
                                @endif
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data pemesanan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
            },
            "columnDefs": [{
                "orderable": false,
                "targets": [8] // Kolom aksi
            }]
        });
    });
</script>
@endsection