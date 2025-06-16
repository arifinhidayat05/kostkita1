@extends('layout.main')
@section('content')

<div class="container-fluid">
    <div class="card">
        <form action="{{ route('kamar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title">Tambah Kamar</h4>

                <div class="form-group">
                    <label for="kost_id">Pilih Kost</label>
                    <select name="kost_id" class="form-control" required>
                        <option value="">-- Pilih Kost --</option>
                        @foreach($kosts as $kost)
                        <option value="{{ $kost->kost_id }}">{{ $kost->nama_kost }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama_kamar">Nama Kamar</label>
                    <input type="text" name="nama_kamar" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="fasilitas">Fasilitas</label>
                    <textarea name="fasilitas" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" step="0.01" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="status_kamar">Status</label>
                    <select name="status_kamar" class="form-control" required>
                        <option value="tersedia">Tersedia</option>
                        <option value="tidak tersedia">Tidak Tersedia</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('kamar.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>

@endsection