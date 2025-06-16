<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navbar dengan Tab dan Search</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <!-- Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Saat tidak aktif & tidak di-hover */
        .nav-tabs .nav-link {
            color: white !important;
            /* Teks putih */
        }

        /* Saat tab aktif */
        .nav-tabs .nav-link.active {
            color: black !important;
            /* Teks hitam */
        }

        /* Saat hover */
        .nav-tabs .nav-link:hover {
            color: black !important;
            /* Teks hitam */
        }

        /* Footer */
        .footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 40px 0;
            margin-top: auto;
            /* Footer selalu di bawah */
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

        /* Konten Pesan */
        .message-box {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            margin: 40px auto;
            /* Jarak dari navbar dan footer */
            animation: fadeIn 1s ease-in-out;
        }

        .message-box h2 {
            color: #0d6efd;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .message-box .form-control {
            border-radius: 10px;
            border: 1px solid #ced4da;
            padding: 10px;
            margin-bottom: 15px;
        }

        .message-box .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 5px rgba(13, 110, 253, 0.5);
        }

        .message-box .btn-primary {
            background-color: #0d6efd;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            width: 100%;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }

        .message-box .btn-primary:hover {
            background-color: #0b5ed7;
        }

        .message-box textarea {
            resize: none;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Body */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        /* Navbar */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <!-- Logo di Kiri -->
            <a class="navbar-brand fw-bold" href="#">KOSTKITA</a>

            <!-- Tab Menu di Tengah -->
            <ul class="nav nav-tabs mx-auto">
                <li class="nav-item">
                    <button
                        class="nav-link fw-bold"
                        id="home-tab"
                        type="button"
                        onclick="navigateTo('index.php')">
                        Home
                    </button>
                </li>
                <li class="nav-item">
                    <button
                        class="nav-link fw-bold"
                        id="profile-tab"
                        type="button"
                        onclick="navigateTo('profile.php')">
                        Booking
                    </button>
                </li>
                <li class="nav-item">
                    <button
                        class="nav-link active fw-bold"
                        id="contact-tab"
                        type="button"
                        onclick="navigateTo('contact.php')">
                        Contact
                    </button>
                </li>
            </ul>

            <!-- Search Bar di Kanan -->
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

    <!-- Konten Pesan -->
    <div class="message-box">
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

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Bagian Tautan Cepat -->
                <div class="col-md-4 mb-4">
                    <h5>Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Kamar</a></li>
                        <li><a href="#">Kontak</a></li>
                    </ul>
                </div>

                <!-- Bagian Kontak -->
                <div class="col-md-4 mb-4">
                    <h5>Hubungi Kami</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt"></i> Jl. Contoh No. 123, Kota Contoh</li>
                        <li><i class="fas fa-phone"></i> +62 123 4567 890</li>
                        <li><i class="fas fa-envelope"></i> info@kostcontoh.com</li>
                    </ul>
                </div>

                <!-- Bagian Media Sosial -->
                <div class="col-md-4 mb-4">
                    <h5>Ikuti Kami</h5>
                    <div class="social-icons">
                        <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <!-- Garis Pemisah -->
            <hr class="bg-light">

            <!-- Hak Cipta -->
            <div class="text-center pt-3">
                <p>&copy; 2023 Kost Contoh. Seluruh Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        function navigateTo(page) {
            window.location.href = page; // Arahkan ke halaman yang diinginkan
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>