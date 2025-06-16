<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navbar dan Footer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('kost_asset/css/style.css') }}">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        a {
            text-decoration: none;
            -webkit-tap-highlight-color: transparent;
        }

        .navbar {
            background: linear-gradient(135deg, #1a3a8f 0%, #0d2259 100%);
            padding: 0.8rem 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            flex: 1;
            text-align: left;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            justify-content: center;
            flex: 2;
            margin: 0;
            padding: 0;
        }

        .nav-item {
            margin: 0 1rem;
            position: relative;
        }

        /* Perbesar area klik dan tambahkan padding */
        .nav-link {
            color: white !important;
            font-weight: 500;
            font-size: 1rem;
            padding: 1rem 0.5rem !important;
            transition: none;
            display: inline-block;
            position: relative;
        }

        /* Tambahkan efek underline saat hover */
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 8px;
            left: 0;
            background-color: white;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after,
        .nav-link:focus::after,
        .nav-link.active::after {
            width: 100%;
        }

        .nav-link:hover,
        .nav-link:focus {
            color: white !important;
            text-decoration: none;
            cursor: pointer;
        }

        .active {
            color: white !important;
            font-weight: 600;
        }

        .auth-section {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 1rem;
        }

        .cta-button {
            background-color: rgb(255, 0, 0);
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 4px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }

        .cta-button:hover {
            background-color: #d90000;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: white;
        }

        /* PROFIL DROPDOWN STYLING - Diperbaiki untuk lebih visible */
        .profile-dropdown {
            position: relative;
            display: inline-block;
        }

        .profile-btn {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            padding: 8px 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            color: white;
            min-width: 150px;
        }

        .profile-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .profile-img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            margin-right: 8px;
            object-fit: cover;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #1a3a8f;
        }

        .profile-name {
            margin-right: 8px;
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            min-width: 220px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1001;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 5px;
            animation: fadeIn 0.3s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown-content a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: all 0.2s;
            border-bottom: 1px solid #f0f0f0;
            font-size: 0.95rem;
        }

        .dropdown-content a:hover {
            background-color: #f8f9fa;
            color: #1a3a8f;
            padding-left: 20px;
        }

        .dropdown-content a:last-child {
            border-bottom: none;
        }

        .dropdown-content a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
            color: #555;
        }

        .logout-btn {
            color: #dc3545 !important;
            font-weight: 500;
        }

        .logout-btn:hover {
            background-color: #fff5f5 !important;
        }

        /* Tampilkan dropdown saat hover atau focus */
        .profile-dropdown:hover .dropdown-content,
        .profile-dropdown:focus-within .dropdown-content {
            display: block;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: stretch;
                padding: 1rem;
            }

            .logo,
            .auth-section {
                width: 100%;
                text-align: center;
                margin: 0.5rem 0;
            }

            .nav-menu {
                flex-direction: column;
                align-items: stretch;
                width: 100%;
                margin: 1rem 0;
            }

            .nav-item {
                margin: 0.3rem 0;
            }

            .nav-link {
                padding: 0.8rem 0.5rem !important;
                display: block;
            }

            .auth-section {
                justify-content: center;
            }

            .profile-dropdown {
                width: 100%;
                margin-top: 10px;
            }

            .profile-btn {
                width: 100%;
                justify-content: center;
            }

            .dropdown-content {
                width: 100%;
                position: static;
                box-shadow: none;
                border-radius: 0;
                animation: none;
            }
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
    </style>
</head>

<body>
    <nav class="navbar">
        <!-- Logo kiri -->
        <div class="logo">
            KostKita
        </div>

        <!-- Navigasi tengah -->
        <ul class="nav-menu">
            <li class="nav-item"><a href="{{ route('beranda') }}"
                    class="nav-link {{ request()->routeIs('kost.index') ? 'active' : '' }}">Beranda</a></li>
            <li class="nav-item"><a href="{{route('kost.indexkost')}}" class="nav-link">Kost</a></li>
            <!-- <li class="nav-item"><a href="{{ route('pelanggan.pemesanan.index') }}"
                    class="nav-link {{ request()->routeIs('pelanggan.pemesanan.index') ? 'active' : '' }}">Pemesanan</a>
            </li> -->
            <li class="nav-item"><a href="{{ route('tentang') }}" class="nav-link">Tentang Kami</a></li>
            <li class="nav-item"><a href="{{ route('contact') }}"
                    class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a></li>
        </ul>

        <!-- Profil dan Logout -->
        <div class="auth-section">
            @if(Auth::guard('pelanggan')->check())
            <div class="profile-dropdown">
                <button class="profile-btn">
                    <div class="profile-img">
                        {{ strtoupper(substr(Auth::guard('pelanggan')->user()->nama, 0, 1)) }}
                    </div>
                    <span class="profile-name">{{ Auth::guard('pelanggan')->user()->nama }}</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="{{ route('profil') }}"><i class="fas fa-user"></i> Profil Saya</a>
                    <a href="{{ route("pelanggan.pemesanan.index") }}"><i class="fas fa-history"></i> Riwayat Pesanan</a>
                    <a href=""><i class="fas fa-heart"></i> Favorit</a>
                    <a href="{{ route('logout') }}" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                </div>
            </div>
            @endif
        </div>
    </nav>

    @yield('content')

    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li><a href="{{ route("tentang") }}">Tentang Kami</a></li>
                        <li><a href="{{ route("kost.indexkost") }}">Kost</a></li>
                        <li><a href="{{ route("contact") }}">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Hubungi Kami</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt"></i> Jl. Perdana Kota Pontianak</li>
                        <li><i class="fas fa-phone"></i> +62 813 4536 7859</li>
                        <li><i class="fas fa-envelope"></i> arirwwg@gmail.com </li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Ikuti Kami</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-x"></i></a>
                    </div>
                </div>
            </div>
            <hr class="bg-light">
            <div class="text-center pt-3">
                <p>&copy; 2024 KostKita Seluruh Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        // Inisialisasi peta dengan koordinat dan zoom
        var map = L.map("map").setView([-0.0263, 109.3431], 13); // Contoh: Pontianak

        // Tambahkan layer tile dari OpenStreetMap
        L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        }).addTo(map);

        // Tambahkan marker
        L.marker([-0.0263, 109.3431])
            .addTo(map)
            .bindPopup("<b>Lokasi Kost</b><br>Ini adalah contoh lokasi.")
            .openPopup();

        // Fungsi untuk toggle dropdown di mobile
        document.addEventListener('DOMContentLoaded', function() {
            const profileDropdown = document.querySelector('.profile-dropdown');

            // Untuk layar mobile
            if (window.innerWidth <= 768) {
                profileDropdown.addEventListener('click', function(e) {
                    // Hentikan event jika yang diklik adalah link di dropdown
                    if (e.target.tagName === 'A') {
                        return;
                    }

                    const dropdownContent = this.querySelector('.dropdown-content');
                    dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
                });

                // Tutup dropdown saat klik di luar
                document.addEventListener('click', function(e) {
                    if (!profileDropdown.contains(e.target)) {
                        const dropdownContent = profileDropdown.querySelector('.dropdown-content');
                        dropdownContent.style.display = 'none';
                    }
                });
            }
        });
    </script>

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
</body>

</html>