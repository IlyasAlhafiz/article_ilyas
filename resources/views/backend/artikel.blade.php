  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Artikel</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo/LogoPgrafiT.png') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/styles.min.css')}}" />
  </head>

  <body>
    @include('backend.layouts.navper')
    @include('backend.layouts.sidebar')

    <div class="body-wrapper">
      <header class="app-header">
        @include('backend.layouts.navbar')
      </header>

      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Daftar Artikel</h5>

              <button type="button" class="btn btn-primary mb-4 d-flex align-items-center gap-2" data-toggle="modal" data-target="#tambahArtikelModal">
                <iconify-icon icon="ic:baseline-plus" class="fs-5"></iconify-icon> <span class="fs-5">Tambah Artikel</span>
              </button>

              <!-- Modal Tambah Artikel -->
              <div class="modal fade" id="tambahArtikelModal" tabindex="-1" role="dialog" aria-labelledby="tambahArtikelLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahArtikelLabel">Tambah Artikel</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
                    </div>
                    <div class="card">
                      <div class="card-body">
                        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group mb-4">
                            <label><h6 class="fs-4 fw-semibold mb-0">Judul Artikel</h6></label>
                            <input type="text" class="form-control" name="judul">
                            @error('judul')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="form-group mb-4">
                            <label><h6 class="fs-4 fw-semibold mb-0">Isi Artikel</h6></label>
                            <textarea class="form-control" name="konten" rows="4" required></textarea>
                          </div>

                          <div class="form-group mb-4">
                            <label><h6 class="fs-4 fw-semibold mb-0">Gambar Artikel</h6></label>
                            <input type="file" class="form-control" name="gambar" required>
                          </div>

                          <div class="form-group mb-4">
                            <label><h6 class="fs-4 fw-semibold mb-0">Kategori</h6></label>
                            <select class="form-control" name="id_kategori" required>
                              @foreach($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                              @endforeach
                            </select>
                          </div>

                          <div class="form-group mb-4">
                            <label><h6 class="fs-4 fw-semibold mb-0">Penulis</h6></label>
                            <select class="form-control" name="id_penulis" required>
                              @foreach($penulis as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                              @endforeach
                            </select>
                          </div>

                          <div class="form-group mb-4">
                            <label><h6 class="fs-4 fw-semibold mb-0">Tentang</h6></label>
                            <input type="text" class="form-control" name="tentang" required>
                          </div>

                          <button type="submit" class="btn btn-success mt-3">Simpan Artikel</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              @if($artikel->count())
              <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Kategori</th>
                      <th>Penulis</th>
                      <th>Konten</th>
                      <th>Gambar</th>
                      <th>Tentang</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1; @endphp
                    @foreach($artikel as $a)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $a->judul }}</td>
                      <td>{{ $a->kategori->nama_kategori }}</td>
                      <td>{{ $a->penulis->nama }}</td>
                      <td>{{ Str::limit($a->konten, 50) }}</td>
                      <td>
                        @if($a->gambar)
                          <img src="{{ asset('images/artikel/' . $a->gambar) }}" width="80" height="80">
                        @else
                          <span class="badge bg-secondary">Tidak Ada Gambar</span>
                        @endif
                      </td>
                      <td>{{ Str::limit($a->tentang, 50) }}</td>
                      <td>
                        <div class="d-flex gap-2 flex-nowrap align-items-center">
                          <!-- Tombol Lihat -->
                          <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#lihatArtikel{{ $a->id }}" title="Lihat">
                            <iconify-icon icon="mdi:eye" width="20" height="20"></iconify-icon>
                          </button>

                          <!-- Modal Lihat -->
                          <div class="modal fade" id="lihatArtikel{{ $a->id }}" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Detail Artikel</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                              </div>
                              <div class="modal-body text-center" style="word-wrap: break-word; overflow-y: auto; max-height: 70vh; padding: 15px;">
                                <img src="{{ asset('images/artikel/' . $a->gambar) }}" class="rounded-circle mb-3" width="100" height="100">
                                <h5>{{ $a->judul }}</h5>
                                <p>{{ $a->konten }}</p>
                                <small>Kategori: {{ $a->kategori->nama_kategori }} | Penulis: {{ $a->penulis->nama }}</small>
                              </div>
                            </div>
                          </div>
                        </div>

                          <!-- Tombol Edit -->
                          <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editArtikel{{ $a->id }}" title="Edit">
                            <iconify-icon icon="mdi:pencil" width="20" height="20"></iconify-icon>
                          </button>

                          <!-- Modal Edit -->
                          <div class="modal fade" id="editArtikel{{ $a->id }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Edit Artikel</h5>
                                  <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <div class="card m-0">
                                  <div class="card-body">
                                    <form action="{{ route('artikel.update', $a->id) }}" method="POST" enctype="multipart/form-data">
                                      @csrf @method('PUT')
                                      <div class="form-group mb-4">
                                        <label>Judul</label>
                                        <input type="text" name="judul" class="form-control" value="{{ $a->judul }}" required>
                                      </div>
                                      <div class="form-group mb-4">
                                        <label>Isi</label>
                                        <textarea name="konten" class="form-control" required>{{ $a->konten }}</textarea>
                                      </div>
                                      <div class="form-group mb-4">
                                        <label>Gambar</label>
                                        <img src="{{ asset('images/artikel/' . $a->gambar) }}" width="80" height="80" class="mb-2">
                                        <input type="file" name="gambar" class="form-control">
                                      </div>
                                      <div class="form-group mb-4">
                                        <label>Kategori</label>
                                        <select name="id_kategori" class="form-control">
                                          @foreach($kategori as $k)
                                            <option value="{{ $k->id }}" {{ $a->id_kategori == $k->id ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group mb-4">
                                        <label>Penulis</label>
                                        <select name="id_penulis" class="form-control">
                                          @foreach($penulis as $p)
                                            <option value="{{ $p->id }}" {{ $a->id_penulis == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group mb-4">
                                        <label>Tentang</label>
                                        <textarea name="tentang" class="form-control">{{ $a->tentang }}</textarea>
                                      </div>
                                      <button type="submit" class="btn btn-success">Perbarui</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Tombol Hapus -->
                          <form action="{{ route('artikel.destroy', $a->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                              <iconify-icon icon="mdi:trash-can" width="20" height="20"></iconify-icon>
                            </button>
                          </form>                        
                          
                        <!-- Tombol Komentar -->
                        <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#komentarArtikel{{ $a->id }}" title="Komentar">
                          <iconify-icon icon="mdi:comment-text-outline" width="20" height="20"></iconify-icon>
                        </button>

                        <!-- Modal Komentar -->
                        <div class="modal fade" id="komentarArtikel{{ $a->id }}" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Komentar untuk: {{ $a->judul }}</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                              </div>
                              <div class="modal-body">
                                @if(Auth::check())
                                  <form action="{{ route('komentar.store', $a->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                      <label><strong>Tulis Komentar:</strong></label>
                                      <textarea name="isi_komentar" class="form-control" rows="3" placeholder="Komentar..." required></textarea>
                                      @error('isi_komentar')
                                        <small class="text-danger">{{ $message }}</small>
                                      @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                                  </form>
                                @else
                                  <p>Silakan <a href="{{ route('login') }}">login</a> untuk memberikan komentar.</p>
                                @endif

                                <hr>

                                <h6>Daftar Komentar</h6>
                                @foreach($a->komentar as $komentar)
                                  <div class="card mb-2 p-2">
                                    <strong>{{ $komentar->user->name }}:</strong>
                                    <p class="mb-0">{{ $komentar->isi_komentar }}</p>
                                  </div>
                                @endforeach
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                      </td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              @else
                <p>Tidak ada data artikel.</p>
              @endif
            </div>
          </div>
        </div>
      </div>

      @include('backend.layouts.footer')
    </div>

    <!-- JS -->
    <script src="{{ asset('admin/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('admin/js/sidebarmenu.js')}}"></script>
    <script src="{{ asset('admin/js/app.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  </body>

  </html>
