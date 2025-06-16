@extends('template.navbar')
@section('content')
<!-- Bootstrap CSS -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->

</head>

<body>

    <div class="container mt-4 mx-10    ">
        <h2 class="mb-4">Daftar Pemesanan Saya</h2>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Kamar</th>
                                <th>Kost</th>
                                <th>Tanggal Pesan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pemesanans as $pemesanan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pemesanan->kamar->nama_kamar ?? 'N/A' }}</td>
                                <td>{{ $pemesanan->kamar->kost->nama_kost ?? 'N/A' }}</td>
                                <td>
                                    {{ $pemesanan->created_at ? $pemesanan->created_at->format('d/m/Y') : '-' }}
                                </td>
                                <td>
                                    <span class="badge
                                        @if($pemesanan->status_pemesanan == 'diterima') bg-success text-white
                                        @elseif($pemesanan->status_pemesanan == 'ditolak') bg-danger text-white
                                        @elseif($pemesanan->status_pemesanan == 'dibatalkan') bg-warning text-dark
                                        @elseif($pemesanan->status_pemesanan == 'belum di proses') bg-warning text-dark
                                        @else bg-secondary text-white
                                        @endif">
                                        {{ ucfirst($pemesanan->status_pemesanan) }}
                                    </span>
                                </td>

                                <td>
                                    <form action="{{ route("pelanggan.pemesanan.batalkan",$pemesanan->pemesanan_id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Yakin ingin membatalkan pemesanan?')">
                                            Batalkan
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada pemesanan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
@endsection