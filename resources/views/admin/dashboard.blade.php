@extends('layout.main')
@section('content')


<!-- Tambahkan font digital dan style jam glowing -->
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">

<style>
    .digital-clock-container {
        background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 0 20px rgba(0, 255, 255, 0.2);
        color: #fff;
        text-align: center;
        font-family: 'Orbitron', sans-serif;
        animation: fadeIn 1s ease-in-out;
    }

    .digital-clock {
        font-size: 3rem;
        letter-spacing: 4px;
        color: #00fff7;
        text-shadow: 0 0 8px #00fff7, 0 0 20px #00fff7;
    }

    .dot-blink {
        animation: blink 1s infinite;
    }

    .clock-date {
        font-size: 1.1rem;
        color: #a3d5ff;
        margin-top: 8px;
        font-weight: 500;
    }

    @keyframes blink {
        50% {
            opacity: 0;
        }
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

<!-- Blade HTML -->
<div class="digital-clock-container">
    <h1 class="h4 mb-3">Selamat Datang,
        <span class="text-warning">
            @if(Auth::guard('pemilik')->check())
            {{ Auth::guard('pemilik')->user()->nama }}
            @endif
        </span>
    </h1>

    <div class="digital-clock">
        <span id="jam">00</span><span class="dot-blink">:</span>
        <span id="menit">00</span><span class="dot-blink">:</span>
        <span id="detik">00</span>
    </div>
    <div class="clock-date" id="current-date">Loading date...</div>
</div>

<!-- JS Digital Clock -->
<script>
    function updateClock() {
        const now = new Date();

        const jam = String(now.getHours()).padStart(2, '0');
        const menit = String(now.getMinutes()).padStart(2, '0');
        const detik = String(now.getSeconds()).padStart(2, '0');

        document.getElementById('jam').textContent = jam;
        document.getElementById('menit').textContent = menit;
        document.getElementById('detik').textContent = detik;

        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        document.getElementById('current-date').textContent = now.toLocaleDateString('id-ID', options);
    }

    setInterval(updateClock, 1000);
    updateClock();
</script>


@endsection