@include('template.navbar')
<div class="container">
    <h2>Ulasan untuk {{ $kost->nama_kost }}</h2>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <p><strong>Rata-rata rating:</strong> {{ number_format($ratingRata, 1) }}/5</p>

    <h4>Kirim Ulasan</h4>
    <form action="{{ route('ulasan.store') }}" method="POST">
        @csrf
        <input type="hidden" name="kost_id" value="{{ $kost->kost_id }}">

        <div class="mb-3">
            <label for="rating">Rating (1–5):</label>
            <input type="number" name="rating" min="1" max="5" required class="form-control" value="5">
        </div>

        <div class="mb-3">
            <label for="komentar">Komentar:</label>
            <textarea name="komentar" rows="3" class="form-control" placeholder="Tulis ulasan..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>

    <hr>

    <h4>Daftar Ulasan</h4>
    @forelse ($ulasan as $u)
    <div class="card mb-3">
        <div class="card-body">
            <strong>{{ $u->pelanggan->nama ?? 'Anonim' }}</strong><br>
            Rating: {{ $u->rating }}/5<br>
            <small>{{ $u->created_at->format('d M Y') }}</small>
            <p>{{ $u->komentar }}</p>
        </div>
    </div>
    @empty
    <p>Belum ada ulasan.</p>
    @endforelse
</div>


<div class="container">
    <h2>Ulasan untuk {{ $kost->nama_kost }}</h2>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <p><strong>Rata-rata rating:</strong> {{ number_format($ratingRata, 1) }}/5</p>

    @include('template.footer')