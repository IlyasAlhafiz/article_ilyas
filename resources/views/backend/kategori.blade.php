<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard kategori</title>
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
            <h5 class="card-title fw-semibold mb-4">Daftar kategori</h5>

            <!-- Tombol Tambah -->
            <button type="button" class="btn btn-primary mb-4 d-flex align-items-center gap-2" data-toggle="modal" data-target="#exampleModal">
              <iconify-icon icon="ic:baseline-plus" class="fs-5"></iconify-icon> <span class="fs-5">Tambah Kategori</span>
            </button>

            <!-- Modal Tambah kategori -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                          <label for="nama_kategori">
                            <h6 class="fs-4 fw-semibold mb-0">Nama Kategori</h6>
                          </label>
                          <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                          @error('nama_kategori')
                          <div class="alert alert-danger mt-2">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="form-group mb-4">
                          <label for="deskripsi_kategori">
                            <h6 class="fs-4 fw-semibold mb-0">Deskripsi Kategori</h6>
                          </label>
                          <input type="text" class="form-control" id="deskripsi_kategori" name="deskripsi_kategori" required>
                          @error('deskripsi_kategori')
                          <div class="alert alert-danger mt-2">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="form-group mb-4">
                          <label for="gambar_kategori">
                            <h6 class="fs-4 fw-semibold mb-0">Gambar Kategori</h6>
                          </label>
                          <input type="file" class="form-control" id="gambar_kategori" name="gambar_kategori" required>
                          @error('gambar_kategori')
                          <div class="alert alert-danger mt-2">{{ $message }}</div>
                          @enderror
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Simpan kategori</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Tabel Daftar kategori -->
            @if($kategori->count())
            <div class="table-responsive">
              <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                  <tr>
                    <th><h6 class="fs-4 fw-semibold mb-0">No</h6></th>
                    <th><h6 class="fs-4 fw-semibold mb-0">Nama Kategori</h6></th>
                    <th><h6 class="fs-4 fw-semibold mb-0">Deskripsi</h6></th>
                    <th><h6 class="fs-4 fw-semibold mb-0">Gambar Kategori</h6></th>
                    <th><h6 class="fs-4 fw-semibold mb-0">Aksi</h6></th>
                  </tr>
                </thead>
                <tbody>
                  @php $id = 1; @endphp
                  @foreach ($kategori as $data)
                  <tr>
                    <td><h6 class="fs-4 fw-semibold mb-0">{{ $id++ }}</h6></td>
                    <td><p class="mb-0 fw-normal fs-4">{{ $data->nama_kategori }}</p></td>
                    <td><p class="mb-0 fw-normal fs-4">{{ $data->deskripsi_kategori }}</p></td>
                    <td>
                      @if($data->gambar_kategori)
                        <img src="{{ asset('/images/kategori/' . $data->gambar_kategori) }}" alt="Gambar Kategori" width="80" height="80">
                      @else
                        <span class="badge bg-secondary">Tidak Ada Gambar</span>
                      @endif
                    </td>
                    <td>
                      <div class="d-flex flex-wrap gap-2">
                      <!-- Tombol Lihat -->
                      <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#lihatKategori{{ $data->id }}" title="Lihat">
                        <iconify-icon icon="mdi:eye" width="20" height="20"></iconify-icon>
                      </button>

                        <!-- Modal Lihat Detail -->
                        <div class="modal fade" id="lihatKategori{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="lihatKategoriLabel{{ $data->id }}" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content border-0">
                              <div class="modal-header">
                                <h5 class="modal-title" id="lihatKategoriLabel{{ $data->id }}">Detail Kategori</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="text-center mb-4">
                                  <img src="{{ asset('/images/kategori/' . $data->gambar_kategori) }}" class="rounded-circle" width="100" height="100">
                                  <img src="{{ asset('/images/samping/' . $data->gambar_samping) }}" class="rounded-circle" width="100" height="100">
                                </div>
                                <h5 class="text-center">{{ $data->nama_kategori }}</h5>
                                <p class="text-center">{{ $data->deskripsi_kategori }}</p>
                                <hr>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Tombol Edit -->
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editKategori{{ $data->id }}" title="Edit">
                          <iconify-icon icon="mdi:pencil" width="20" height="20"></iconify-icon>
                        </button>

                        <!-- Modal Edit Kategori -->
                        <div class="modal fade" id="editKategori{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="editKategoriLabel{{ $data->id }}" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content border-0">
                              <div class="modal-header">
                                <h5 class="modal-title" id="editKategoriLabel{{ $data->id }}">Edit Kategori</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="card m-0">
                                <div class="card-body">
                                  <form action="{{ route('kategori.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group mb-4">
                                      <label for="nama_kategori">
                                        <h6 class="fs-4 fw-semibold mb-0">Nama Kategori</h6>
                                      </label>
                                      <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $data->nama_kategori }}" required>
                                      @error('nama_kategori')
                                      <div class="alert alert-danger mt-2">{{ $message }}</div>
                                      @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                      <label for="deskripsi_kategori">
                                        <h6 class="fs-4 fw-semibold mb-0">Detail Kategori</h6>
                                      </label>
                                      <input type="deskripsi_kategori" class="form-control" id="deskripsi_kategori" name="deskripsi_kategori" value="{{ $data->deskripsi_kategori }}" required>
                                      @error('deskripsi_kategori')
                                      <div class="alert alert-danger mt-2">{{ $message }}</div>
                                      @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                      <label for="gambar_kategori">
                                        <h6 class="fs-4 fw-semibold mb-0">Gambar Kategori</h6>
                                      </label>
                                      <div class="mb-2"><img src="{{ asset('/images/kategori/' . $data->gambar_kategori) }}" width="100"></div>
                                      <input type="file" class="form-control" id="gambar_kategori" name="gambar_kategori">
                                      <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                                      @error('gambar_kategori')
                                      <div class="alert alert-danger mt-2">{{ $message }}</div>
                                      @enderror
                                    </div>

                                    <button type="submit" class="btn btn-success mt-3">Perbarui Kategori</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <form action="{{ route('kategori.destroy', $data->id) }}" method="POST" style="display:inline-block;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                            <iconify-icon icon="mdi:trash-can" width="20" height="20"></iconify-icon>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @else
            <p>Tidak ada data kategori.</p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    @include('backend.layouts.footer')
  </div>

  <!-- JS Scripts -->
  <script src="{{ asset('admin/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('admin/js/sidebarmenu.js')}}"></script>
  <script src="{{ asset('admin/js/app.min.js')}}"></script>
  <script src="{{ asset('admin/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{ asset('admin/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{ asset('admin/js/dashboard.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
