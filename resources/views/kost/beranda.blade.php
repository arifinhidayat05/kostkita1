@extends('template.navbar')

@section('content')
<!-- Hero Section -->
<section class="hero-section py-5 bg-primary text-white mb-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Temukan Kos Nyaman untuk Anda</h1>
                <p class="lead mb-4">Solusi terbaik untuk tempat tinggal Anda. Mulai pencarian Anda sekarang!</p>
                <a href="{{ route('kost.indexkost') }}" class="btn btn-light btn-lg px-4 me-2">Cari Kos</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-4">Hubungi Kami</a>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                    alt="Kos Nyaman" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section py-5 bg-light">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Mengapa Memilih Kami?</h2>
            <p class="lead text-muted">Kami menyediakan pengalaman menginap terbaik untuk Anda</p>
        </div>

        <div class="row g-4">
            <!-- Kamar Nyaman -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                            <i class="fas fa-bed fs-4"></i>
                        </div>
                        <h3>Kamar Nyaman</h3>
                        <p class="text-muted">Kamar tidur yang nyaman dan bersih untuk istirahat Anda.</p>
                    </div>
                </div>
            </div>

            <!-- Fasilitas Lengkap -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                            <i class="fas fa-wifi fs-4"></i>
                        </div>
                        <h3>Fasilitas Lengkap</h3>
                        <p class="text-muted">WiFi cepat, AC, dan fasilitas lengkap lainnya.</p>
                    </div>
                </div>
            </div>

            <!-- Lokasi Strategis -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                            <i class="fas fa-map-marker-alt fs-4"></i>
                        </div>
                        <h3>Lokasi Strategis</h3>
                        <p class="text-muted">Dekat dengan kampus, pusat kota, dan transportasi umum.</p>
                    </div>
                </div>
            </div>

            <!-- Harga Terjangkau -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                            <i class="fas fa-tag fs-4"></i>
                        </div>
                        <h3>Harga Terjangkau</h3>
                        <p class="text-muted">Harga bersaing dengan kualitas terbaik.</p>
                    </div>
                </div>
            </div>

            <!-- Keamanan -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                            <i class="fas fa-shield-alt fs-4"></i>
                        </div>
                        <h3>Keamanan</h3>
                        <p class="text-muted">Keamanan 24 jam untuk kenyamanan Anda.</p>
                    </div>
                </div>
            </div>

            <!-- Dapur Bersama -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-primary bg-gradient text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                            <i class="fas fa-utensils fs-4"></i>
                        </div>
                        <h3>Dapur Bersama</h3>
                        <p class="text-muted">Dapur bersih dan lengkap untuk memasak sehari-hari.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Apa Kata Mereka?</h2>
            <p class="lead text-muted">Testimoni dari penghuni kos kami</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" class="rounded-circle me-3" width="60" height="60" alt="Testimoni 1">
                            <div>
                                <h5 class="mb-0">Sarah Wijaya</h5>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0">"Kosnya nyaman banget, fasilitas lengkap dan harganya terjangkau. Recommended!"</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <img src="https://randomuser.me/api/portraits/men/45.jpg" class="rounded-circle me-3" width="60" height="60" alt="Testimoni 2">
                            <div>
                                <h5 class="mb-0">Budi Santoso</h5>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0">"Lokasi strategis dekat kampus, pemiliknya ramah dan pelayanan memuaskan."</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" class="rounded-circle me-3" width="60" height="60" alt="Testimoni 3">
                            <div>
                                <h5 class="mb-0">Dewi Lestari</h5>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0">"Tempatnya bersih, aman, dan nyaman. Sudah 2 tahun tinggal disini dan sangat puas."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section
<section class="cta-section py-5 bg-primary text-white">
    <div class="container py-4 text-center">
        <h2 class="fw-bold mb-4">Tertarik?</h2>
        <p class="lead mb-5">Segera hubungi kami atau kunjungi kos kami untuk informasi lebih lanjut.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('kost.indexkost') }}" class="btn btn-light btn-lg px-4">Lihat Daftar Kos</a>
            <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-4">Hubungi Kami</a>
        </div>
    </div>
</section> -->

@endsection