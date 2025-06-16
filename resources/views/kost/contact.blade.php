@extends('template.navbar')
@section('content')
<!-- Konten Pesan -->
<div class="message-box mx-4 mt-5 mb-5 p-4 bg-light rounded shadow">
    <h2 class="text-center"><i class="fas fa-paper-plane me-2"></i>Kirim Pesan</h2>
    <form>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukkan nama Anda" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda" required>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Nomor Telepon</label>
            <input type="tel" class="form-control" id="telepon" placeholder="Masukkan nomor telepon Anda" required>
        </div>
        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan Anda</label>
            <textarea class="form-control" id="pesan" rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
        </button>
    </form>
</div>

@endsection