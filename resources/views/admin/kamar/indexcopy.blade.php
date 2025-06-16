@extends('layout.main')
@section('content')

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>Nama Kost</th>
            <th>Alamat</th>
            <th>Nama Kamar</th>
            <th>Fasilitas Kamar</th>
            <th>Harga</th>
            <th>Status Kamar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kosts as $kost)
        @foreach ($kost->kamars as $kamar)
        <tr>
            <td>{{ $kost->nama_kost }}</td>
            <td>{{ $kost->alamat }}</td>
            <td>{{ $kamar->nama_kamar }}</td>
            <td>{{ $kamar->fasilitas }}</td>
            <td>Rp{{ number_format($kamar->harga, 0, ',', '.') }}</td>
            <td>{{ ucfirst($kamar->status_kamar) }}</td>
        </tr>

        @endforeach
        @endforeach
    </tbody>
</table>

@endsection