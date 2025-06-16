@extends('layout.main')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('kost.store')  }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Tambah Data Kost</h4>
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
                                    <input type="text" name="nama_kost" class="form-control" placeholder="Masukkan Nama Kost" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat Lengkap" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi (koordinat)</label>
                                    <input type="text" name="lokasi" class="form-control" placeholder="Contoh: -0.06438736749140415, 109.34744319656153">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="ckeditor"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Fasilitas</label>
                                    <textarea name="fasilitas" class="form-control" placeholder="Masukkan fasilitas yang tersedia, pisahkan dengan koma"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nomor WhatsApp</label>
                                            <input type="text" name="No_Wa" class="form-control" placeholder="Contoh: 628123456789">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="Email" class="form-control" placeholder="Contoh: kost@example.com">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Telepon</label>
                                            <input type="text" name="Telepon" class="form-control" placeholder="Contoh: 021123456" onkeypress="return hanyaAngka(event)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori">Pilih Kost</label>
                                        <select name="kategori" class="form-control" required>
                                            <option value="">-- Pilih Kategori Kost --</option>
                                            <option value="putra">Putra</option>
                                            <option value="putri">Putri</option>
                                            <option value="campur">Campur</option>
                                        </select>
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