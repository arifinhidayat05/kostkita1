<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kamar Standard AC</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 70%;
            margin: 30px auto;
            padding: 20px;
            box-sizing: border-box;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .room-header {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
        }

        .room-image {
            width: 500px;
            height: 350px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .room-info {
            flex: 1;
        }

        h1 {
            color: #2c3e50;
            margin-top: 0;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }

        .price {
            font-size: 1.5rem;
            color: #e74c3c;
            font-weight: bold;
            margin: 15px 0;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .status-tersedia {
            background-color: #d4edda;
            color: #155724;
        }

        .facilities {
            margin: 30px 0;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .facility-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }

        .facility-item {
            background-color: #ffffff;
            padding: 12px 15px;
            border-radius: 6px;
            border-left: 4px solid #1a73e8;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        .facility-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f1f8fe;
        }

        .facility-item i {
            margin-right: 10px;
            color: #1a73e8;
            font-size: 1.1rem;
        }

        @media (max-width: 768px) {
            .facility-list {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
        }

        @media (max-width: 480px) {
            .facility-list {
                grid-template-columns: 1fr;
            }

            .facilities {
                padding: 15px;
            }
        }

        .btn-booking {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 12px 25px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 15px;
            transition: background-color 0.3s;
        }

        .btn-booking:hover {
            background-color: #2980b9;
        }

        .room-description {
            margin: 30px 0;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #1a3a8f;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .room-description h3 {
            color: #1a3a8f;
            margin-bottom: 15px;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .room-description p {
            color: #333;
            line-height: 1.7;
            font-size: 1rem;
            text-align: justify;
        }

        @media (max-width: 768px) {
            .room-description {
                padding: 15px;
                margin: 20px 0;
            }

            .room-description h3 {
                font-size: 1.2rem;
            }

            .room-description p {
                font-size: 0.95rem;
            }

            .room-header {
                flex-direction: column;
            }

            .room-image {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="room-header">
            <img src="{{ asset(  $kamar->gambar) }}" alt="{{ $kamar->nama_kamar }}" class="room-image">

            <div class="room-info">
                <h1>{{ $kamar->nama_kamar }}</h1>

                <div class="price">Rp {{ number_format($kamar->harga, 0, ',', '.') }}/bulan</div>

                <div class="status-badge status-tersedia">Tersedia</div>

                <div class="facilities">
                    <h3>Fasilitas Kamar:</h3>
                    <div class="facility-list">
                        <div class="facility-item">{{ $kamar->fasilitas }}</div>
                    </div>
                </div>

                <!-- Contoh tombol pesan langsung -->
                <div style="margin-top: 20px;">
                    <form action="{{ route('pemesanan.pesan') }}" method="POST">
                        @csrf
                        <input type="hidden" name="kamar_id" value="{{ $kamar->kamar_id }}">
                        <button type="submit" style="
                            background-color: #007bff;
                            color: #fff;
                            font-size: 1.1rem;
                            font-weight: 500;
                            padding: 10px 24px;
                            border: none;
                            border-radius: 50px;
                            width: 50%;
                            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                            cursor: pointer;
                            transition: background-color 0.3s ease;">
                            Pesan Sekarang
                        </button>
                    </form>
                </div>


            </div>
        </div>

        <div class="room-description">
            <h3>Deskripsi Kamar:</h3>
            <p>{{ $kamar->deskripsi }}</p>
        </div>
    </div>
</body>

</html>