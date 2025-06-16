<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Kost - Sewa Kost</title>
    <!-- Bootstrap 5 CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"
        rel="stylesheet" />
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .kost-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .kost-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .kost-price {
            font-size: 24px;
            font-weight: bold;
            color: #0d6efd;
            /* Warna primary Bootstrap */
        }

        .kost-location img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 10px;
        }

        .kost-location a {
            text-decoration: none;
        }

        .kost-location a:hover {
            opacity: 0.8;
        }

        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }

        .btn-back {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- Detail Kost Section -->
    <div class="container my-5">
        <!-- Tombol Back -->
        <button
            class="btn btn-outline-primary btn-back"
            onclick="window.history.back()">
            <i href="profile.php" class="bi bi-arrow-left"></i> Kembali
        </button>
        <div class="row">
            <!-- Gambar Kost -->
            <div class="col-md-8">
                <img src="image1.png" alt="Gambar Kost" class="kost-image" />
            </div>
            <!-- Detail Kost -->
            <div class="col-md-4">
                <div class="kost-details">
                    <h2 class="text-primary">Hra Kost</h2>
                    <p class="kost-price">Rp 400.000 / Bulan</p>
                    <hr />
                    <h4 class="text-primary">Detail Kost</h4>
                    <ul>
                        <li>Luas Kamar: 4x4 meter</li>
                        <li>
                            Fasilitas: Kamar mandi dalam, AC, WiFi, Lemari, Meja belajar
                        </li>
                        <li>Listrik: Termasuk</li>
                        <li>Air: Termasuk</li>
                    </ul>
                    <hr />
                    <h4 class="text-primary">Deskripsi</h4>
                    <p>
                        Kost ini terletak di lokasi yang strategis, dekat dengan kampus,
                        pusat perbelanjaan, dan transportasi umum. Kamar nyaman dengan
                        fasilitas lengkap, cocok untuk mahasiswa atau pekerja.
                    </p>
                    <hr />
                    <h4 class="text-primary">Lokasi Kost</h4>
                    <div class="kost-location">
                        <a href="https://www.google.com/maps" target="_blank">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8157888588203!2d109.3448682757902!3d-0.06454293551278631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d599a6cfaa22f%3A0xe7846e0e61cddfba!2sHRA%20Kost!5e0!3m2!1sid!2sid!4v1742462185609!5m2!1sid!2sid"
                                width="370"
                                height="450"
                                style="border: 0"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </a>
                    </div>
                    <hr />
                    <button class="btn btn-primary w-100">Sewa Sekarang</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>