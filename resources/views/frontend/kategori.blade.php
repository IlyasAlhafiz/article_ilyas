<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="author" content="Pgrafi Team">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo/LogoPgrafiT.png') }}" />
  <title>Pgrafi | Kategori</title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  <!-- Animate.css CDN -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>

<body>

  @include('frontend.layouts.navbar')

  <div class="page-heading animate__animated animate__fadeInDown">
    <div class="container">
      <h2>Temukan Kategori Terpopuler di <em>Pgrafi</em></h2>
    </div>
  </div>

  <section class="featured-contests py-5">
    <div class="container">
      <div class="text-center mb-4 animate__animated animate__fadeInUp animate__delay-1s">
        <h6>Artikel Terkait</h6>
        <h4>Lihat Artikel <em>Populer</em> dalam Kategori <em>{{ $kategori->nama_kategori }}</em></h4>
      </div>

      <div class="row">
        @forelse($artikel as $data)
        <a href="{{ route('artikel.front.show', $data->slug) }}">
          <div class="col-lg-4 col-md-6 mb-4 animate__animated animate__zoomIn animate__delay-{{ $loop->index + 1 }}s">
            <div class="item shadow-sm">
              <div class="thumb">
                <img src="{{ asset('images/artikel/' . $data->gambar) }}" alt="{{ $data->judul }}">
                <a href="{{ route('penulis.front.show', $data->penulis->slug) }}">
                  <img src="{{ asset('/images/profil/' . $data->penulis->foto_profil) }}" alt="Foto Penulis" class="foto-penulis">
                </a>
              </div>
              <div class="down-content">
                <div class="row">
                  <div class="col-6">
                    <span class="judul-artikel">{{ $data->judul ?? '-' }}</span>
                  </div>
                  <div class="col-6 text-end">
                    <h6>{{ $kategori->nama_kategori }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
        @empty
          <div class="col-lg-12 text-center animate__animated animate__fadeInUp">
            <p class="text-muted">Tidak ada artikel dalam kategori ini.</p>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  @include('frontend.layouts.footer')

</body>

</html>
