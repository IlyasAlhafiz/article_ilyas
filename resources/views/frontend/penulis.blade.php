<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo/LogoPgrafiT.png') }}" />
    <title>Pgrafi | Penulis</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
  </head>
  <body>
    
    @include('frontend.layouts.navbar')

    <div class="page-heading animate__animated animate__fadeInDown">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2 header-text">
            <h2>Penulis <em>Artikel</em></h2>
          </div>
        </div>
      </div>
    </div>

    <div class="user-info animate__animated animate__fadeInUp animate__delay-1s">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="avatar">
              <img src="{{ asset('/images/profil/' . $penulis->foto_profil) }}" alt="{{ $penulis->nama }}" class="img-fluid rounded-circle" style="width: 200px; height: 180px;">
              <h4>{{ $penulis->nama }}</h4>
              <div>{{ $penulis->email }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <section class="portfolio">
      <div class="container">
        <div class="row">
          @foreach($artikel as $data)
          <div class="col-lg-5 animate__animated animate__fadeInUp animate__delay-{{ $loop->index + 2 }}s">
            <a href="{{ route('artikel.front.show', $data->slug) }}" class="d-block text-decoration-none">
              <div class="thumb position-relative">
                <img src="{{ asset('/images/artikel/' . $data->gambar) }}" alt="{{ $data->judul }}" class="img-fluid rounded">
                <div class="hover-effect position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                  <div class="content text-white text-center px-3">
                    <h4>{{ $data->judul }}</h4>
                    <span>{{ $data->tentang }}</span><br>
                    <span>{{ $data->created_at->translatedFormat('d F Y') }}</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    @include('frontend.layouts.footer')

  </body>
</html>
