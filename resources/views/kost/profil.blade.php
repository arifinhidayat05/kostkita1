@extends('template.navbar')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Profil Saya</h4>
                </div>

                <div class="card-body">
                    <!-- @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif -->
                    @if(session('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: "{{ session('success') }}",
                            timer: 2000,
                            showConfirmButton: false
                        });
                    </script>
                    @endif

                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                    <form method="POST" action="{{ route('profil.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ old('nama', $user->nama) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru (Kosongkan jika tidak ingin mengubah)</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>

                    @if($user->google_id)
                    <div class="mt-4 p-3 bg-light rounded">
                        <p class="mb-0">
                            <i class="fab fa-google text-danger"></i> Akun terhubung dengan Google
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection