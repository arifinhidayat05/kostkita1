@extends('template.navbar')
@section('content')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- produk -->
<div class="product-list mb-5 d-flex flex-wrap gap-3">
    @foreach ($kosts as $kost)
    @php
    $ribbonColor = '#0a58ca'; // Default blue (pria)
    $ribbonDarkColor = '#0a58ca'; // Darker blue

    $kategori = strtolower($kost->kategori);

    if($kategori === 'perempuan' || $kategori === 'putri') {
    $ribbonColor = '#d63384'; // Pink
    $ribbonDarkColor = '#a52d65'; // Darker pink
    } elseif($kategori === 'campur') {
    $ribbonColor = '#198754'; // Green
    $ribbonDarkColor = '#146c43'; // Darker green
    }
    @endphp

    <div class="product card position-relative" style="width: 18rem;">
        <div class="ribbon" style="background-color: {{ $ribbonColor }};">
            <span>{{ ucfirst($kost->kategori) }}</span>
        </div>

        @if ($kost->gambar)
        <img src="{{ asset($kost->gambar) }}" class="card-img-top" alt="{{ $kost->nama_kost }}">
        @else
        <div class="card-img-top d-flex align-items-center justify-content-center bg-light" style="height: 180px;">
            <small class="text-muted">[Tidak ada gambar]</small>
        </div>
        @endif
        <div class="card-body text-center">
            <h5 class="card-title">{{ $kost->nama_kost }}</h5>
            <a href="{{ route('kost.show', $kost->kost_id) }}" class="btn btn-primary">Lihat Kamar</a>
        </div>
    </div>
    @endforeach
</div>

<style>
    .product-list {
        overflow: visible;
    }

    .product {
        position: relative;
        overflow: hidden;
    }

    .ribbon {
        position: absolute;
        top: 10px;
        right: -30px;
        width: 120px;
        height: 30px;
        color: white;
        text-align: center;
        line-height: 30px;
        font-weight: 600;
        transform: rotate(45deg);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .ribbon::before,
    .ribbon::after {
        content: '';
        position: absolute;
        bottom: -5px;
        width: 10px;
        height: 10px;
    }

    .ribbon::before {
        left: 0;
        clip-path: polygon(0 0, 100% 0, 0 100%);
    }

    .ribbon::after {
        right: 0;
        clip-path: polygon(100% 0, 0 0, 100% 100%);
    }
</style>

<script>
    // Script untuk menyesuaikan warna ujung ribbon
    document.addEventListener('DOMContentLoaded', function() {
        const ribbons = document.querySelectorAll('.ribbon');

        ribbons.forEach(ribbon => {
            const bgColor = ribbon.style.backgroundColor;
            const darkColor = adjustColor(bgColor, -20); // Membuat warna lebih gelap

            // Set warna untuk ujung ribbon
            ribbon.style.setProperty('--ribbon-bg', bgColor);
            ribbon.style.setProperty('--ribbon-dark', darkColor);

            // Apply to pseudo-elements
            const style = document.createElement('style');
            style.textContent = `
                .ribbon[style*="${bgColor}"]::before,
                .ribbon[style*="${bgColor}"]::after {
                    background-color: ${darkColor};
                }
            `;
            document.head.appendChild(style);
        });

        function adjustColor(color, amount) {
            // Fungsi sederhana untuk menggelapkan warna
            return color.replace(/rgb\((\d+),\s*(\d+),\s*(\d+)\)/, function(match, r, g, b) {
                return 'rgb(' + Math.max(0, parseInt(r) + amount) + ',' +
                    Math.max(0, parseInt(g) + amount) + ',' +
                    Math.max(0, parseInt(b) + amount) + ')';
            });
        }
    });
</script>

@endsection