<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pgrafi | Tentang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
  <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo/LogoPgrafiT.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/tentang.css') }}">
</head>
<body>

  @include('frontend.layouts.navbar')

  <div class="page-heading animate__animated animate__fadeInDown">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 header-text">
          <h2>Tentang Artikel di <em>Pgrafi</em></h2>
          <p>
            Dunia fotografi adalah seni dan teknologi dalam menangkap momen. Melalui artikel-artikel di Pgrafi, 
            kamu bisa mempelajari berbagai hal mulai dari teknik dasar pemotretan, komposisi visual, pencahayaan, 
            hingga ulasan peralatan terbaru. Artikel kami ditulis langsung oleh para penulis dan fotografer berpengalaman 
            yang siap membagikan wawasan mereka kepada pembaca. Temukan inspirasi, tips praktis, dan cerita di balik setiap karya fotografi!
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <h2 class="section-title animate__animated animate__fadeInDown">Daftar Penulis Artikel</h2>
    <div class="row">
      @forelse($penulis as $item)
        <div class="col-md-4 mb-4 animate__animated animate__fadeInUp animate__delay-{{ $loop->index + 1 }}s">
          <div class="penulis-card">
            <div class="text-center mb-3">
              <a href="{{ route('penulis.front.show', $item->slug) }}">
                <img src="{{ asset('images/profil/' . $item->foto_profil) }}" alt="{{ $item->nama }}" class="profile-img mb-2">
              </a>
              <h5 class="judul-penulis">{{ $item->nama }}</h5>
            </div>

            @if($item->artikel->count())
              <h6 class="fw-bold mb-2">📝 Artikel oleh {{ $item->nama }}:</h6>
              <ul class="list-unstyled artikel-item">
                @foreach($item->artikel->take(3) as $artikel)
                  <li class="mb-3">
                    <a href="{{ route('artikel.front.show', $artikel->slug) }}" class="text-dark fw-semibold">
                      {{ $artikel->judul }}
                    </a><br>
                    <span class="artikel-meta">
                      {{ $artikel->created_at->format('d M Y') }} | {{ $artikel->kategori->nama_kategori ?? '-' }}
                    </span>
                    <p class="tentang-artikel">{{ Str::limit(strip_tags($artikel->isi), 90, '...') }}</p>
                  </li>
                @endforeach
              </ul>
              @if($item->artikel->count() > 3)
                <a href="{{ route('penulis.front.show', $item->slug) }}" class="lihat-semua">Lihat semua artikel &rarr;</a>
              @endif
            @else
              <p class="text-muted text-center mt-3">Belum ada artikel yang ditulis.</p>
            @endif
          </div>
        </div>
      @empty
        <div class="col-12 animate__animated animate__fadeInUp">
          <p class="text-center text-muted">Belum ada penulis terdaftar.</p>
        </div>
      @endforelse
    </div>
  </div>

  @include('frontend.layouts.footer')

</body>
</html>
