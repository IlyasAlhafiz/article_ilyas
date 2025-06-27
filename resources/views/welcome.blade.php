<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo/LogoPgrafiT.png') }}" />
    <title>Pgrafi | Fotografi , Videografi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  </head>

  <body>

    @include('frontend.layouts.navbar')

    @php $id = 1; @endphp
    @foreach($kategori as $data)
      <div class="main-banner">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 offset-lg-1">
              <div class="header-text">
                <h2 class="animate__animated animate__fadeInDown">
                  Selamat Datang <em>di Website Pgrafi</em>
                </h2>
                <p class="animate__animated animate__fadeInUp animate__delay-1s">
                  Website ini merupakan website percobaan
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      @break
    @endforeach

    @if ($artikel->count() > 0)
      <section class="featured-items" id="featured-items">
        
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="owl-features owl-carousel" style="position: relative; z-index: 5;">
                @foreach($artikel->take(4) as $data)
                <a href="{{ route('artikel.front.show', $data->slug) }}">
                  <div class="item animate__animated animate__zoomIn">
                    <div class="thumb">
                      <img src="{{ asset('images/artikel/' . $data->gambar) }}" alt="" width="400" height="350">
                      <div class="hover-effect">
                        <div class="content">
                          <h4>{{ $data->judul }}</h4>
                          <ul>
                            <li><span>Kategori:</span> {{ $data->kategori->nama_kategori }}</li>
                            <li><span>Penulis:</span> {{ $data->penulis->nama ?? 'Tidak diketahui' }}</li>
                            <li><span>Terbit Tanggal:</span> {{ $data->created_at->format('d M Y') }}</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>
    @endif

  <section class="closed-contests">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading text-center animate__animated animate__fadeInUp">
            <h6>Kategori Website Ini</h6>
            <h4><em>Kategori</em> Kami</h4>
          </div>
      <div class="top-categories py-5"">
        <div class="container">
          <div class="row" style="border-radius: 10px;">
            @foreach($semuaKategori as $kat)
              <div class="col-lg col-sm-4 mb-4 animate__animated animate__fadeInUp animate__delay-{{ $loop->index + 1 }}s">
                <a href="{{ route('kategoris.show', Str::slug($kat->nama_kategori)) }}">
                <div class="item text-center p-3 border rounded shadow-sm">
                  <img src="{{ asset('/images/kategori/' . $kat->gambar_kategori) }}" alt="Icon" width="20" height="450"  style="border-radius: 50px;">
                  <h4 class="mb-1"  style="color:#3498db;">{{ $kat->nama_kategori }}</h4>
                  <span class="d-block" style="color:black;">Total Artikel</span>
                  <span style="font-size: 30px; color:black;">{{ $kat->artikel->count() }}</span>
                </div>
                </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

<section class="py-5" style="background-color: #f9fafa;">
  <div class="section-heading text-center animate__animated animate__fadeInUp">
    <h6>Artikel Lainnya</h6>
    <h4><em>Artikel Terbaru</em> Dan Terlama</h4>
  </div>
  <div class="container">
    @if ($artikel->count() > 0)
      <div class="row">
        <div class="col-lg-8 mb-5">
          @php $artikel_terbaru = $artikel->first(); @endphp
          <article class="bg-white p-4 rounded shadow-sm animate__animated animate__fadeInUp">
            <a href="{{ route('artikel.front.show', $artikel_terbaru->slug) }}" class="text-dark text-decoration-none">
              <img src="{{ asset('images/artikel/' . $artikel_terbaru->gambar) }}" alt="{{ $artikel_terbaru->judul }}" class="img-fluid rounded mb-4" style="width: 100%; max-height: 450px; object-fit: cover;">
            </a>
            <div class="d-flex align-items-center mb-3">
              <a href="{{ route('penulis.front.show', $artikel_terbaru->penulis->slug) }}">
                <img src="{{ asset('/images/profil/' . $artikel_terbaru->penulis->foto_profil) }}" width="40px" height="50px" style="border-radius: 90%; object-fit: cover; margin-right: 15px;">
              </a>
            </div>
            <h1 class="fw-bold mb-0" style="font-size: 2rem;">{{ $artikel_terbaru->judul }}</h1>
            <p>{{ $artikel_terbaru->tentang }}</p>
            <div class="d-flex flex-wrap align-items-center text-muted small" style="gap: 1rem;">
              <span><i class="bi bi-calendar-event"></i> {{ $artikel_terbaru->created_at->translatedFormat('d F Y') }}</span>
              <span><i class="bi bi-person"></i> {{ $artikel_terbaru->penulis->nama ?? 'Tidak diketahui' }}</span>
              <span><i class="bi bi-tags"></i> {{ $artikel_terbaru->kategori->nama_kategori }}</span>
            </div>
            <div class="article-body" style="font-size: 1rem; line-height: 1.8; color: #333;">
              {!! nl2br(e($artikel_terbaru->deskripsi)) !!}
            </div>
            <a href="{{ route('artikel.front.show', $artikel_terbaru->slug) }}" class="btn btn-primary">Selengkapnya</a>
          </article>
        </div>

        <div class="col-lg-4">
          <aside class="bg-white p-4 rounded shadow-sm" style="top: 100px;">
            <h5 class="fw-bold border-bottom pb-2 mb-4">Artikel Lainnya</h5>
            @foreach($artikel->skip(1)->take(5) as $data)  
              <div class="d-flex mb-4 pb-3 border-bottom animate__animated animate__fadeInRight animate__delay-{{ $loop->index + 1 }}s">
                <a href="{{ route('artikel.front.show', $data->slug) }}" class="text-dark text-decoration-none">
                  <img src="{{ asset('images/artikel/' . $data->gambar) }}" alt="{{ $data->judul }}" class="rounded" style="width: 80px; height: 80px; object-fit: cover; flex-shrink: 0;">
                </a>
                <div class="mx-2">
                  <h6 class="mb-1 fw-semibold" style="font-size: 15px;">
                    <a href="{{ route('artikel.front.show', $data->slug) }}" class="text-dark text-decoration-none">
                      {{ Str::limit($data->judul, 50) }}
                    </a>  
                  </h6>
                  <small class="text-muted d-block">{{ $data->created_at->translatedFormat('d F Y') }}</small>
                </div>
              </div>
            @endforeach
          </aside>
        </div>
      </div>
    @endif
  </div>
</section>


@include('frontend.layouts.footer')
  </body>
</html>
