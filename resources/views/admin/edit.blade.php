@extends('layout.main')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('kost.update', ['id' => $kost->kost_id])  }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Edit Data Kost</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Foto Kost</label>
                                    <img class="foto-preview img-fluid mb-2" style="max-height: 200px; display: none;">
                                    <input type="file" name="gambar" class="form-control" onchange="previewFoto()">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Nama Kost</label>
                                    <input type="text" name="nama_kost" class="form-control" value="{{ old('nama_kost', $kost->nama_kost) }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control" value="{{ old('alamat',$kost->alamat) }}" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi (koordinat)</label>
                                    <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi',$kost->lokasi) }}">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="ckeditor"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Fasilitas</label>
                                    <textarea name="fasilitas" class="form-control" value="{{ old('fasilitas',$kost->fasilitas) }}"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nomor WhatsApp</label>
                                            <input type="text" name="No_Wa" class="form-control" value="{{ old('No.Wa',$kost->No_Wa) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="Email" class="form-control" value="{{ old('Email',$kost->Email) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Telepon</label>
                                            <input type="text" name="Telepon" class="form-control" placeholder="Contoh: 021123456" onkeypress="return hanyaAngka(event)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <!-- <button href="{{ route("kost.index") }}" type="button" class="btn btn-secondary">Kembali</button> -->
                            <a href="{{ route("kost.index") }}" type="button" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Basic image preview function
    function previewFoto() {
        const preview = document.querySelector('.foto-preview');
        const file = document.querySelector('input[name="gambar"]').files[0];
        const reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
            preview.style.display = 'none';
        }
    }

    // Only allow numbers input
    function hanyaAngka(event) {
        const charCode = (event.which) ? event.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    // Initialize CKEditor if needed
    if (document.getElementById('ckeditor')) {
        ClassicEditor
            .create(document.querySelector('#ckeditor'))
            .catch(error => {
                console.error(error);
            });
    }
</script>

@endsection