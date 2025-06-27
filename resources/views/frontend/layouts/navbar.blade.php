<!-- Link CSS -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/templatemo-snapx-photography.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

<!-- Header -->
<header class="header-area header-sticky">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <!-- Logo -->
          <a href="{{ route('welcome') }}" class="logo">
            <img src="{{ asset('images/logo/LogoPgrafiT.png') }}" alt="Logo PgrafiT" width="100%">
          </a>

          <!-- Nav -->
          <ul class="nav">
            <li><a href="{{ route('welcome') }}" class="active">Beranda</a></li>
            <li class="has-sub">
              <a href="javascript:void(0)">Kategori</a>
              <ul class="sub-menu">
                @foreach($semuaKategori as $data)
                  <li>
                    <a href="{{ route('kategoris.show', Str::slug($data->nama_kategori)) }}">
                      {{ $data->nama_kategori }}
                    </a>
                  </li>
                @endforeach
              </ul>
            </li>
                <li><a href="{{ route('tentang.penulis') }}">Tentang</a></li>
          </ul>

          <!-- Tombol Autentikasi -->
          <div class="border-button">
            <div class="dropdown auth-dropdown">
              @auth
              @if(Auth::user()->is_admin == 0)
                <button class="btn btn-outline-primary dropdown-toggle d-flex align-items-center" type="button" id="authDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user mr-2"></i> {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu dropdown-menu-right shadow-sm styled-dropdown" aria-labelledby="authDropdown">
                  <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display:none;">
                    @csrf
                  </form>
                  <a href="#" class="dropdown-item d-flex align-items-center" 
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out-alt mr-2"></i> Keluar
                  </a>
                </div>
                @endauth
              @endauth

              @guest
                <button class="btn btn-outline-primary dropdown-toggle d-flex align-items-center" type="button" id="authDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user mr-2"></i> Akun
                </button>
                <div class="dropdown-menu dropdown-menu-right shadow-sm styled-dropdown" aria-labelledby="authDropdown">
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('login') }}">
                    <i class="fa fa-sign-in-alt mr-2"></i> Masuk
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('register') }}">
                    <i class="fa fa-user-plus mr-2"></i> Daftar
                  </a>
                </div>
              @endguest

              @auth
              @if(Auth::user()->is_admin)
                <button class="btn btn-outline-primary dropdown-toggle d-flex align-items-center" type="button" id="authDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user mr-2"></i> Akun
                </button>
                <div class="dropdown-menu dropdown-menu-right shadow-sm styled-dropdown" aria-labelledby="authDropdown">
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('login') }}">
                    <i class="fa fa-sign-in-alt mr-2"></i> Masuk
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('register') }}">
                    <i class="fa fa-user-plus mr-2"></i> Daftar
                  </a>
                </div>
              @endauth
              @endauth
            </div>
          </div>

          <!-- Menu Trigger (Mobile) -->
          <a class='menu-trigger'>
            <span>Menu</span>
          </a>
        </nav>
      </div>
    </div>
  </div>
</header>
