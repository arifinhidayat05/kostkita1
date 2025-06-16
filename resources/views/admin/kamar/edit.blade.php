@extends('layout.main')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ isset($kamar) ? route('kamar.update', ['id' => $kamar->kamar_id]) : route('kamar.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($kamar))
                    @method('PUT') {{-- Method spoofing untuk update --}}
                    @endif

                    <div class="card-body">
                        <h4 class="card-title">{{ isset($kamar) ? 'Edit' : 'Tambah' }} Kamar</h4>

                        {{-- Pilih Kost --}}
                        <div class="form-group">
                            <label for="kost_id">Pilih Kost</label>
                            <select name="kost_id" id="kost_id" class="form-control" required>
                                <option value="">-- Pilih Kost --</option>
                                @foreach($kosts as $kost)
                                <option value="{{ $kost->kost_id }}"
                                    {{ (isset($kamar) && $kamar->kost_id == $kost->kost_id) ? 'selected' : '' }}>
                                    {{ $kost->nama_kost }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Nama Kamar --}}
                        <div class="form-group">
                            <label>Nama Kamar</label>
                            <input type="text" name="nama_kamar" class="form-control" value="{{ old('nama_kamar', $kamar->nama_kamar ?? '') }}" required>
                        </div>

                        {{-- Fasilitas --}}
                        <div class="form-group">
                            <label>Fasilitas</label>
                            <textarea name="fasilitas" class="form-control" rows="3" required>{{ old('fasilitas', $kamar->fasilitas ?? '') }}</textarea>
                        </div>

                        {{-- Harga --}}
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" step="0.01" name="harga" class="form-control" value="{{ old('harga', $kamar->harga ?? '') }}" required>
                        </div>

                        {{-- Status Kamar --}}
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status_kamar" class="form-control" required>
                                <option value="tersedia" {{ (old('status_kamar', $kamar->status_kamar ?? '') == 'tersedia') ? 'selected' : '' }}>Tersedia</option>
                                <option value="tidak tersedia" {{ (old('status_kamar', $kamar->status_kamar ?? '') == 'tidak tersedia') ? 'selected' : '' }}>Tidak Tersedia</option>
                            </select>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $kamar->deskripsi ?? '') }}</textarea>
                        </div>

                        {{-- Gambar --}}
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="gambar" class="form-control">
                            @if(isset($kamar) && $kamar->gambar)
                            <img src="{{ asset('storage/' . $kamar->gambar) }}" class="img-thumbnail mt-2" style="max-height: 200px;">
                            @endif
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kamar.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection