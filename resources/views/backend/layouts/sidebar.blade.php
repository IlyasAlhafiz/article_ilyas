<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('vendor/sweetalert/sweetalert.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/sidebar.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<aside class="left-sidebar">
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-right">
      <a href="{{ route('welcome') }}" class="text-nowrap logo-img" style="text-decoration: none; font-weight: bold; font-size: 36px; color: #2C3E50; letter-spacing: 2px;">
      <img src="{{ asset('images/logo/LogoPgrafiT.png') }}" alt="User" width="100%">
    </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
      </div>
  </div>

  <div class="image-container">
    <img id="sidebarImage" src="{{ asset('images/default-placeholder.jpg') }}" alt="Gambar Sidebar" class="img-fluid">
  </div>
    @if(Auth::user()->is_admin === 1)
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
      <ul id="sidebarnav">
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('home.index') }}" aria-expanded="false">
            <i class="bi bi-house-door"></i>
            <span class="hide-menu">Beranda</span>
          </a>
        </li>

        <li><span class="sidebar-divider lg"></span></li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('kategori.index') }}" aria-expanded="false">
            <i class="bi bi-tag"></i>
            <span class="hide-menu">Kategori</span>
          </a>
        </li>

        <li><span class="sidebar-divider lg"></span></li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('artikel.index') }}" aria-expanded="false">
            <i class="bi bi-file-earmark-text"></i>
            <span class="hide-menu">Artikel</span>
          </a>
        </li>

        <li><span class="sidebar-divider lg"></span></li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('penulis.index') }}" aria-expanded="false">
            <i class="bi bi-person"></i>
            <span class="hide-menu">Penulis</span>
          </a>
        </li>

        <li><span class="sidebar-divider lg"></span></li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('komentar.index') }}" aria-expanded="false">
            <i class="bi bi-chat-dots"></i>
            <span class="hide-menu">Komentar</span>
          </a>
        </li> 
        @endif
        <li><span class="sidebar-divider lg"></span></li>
      </ul>
    </nav>
  </div>
</aside>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('a[href="{{ route('kategori.index') }}"]').click(function() {
            $('#sidebarImage').attr('src', '{{ asset('images/kategori-placeholder.jpg') }}').addClass('show');
        });

        $('a[href="{{ route('penulis.index') }}"]').click(function() {
            $('#sidebarImage').attr('src', '{{ asset('images/penulis-placeholder.jpg') }}').addClass('show');
        });

        $('a[href="{{ route('artikel.index') }}"]').click(function() {
            $('#sidebarImage').attr('src', '{{ asset('images/artikel-placeholder.jpg') }}').addClass('show');
        });

        $('a[href="{{ route('komentar.index') }}"]').click(function() {
            $('#sidebarImage').attr('src', '{{ asset('images/komentar-placeholder.jpg') }}').addClass('show');
        });
    });
</script>
