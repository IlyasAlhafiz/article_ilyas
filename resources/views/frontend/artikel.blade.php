<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="author" content="templatemo">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo/LogoPgrafiT.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/artikel.css') }}">
  <title>Pgrafi | Artikel</title>
</head>

<body>

  @include('frontend.layouts.navbar')

  <div class="contest-details" style="margin-top: 150px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="top-content mb-4">
            <div class="row align-items-center justify-content-between">
              <div class="col-lg-9">
                <h4>{{ $artikel->kategori->nama_kategori ?? '-' }}</h4>
                <h6>Terbit Tanggal: {{ $artikel->created_at->format('d M Y') }}</h6>
              </div>
              <div class="col-lg-3 d-flex justify-content-end align-items-center">
                <span class="fw-semibold">{{ $artikel->penulis->nama ?? '-' }}</span>
                <a href="{{ route('penulis.front.show', $artikel->penulis->slug) }}" class="me-2">
                  <img src="{{ asset('/images/profil/' . $artikel->penulis->foto_profil) }}" width="45px" height="45px"
                    style="border-radius: 50%; object-fit: cover;">
                </a>
              </div>
            </div>
          </div>

          <div class="main-content">
            <img src="{{ asset('images/artikel/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}"
              class="img-fluid rounded mb-4" style="width: 100%; max-height: 450px; object-fit: cover;">

            <h4 class="mb-3">{{ $artikel->judul ?? '-' }}</h4>
            <div style="text-align: justify;">{!! $artikel->konten !!}</div>

            {{-- Komentar Section --}}
            <section class="komentar-section mt-8">
              <h4 class="komentar-title">Komentar</h4>

              @auth
                <div class="form-komentar-wrapper">
                  <form id="form-komentar" action="{{ route('komentar.front.store', $artikel->slug) }}" method="POST">
                    @csrf
                    <textarea name="komentar" class="komentar-textarea" placeholder="Tulis komentarmu di sini..." rows="4" required></textarea>
                    <button type="submit" class="btn-kirim-komentar btn-secondary">Kirim Komentar</button>
                  </form>
                </div>
              @else
                <div class="form-komentar-wrapper">
                  <span class="login-prompt">
                    Silakan <a href="{{ route('login') }}">login</a> untuk memberikan komentar
                  </span>
                </div>
              @endauth

              <ul class="custom-comment-list">
                @forelse($artikel->komentar as $komentar)
                  <li class="custom-comment-item">
                    <div class="custom-comment-header">
                      <span class="custom-comment-author">{{ $komentar->user->name }}</span>
                      <span class="custom-comment-date">{{ $komentar->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="custom-comment-body">
                      {{ $komentar->isi_komentar }}
                    </div>
                    @if(auth()->check() && $komentar->user->id === auth()->id())
                      <div class="custom-comment-actions">
                        <form action="{{ route('komentar.front.destroy', $komentar->id) }}" method="POST"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus komentar ini?')" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" title="Hapus komentar">
                            <i class="bi bi-trash"></i>
                          </button>
                        </form>
                      </div>
                    @endif
                  </li>
                @empty
                  <li class="custom-comment-item text-center text-muted">Belum ada komentar</li>
                @endforelse
              </ul>
            </section>

            <div class="main-button mt-4">
              <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  @include('frontend.layouts.footer')

</body>
</html>
