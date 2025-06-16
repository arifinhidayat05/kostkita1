<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Bootstrap 5</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 40px 0;
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
    </style>

    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .message-box {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
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
    </style>
</head>
</head>

<body>
    <!-- Kotak Kirim Pesan -->
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

    <!-- Bootstrap JS dan dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>