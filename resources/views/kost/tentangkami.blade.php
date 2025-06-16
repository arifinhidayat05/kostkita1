@extends('template.navbar')

@section('content')
<!-- Hero Section About -->
<section class="about-hero py-5 bg-light">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Tentang KostKu</h1>
                <p class="lead mb-4">Menyediakan penginapan nyaman dengan fasilitas lengkap sejak 2024.</p>
                <div class="d-flex gap-3">
                    <div class="bg-primary text-white rounded p-3 text-center">
                        <h3 class="mb-0">1+</h3>
                        <p class="mb-0">Tahun Pengalaman</p>
                    </div>
                    <div class="bg-primary text-white rounded p-3 text-center">
                        <h3 class="mb-0">100+</h3>
                        <p class="mb-0">Penghuni Puas</p>
                    </div>
                    <div class="bg-primary text-white rounded p-3 text-center">
                        <h3 class="mb-0">5</h3>
                        <p class="mb-0">Anggota Tim</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                    alt="Tentang Kami" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- Our Story -->
<section class="py-5">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2">
                <h2 class="fw-bold mb-4">Cerita Kami</h2>
                <p>KostKu didirikan pada tahun 2024 dengan visi memberikan tempat tinggal yang nyaman dan terjangkau bagi mahasiswa dan pekerja muda. Dengan konsep modern dan fasilitas lengkap, kami hadir untuk memenuhi kebutuhan tempat tinggal masa kini.</p>
                <p>Tim profesional kami terdiri dari 5 orang yang berdedikasi untuk memberikan pelayanan terbaik kepada setiap penghuni KostKu.</p>
            </div>
            <div class="col-lg-6 order-lg-1">
                <img src="https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                    alt="Sejarah Kami" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- Our Team -->
<!-- Our Team -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Tim Kami</h2>
            <p class="lead text-muted"></p>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
            <!-- Anggota 1 -->
            <div class="col">
                <div class="card border-0 shadow-sm h-10">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                        class="rounded-circle d-block mx-auto"
                        style="width: 200px; height: 200px; object-fit: cover;"
                        alt="Manager">
                    <div class="card-body text-center">
                        <h5 class="card-title">Budi Santoso</h5>
                        <p class="text-muted">Founder & CEO</p>
                        <p class="card-text">"Mendirikan KostKu di 2024 untuk memberikan solusi tempat tinggal modern."</p>
                    </div>
                </div>
            </div>

            <!-- Anggota 2 -->
            <div class="col">
                <div class="card border-0 shadow-sm h-100">
                    <img src="{{ asset('profile_team/octa.jpg') }}"
                        class="rounded-circle d-block mx-auto"
                        style="width: 200px; height: 200px; object-fit: cover;"
                        alt="Manager">

                    <div class="card-body text-center">
                        <h5 class="card-title">OCTA CHRISTYO</h5>
                        <p class="text-muted">Operational Manager</p>
                        <p class="card-text">"Memastikan operasional harian berjalan lancar sejak awal berdiri."</p>
                    </div>
                </div>
            </div>

            <!-- Anggota 3 -->
            <div class="col">
                <div class="card border-0 shadow-sm h-10">
                    <img src="{{ asset('profile_team/agnes.jpg') }}"
                        class="rounded-circle d-block mx-auto"
                        style="width: 200px; height: 200px; object-fit: cover;"
                        alt="Manager">
                    <div class="card-body text-center">
                        <h5 class="card-title">MARIA AGNES TIA RAMI</h5>
                        <p class="text-muted">Customer Service</p>
                        <p class="card-text">"Saya membantu penghuni sejak KostKu pertama kali dibuka."</p>
                    </div>
                </div>
            </div>

            <!-- Anggota 4 -->
            <div class="col">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                        class="rounded-circle d-block mx-auto"
                        style="width: 200px; height: 200px; object-fit: cover;"
                        alt="Manager">
                    <div class="card-body text-center">
                        <h5 class="card-title">Rina Fitriani</h5>
                        <p class="text-muted">Marketing Manager</p>
                        <p class="card-text">"Memperkenalkan KostKu sejak awal berdiri di tahun 2024."</p>
                    </div>
                </div>
            </div>

            <!-- Anggota 5 -->
            <div class="col">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1590086783191-a0694c7d1e6e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                        class="rounded-circle d-block mx-auto"
                        style="width: 200px; height: 200px; object-fit: cover;"
                        alt="Manager">
                    <div class="card-body text-center">
                        <h5 class="card-title">Agus Prabowo</h5>
                        <p class="text-muted">Finance Manager</p>
                        <p class="card-text">"Mengelola keuangan KostKu dengan transparan dan profesional."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Our Values -->
<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Nilai Kami</h2>
            <p class="lead text-muted">Prinsip yang kami pegang teguh</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                            <i class="fas fa-heart fs-4"></i>
                        </div>
                        <h3>Kenyamanan</h3>
                        <p class="text-muted">Kami memprioritaskan kenyamanan penghuni sebagai hal utama.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                            <i class="fas fa-shield-alt fs-4"></i>
                        </div>
                        <h3>Keamanan</h3>
                        <p class="text-muted">Sistem keamanan 24 jam untuk ketenangan penghuni.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                            <i class="fas fa-hand-holding-heart fs-4"></i>
                        </div>
                        <h3>Pelayanan</h3>
                        <p class="text-muted">Pelayanan terbaik adalah komitmen kami kepada penghuni.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->

@endsection