<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kost - {{ $kost->nama_kost }}</title>
    <!-- Leaflet CSS -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin="" />
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
            width: 100%;
            padding: 20px 40px;
            box-sizing: border-box;
        }

        .kost-header {
            display: flex;
            gap: 30px;
            margin-bottom: 40px;
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            flex-wrap: wrap;
        }

        .kost-image {
            width: 500px;
            max-width: 100%;
            height: auto;
            max-height: 350px;
            object-fit: cover;
            border-radius: 8px;
            border: 3px solid #1a365d;
        }

        .kost-info {
            flex: 1;
            min-width: 250px;
        }

        h1 {
            color: #1a365d;
            margin-top: 0;
            border-bottom: 2px solid #2c5282;
            padding-bottom: 10px;
        }

        .section-title {
            color: #1a365d;
            border-left: 4px solid #2c5282;
            padding-left: 10px;
            margin: 30px 0 20px;
        }

        .kamar-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }

        .kamar-card {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .kamar-card:hover {
            transform: translateY(-5px);
        }

        .kamar-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 3px solid #2c5282;
        }

        .kamar-details {
            padding: 15px;
        }

        .kamar-details h3 {
            color: #1a365d;
            margin-top: 0;
        }

        .price {
            font-size: 1.2rem;
            color: #2b6cb0;
            font-weight: bold;
            margin: 10px 0;
        }

        .status-tersedia {
            color: #38a169;
            font-weight: 500;
        }

        .status-tidak-tersedia {
            color: #e53e3e;
            font-weight: 500;
        }

        .btn-pesan {
            display: inline-block;
            background-color: #2b6cb0;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .btn-pesan:hover {
            background-color: #1a365d;
        }

        .contact-info {
            background-color: #ebf8ff;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #2b6cb0;
            width: 48%;
            /* Slightly less than half to accommodate gap */
            height: 300px;
            /* Match height with the map */
            box-sizing: border-box;
        }

        .map {
            width: 48%;
            border-radius: 8px;
            overflow: hidden;
            border: 2px solid #2c5282;
            height: 300px;
        }

        .flex-container {
            display: flex;
            gap: 10px;
            /* Small gap for separation */
            justify-content: space-between;
            flex-wrap: nowrap;
            /* Prevent wrapping to keep side-by-side */
            margin-top: 20px;
            /* Added margin-top to the container instead */
        }

        @media (max-width: 768px) {
            .kost-header {
                flex-direction: column;
                align-items: center;
            }

            .kost-info {
                width: 100%;
            }

            .kost-image {
                width: 100%;
                max-height: 300px;
            }

            .container {
                padding: 20px;
            }

            .flex-container {
                flex-direction: column;
            }

            .map {
                width: 100%;
                margin-top: 10px;
                /* Added small margin for mobile */
            }

            .contact-info {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="kost-header">
            <img src="{{ asset(  $kost->gambar) }}" alt="{{ $kost->nama_kost }}" class="kost-image">
            <div class="kost-info">
                <h1>{{ $kost->nama_kost }}</h1>
                <p><strong>Alamat:</strong> {{ $kost->alamat }}</p>
                <p><strong>Deskripsi:</strong> {{ $kost->deskripsi }}</p>
                <p><strong>Fasilitas Umum:</strong> {{ $kost->fasilitas }}</p>

                <!-- Kontak Pemilik dan Google Maps berada di dalam flex-container -->
                <div class="flex-container">
                    <div class="contact-info">
                        <h3 style="margin-top: 0; color: #1a365d;">Kontak Pemilik:</h3>
                        <p><strong>WA:</strong> {{ $kost->No_Wa }}</p>
                        <p><strong>Email:</strong> {{ $kost->Email }}</p>
                        <p><strong>Telepon:</strong> {{ $kost->Telepon }}</p>
                    </div>

                    <div id="map" class="map"></div>
                </div>

            </div>
        </div>
    </div>

    <h2 class=" section-title">Daftar Kamar</h2>
    <div class="kamar-list">
        @foreach($kamar as $kmr)
        <div class="kamar-card">
            <img src="{{ asset( $kmr->gambar) }}" alt="{{ $kmr->nama_kamar }}" class="kamar-image">

            <div class="kamar-details">
                <h3>{{ $kmr->nama_kamar }}</h3>
                <p><strong>Fasilitas:</strong> {{ $kmr->fasilitas }}</p>
                <p class="price">Rp {{ number_format($kmr->harga, 0, ',', '.') }}/bulan</p>
                <p class="status-{{ str_replace(' ', '-', $kmr->status_kamar) }}">
                    <strong>Status:</strong> {{ ucfirst($kmr->status_kamar) }}
                </p>

                @if($kmr->status_kamar == 'tersedia')
                <a href="{{ route('kamar.show', $kmr->kamar_id) }}" class="btn-pesan">Pesan Kamar</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <!-- <h2 class=" section-title">Ulasan Pelanggan</h2> -->

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Review Section -->
                <div class="review-section">
                    <div class="review-header">
                        <h2 class="review-title">
                            <i class="fas fa-comment-alt me-2"></i>Ulasan Penghuni
                        </h2>
                        @if($kost->ulasan->count() > 0)
                        <div class="rating-summary">
                            <div class="average-rating">
                                <span class="rating-number">{{ number_format($kost->ulasan->avg('rating') ?? 0, 1) }}</span>
                                <span class="rating-max">/5</span>
                            </div>
                            <div class="stars">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="{{ $i <= round($kost->ulasan->avg('rating')) ? 'fas' : 'far' }} fa-star"></i>
                                    @endfor
                            </div>
                            <span class="review-count">{{ $kost->ulasan->count() }} ulasan</span>
                        </div>
                        @endif
                    </div>

                    <div class="review-list">
                        @if($kost->ulasan->count() > 0)
                        @foreach($kost->ulasan as $ulasan)
                        <div class="review-card">
                            <div class="reviewer-info">
                                <div class="reviewer-avatar">
                                    {{ substr($ulasan->pelanggan->nama ?? 'A', 0, 1) }}
                                </div>
                                <div class="reviewer-meta">
                                    <h4 class="reviewer-name">{{ $ulasan->pelanggan->nama ?? 'Anonim' }}</h4>
                                    <div class="review-date">{{ $ulasan->created_at->format('d M Y') }}</div>
                                </div>
                            </div>
                            <div class="review-content">
                                <div class="review-rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="{{ $i <= $ulasan->rating ? 'fas' : 'far' }} fa-star"></i>
                                        @endfor
                                        <span class="rating-text ms-2">{{ $ulasan->rating }}.0</span>
                                </div>
                                <p class="review-text">{{ $ulasan->komentar }}</p>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="empty-reviews">
                            <i class="far fa-comment-dots"></i>
                            <h3>Belum ada ulasan</h3>
                            <p>Jadilah yang pertama memberikan ulasan</p>
                        </div>
                        @endif
                    </div>

                    <!-- Review Form -->
                    <div class="review-form mt-4">
                        <h4 class="form-title">Tulis Ulasan Anda</h4>
                        <form action="{{ route('ulasan.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="kost_id" value="{{ $kost->kost_id }}">

                            <div class="form-group mb-4">
                                <label class="form-label mb-2">Beri Rating:</label>
                                <div class="star-rating-container">
                                    <div class="star-rating">
                                        @for($i = 5; $i >= 1; $i--)
                                        <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ $i == 5 ? 'checked' : '' }}>
                                        <label for="star{{ $i }}"><i class="far fa-star"></i></label>
                                        @endfor
                                    </div>
                                    <div class="rating-value-text">
                                        <span class="selected-rating">5</span> dari 5 bintang
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="komentar" class="form-label mb-2">Tulis Ulasan:</label>
                                <div class="comment-box">
                                    <textarea name="komentar" rows="4" class="form-control-custom"
                                        placeholder="Bagaimana pengalaman Anda tinggal di kos ini? (Minimal 10 karakter)"
                                        id="comment-textarea" required></textarea>
                                    <div class="comment-footer">
                                        <small class="char-counter"><span id="char-count">0</span>/500 karakter</small>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-submit-review">
                                <i class="fas fa-paper-plane me-2"></i> Kirim Ulasan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Review Section Styles */
        .review-section {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 30px;
            border-bottom: 1px solid #f0f0f0;
            flex-wrap: wrap;
        }

        .review-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2d3748;
            margin: 0;
        }

        .review-title i {
            color: #4a5568;
        }

        .rating-summary {
            text-align: center;
        }

        .average-rating {
            display: inline-block;
            position: relative;
            margin-right: 10px;
        }

        .rating-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2d3748;
        }

        .rating-max {
            font-size: 1.2rem;
            color: #718096;
            position: absolute;
            top: 5px;
            right: -25px;
        }

        .stars {
            color: #f6ad55;
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .review-count {
            font-size: 0.9rem;
            color: #718096;
        }

        .review-list {
            padding: 20px 30px;
        }

        .review-card {
            padding: 25px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .review-card:last-child {
            border-bottom: none;
        }

        .reviewer-info {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .reviewer-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #4299e1;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            font-weight: 600;
            margin-right: 15px;
        }

        .reviewer-meta {
            flex: 1;
        }

        .reviewer-name {
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0 0 5px 0;
            color: #2d3748;
        }

        .review-date {
            font-size: 0.85rem;
            color: #718096;
        }

        .review-content {
            padding-left: 65px;
        }

        .review-rating {
            color: #f6ad55;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .rating-text {
            font-size: 0.9rem;
            color: #4a5568;
        }

        .review-text {
            font-size: 1rem;
            line-height: 1.6;
            color: #4a5568;
            margin: 0;
        }

        .empty-reviews {
            text-align: center;
            padding: 40px 20px;
        }

        .empty-reviews i {
            font-size: 3.5rem;
            color: #cbd5e0;
            margin-bottom: 20px;
        }

        .empty-reviews h3 {
            font-size: 1.3rem;
            color: #4a5568;
            margin-bottom: 10px;
        }

        .empty-reviews p {
            color: #718096;
            margin-bottom: 0;
        }

        /* Review Form Styles */
        .review-form {
            padding: 0 30px 30px 30px;
            background-color: #f9fafb;
            border-top: 1px solid #f0f0f0;
        }

        .form-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 20px;
        }

        /* Star Rating Styles */
        .star-rating-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .star-rating {
            display: flex;
            direction: rtl;
            /* Right to left for better hover effect */
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            color: #ddd;
            font-size: 2rem;
            cursor: pointer;
            padding: 0 5px;
            transition: all 0.2s ease;
        }

        .star-rating input:checked~label,
        .star-rating label:hover,
        .star-rating label:hover~label {
            color: #FFC107;
        }

        .star-rating input:checked+label {
            color: #FFC107;
        }

        .rating-value-text {
            font-size: 1rem;
            color: #4a5568;
        }

        .selected-rating {
            font-weight: 600;
            color: #2d3748;
        }

        /* Comment Box Styles */
        .comment-box {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .comment-box:focus-within {
            border-color: #4285f4;
            box-shadow: 0 0 0 2px rgba(66, 133, 244, 0.2);
        }

        .form-control-custom {
            width: 100%;
            padding: 15px;
            border: none;
            font-size: 1rem;
            resize: none;
            outline: none;
        }

        .comment-footer {
            padding: 0 15px 10px;
            display: flex;
            justify-content: space-between;
            background-color: #f8f9fa;
        }

        .char-counter {
            color: #666;
            font-size: 0.85rem;
        }

        /* Submit Button */
        .btn-submit-review {
            background-color: #4285f4;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            margin-top: 10px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
        }

        .btn-submit-review:hover {
            background-color: #3367d6;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .review-header {
                flex-direction: column;
                text-align: center;
                padding: 20px;
            }

            .rating-summary {
                margin-top: 15px;
            }

            .review-list {
                padding: 15px 20px;
            }

            .review-content {
                padding-left: 0;
                margin-top: 15px;
            }

            .review-form {
                padding: 0 20px 20px 20px;
            }

            .star-rating label {
                font-size: 1.8rem;
            }

            .rating-value-text {
                font-size: 0.9rem;
            }

            .btn-submit-review {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Character counter and validation
            const textarea = document.getElementById('comment-textarea');
            const charCount = document.getElementById('char-count');
            const form = document.querySelector('form');

            textarea.addEventListener('input', function() {
                const currentLength = this.value.length;
                charCount.textContent = currentLength;

                if (currentLength > 500) {
                    charCount.style.color = '#f44336';
                } else if (currentLength < 10) {
                    charCount.style.color = '#FF9800';
                } else {
                    charCount.style.color = '#4CAF50';
                }
            });

            form.addEventListener('submit', function(e) {
                if (textarea.value.length < 10) {
                    e.preventDefault();
                    alert('Ulasan harus minimal 10 karakter');
                    textarea.focus();
                }
            });

            // Star rating interaction
            const ratingInputs = document.querySelectorAll('.star-rating input');
            const selectedRating = document.querySelector('.selected-rating');

            ratingInputs.forEach(input => {
                input.addEventListener('change', function() {
                    selectedRating.textContent = this.value;
                });
            });
        });
    </script>




    <!-- map -->
    <script
        src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
    <script>
        // Get location from PHP and ensure it's valid
        var lokasiString = "{{ $kost->lokasi ?? '' }}"; // Using null coalescing for safety
        console.log('Location string:', lokasiString);


        // Default coordinates (center of Indonesia) if location is invalid
        var defaultLocation = [-2.5489, 118.0149];
        var lokasiArray = defaultLocation;

        // Try to parse the location string if it exists
        if (lokasiString && lokasiString.includes(',')) {
            try {
                lokasiArray = lokasiString.split(',').map(function(item) {
                    return parseFloat(item.trim());
                });

                // Validate coordinates
                if (isNaN(lokasiArray[0]) || isNaN(lokasiArray[1])) {
                    console.warn('Invalid coordinates, using default');
                    lokasiArray = defaultLocation;
                }
            } catch (e) {
                console.error('Error parsing location:', e);
                lokasiArray = defaultLocation;
            }
        } else {
            console.warn('No valid location string found, using default');
        }

        console.log('Using coordinates:', lokasiArray);

        // Initialize map only if container exists
        if (document.getElementById('map')) {
            var map = L.map('map').setView(lokasiArray, 13);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // Add marker only if coordinates are valid
            if (Array.isArray(lokasiArray) && lokasiArray.length === 2) {
                L.marker(lokasiArray)
                    .addTo(map)
                    .bindPopup("<b>{{ $kost->nama_kost }}</b><br>{{ $kost->alamat }}")
                    .openPopup();
            } else {
                console.error('Invalid coordinates for marker:', lokasiArray);
            }
        } else {
            console.error('Map container not found');
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</body>

</html>