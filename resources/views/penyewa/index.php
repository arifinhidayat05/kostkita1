<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navbar dan Footer</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .nav-tabs .nav-link {
            color: white !important;
        }

        .nav-tabs .nav-link.active,
        .nav-tabs .nav-link:hover {
            color: black !important;
        }

        .footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 40px 0;
            margin-top: auto;
        }

        .footer a {
            color: #ecf0f1;
            text-decoration: none;
        }

        .footer a:hover {
            color: #1abc9c;
        }

        .footer .social-icons a {
            font-size: 1.5rem;
            margin: 0 10px;
        }

        .footer .social-icons a:hover {
            color: #1abc9c;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
        }
    </style>

    <style>
        .hero-section {
            background: url('tips-Manajemen-Rumah-Kost-yang-Baik-dan-Benar-.jpg') no-repeat center center/cover;
            color: white;
            /* Teks putih */
            padding: 150px 0;
            text-align: center;
        }

        .feature-icon {
            font-size: 3rem;
            color: #0d6efd;
            /* Warna primary untuk ikon */
            margin-bottom: 20px;
        }

        .features-section {
            padding: 80px 0;
            background-color: white;
            /* Latar belakang putih */
        }

        .cta-section {
            background-color: #0d6efd;
            /* Warna primary untuk CTA */
            color: white;
            /* Teks putih */
            padding: 80px 0;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">KOSTKITA</a>
            <ul class="nav nav-tabs mx-auto">
                <li class="nav-item">
                    <button class="nav-link active fw-bold" onclick="navigateTo('index.php')">
                        Home
                    </button>
                </li>
                <li class="nav-item">
                    <button
                        class="nav-link  fw-bold"
                        onclick="navigateTo('profile.php')">
                        Booking
                    </button>
                </li>
                <li class="nav-item">
                    <button
                        class="nav-link  fw-bold"
                        onclick="navigateTo('contact.php')">
                        Contact
                    </button>
                </li>
            </ul>
            <form class="d-flex">
                <input
                    class="form-control me-2"
                    type="search"
                    placeholder="Search"
                    aria-label="Search" />
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
            <button class="btn btn-danger ms-3" type="button">Logout</button>
        </div>
    </nav>
    <!-- coontent -->

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-4 fw-bold">Temukan Kos Nyaman untuk Anda</h1>
            <p class="lead">Solusi terbaik untuk tempat tinggal Anda. Mulai pencarian Anda sekarang!</p>
            <a href="#" class="btn btn-light btn-lg">Cari Kos</a> <!-- Tombol dengan background putih -->
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="row text-center">
                <!-- Kamar Nyaman -->
                <div class="col-md-4">
                    <i class="bi bi-house-door feature-icon"></i>
                    <h3>Kamar Nyaman</h3>
                    <p>Kamar tidur yang nyaman dan bersih untuk istirahat Anda.</p>
                </div>
                <!-- Fasilitas Lengkap -->
                <div class="col-md-4">
                    <i class="bi bi-wifi feature-icon"></i>
                    <h3>Fasilitas Lengkap</h3>
                    <p>WiFi cepat, AC, dan fasilitas lengkap lainnya.</p>
                </div>
                <!-- Lokasi Strategis -->
                <div class="col-md-4">
                    <i class="bi bi-geo-alt feature-icon"></i>
                    <h3>Lokasi Strategis</h3>
                    <p>Dekat dengan kampus, pusat kota, dan transportasi umum.</p>
                </div>
            </div>
            <div class="row text-center mt-5">
                <!-- Harga Terjangkau -->
                <div class="col-md-4">
                    <i class="bi bi-cash-coin feature-icon"></i>
                    <h3>Harga Terjangkau</h3>
                    <p>Harga bersaing dengan kualitas terbaik.</p>
                </div>
                <!-- Keamanan -->
                <div class="col-md-4">
                    <i class="bi bi-shield-lock feature-icon"></i>
                    <h3>Keamanan</h3>
                    <p>Keamanan 24 jam untuk kenyamanan Anda.</p>
                </div>
                <!-- Dapur Bersama -->
                <div class="col-md-4">
                    <i class="bi bi-egg-fried feature-icon"></i>
                    <h3>Dapur Bersama</h3>
                    <p>Dapur bersih dan lengkap untuk memasak sehari-hari.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section">
        <div class="container text-center">
            <h2>Tertarik?</h2>
            <p class="lead">Segera hubungi kami atau kunjungi kos kami untuk informasi lebih lanjut.</p>
            <a href="#" class="btn btn-light btn-lg">Hubungi Kami</a> <!-- Tombol dengan background putih -->
        </div>
    </section>


    <!-- coontent end -->

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Kamar</a></li>
                        <li><a href="#">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Hubungi Kami</h5>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fas fa-map-marker-alt"></i> Jl. Contoh No. 123, Kota
                            Contoh
                        </li>
                        <li><i class="fas fa-phone"></i> +62 123 4567 890</li>
                        <li><i class="fas fa-envelope"></i> info@kostcontoh.com</li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Ikuti Kami</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <hr class="bg-light" />
            <div class="text-center pt-3">
                <p>&copy; 2023 Kost Contoh. Seluruh Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        function navigateTo(page) {
            window.location.href = page;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>