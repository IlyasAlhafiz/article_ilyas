<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Penulis</title>
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
            <h5 class="card-title fw-semibold mb-4">Daftar Penulis</h5>

            <!-- Tombol Tambah -->
            <button type="button" class="btn btn-primary mb-4 d-flex align-items-center gap-2" data-toggle="modal" data-target="#exampleModal">
                <iconify-icon icon="ic:baseline-plus" class="fs-5"></iconify-icon> <span class="fs-5">Tambah Penulis</span>
            </button>

            <!-- Modal Tambah Penulis -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Penulis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <form action="{{ route('penulis.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                          <label for="nama">
                            <h6 class="fs-4 fw-semibold mb-0">Nama Penulis</h6>
                          </label>
                          <input type="text" class="form-control" id="nama" name="nama" required>
                          @error('nama')
                          <div class="alert alert-danger mt-2">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="form-group mb-4">
                          <label for="email">
                            <h6 class="fs-4 fw-semibold mb-0">Email Penulis</h6>
                          </label>
                          <input type="email" class="form-control" id="email" name="email" required>
                          @error('email')
                          <div class="alert alert-danger mt-2">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="form-group mb-4">
                          <label for="foto_profil">
                            <h6 class="fs-4 fw-semibold mb-0">Foto Profil</h6>
                          </label>
                          <input type="file" class="form-control" id="foto_profil" name="foto_profil" {{ isset($penulis) ? '' : 'required' }}>
                          @error('foto_profil')
                          <div class="alert alert-danger mt-2">{{ $message }}</div>
                          @enderror
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Simpan Penulis</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Tabel Daftar Penulis -->
            @if($penulis->count())
            <div class="table-responsive">
              <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                  <tr>
                    <th><h6 class="fs-4 fw-semibold mb-0">No</h6></th>
                    <th><h6 class="fs-4 fw-semibold mb-0">Nama</h6></th>
                    <th><h6 class="fs-4 fw-semibold mb-0">Email</h6></th>
                    <th><h6 class="fs-4 fw-semibold mb-0">Foto Profil</h6></th>
                    <th><h6 class="fs-4 fw-semibold mb-0">Artikel</h6></th>
                    <th><h6 class="fs-4 fw-semibold mb-0">Aksi</h6></th>
                  </tr>
                </thead>
                <tbody>
                  @php $id = 1; @endphp
                  @foreach ($penulis as $data)
                  <tr>
                    <td><h6 class="fs-4 fw-semibold mb-0">{{ $id++ }}</h6></td>
                    <td><p class="mb-0 fw-normal fs-4">{{ $data->nama }}</p></td>
                    <td><p class="mb-0 fw-normal fs-4">{{ $data->email }}</p></td>
                    <td>
                      <img src="{{ asset('/images/profil/' . $data->foto_profil) }}" width="70" height="70" style="border-radius: 50%; object-fit: cover;">
                    </td>
                    <td>
                      <ul class="list-unstyled mb-0">
                        @foreach ($data->artikel as $artikel)
                        <li>{{ $artikel->judul }}</li>
                        @endforeach
                      </ul>
                    </td>
                    <td>
                      <div class="d-flex flex-wrap gap-2">
                        <!-- Tombol Lihat -->
                      <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#lihatPenulis{{ $data->id }}" title="Lihat">
                        <iconify-icon icon="mdi:eye" width="20" height="20"></iconify-icon>
                      </button>

                        <!-- Modal Lihat Detail -->
                        <div class="modal fade" id="lihatPenulis{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="lihatPenulisLabel{{ $data->id }}" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content border-0">
                              <div class="modal-header">
                                <h5 class="modal-title" id="lihatPenulisLabel{{ $data->id }}">Detail Penulis</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="text-center mb-4">
                                  <img src="{{ asset('/images/profil/' . $data->foto_profil) }}" class="rounded-circle" width="100" height="100">
                                </div>
                                <h5 class="text-center">{{ $data->nama }}</h5>
                                <p class="text-center">{{ $data->email }}</p>
                                <hr>
                                <h6>Artikel:</h6>
                                <ul>
                                  @forelse ($data->artikel as $artikel)
                                  <li>{{ $artikel->judul }}</li>
                                  @empty
                                  <li>Belum ada artikel</li>
                                  @endforelse
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Tombol Edit -->
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPenulis{{ $data->id }}" title="Edit">
                          <iconify-icon icon="mdi:pencil" width="20" height="20"></iconify-icon>
                        </button>

                        <!-- Modal Edit Penulis -->
                        <div class="modal fade" id="editPenulis{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="editPenulisLabel{{ $data->id }}" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content border-0">
                              <div class="modal-header">
                                <h5 class="modal-title" id="editPenulisLabel{{ $data->id }}">Edit Penulis</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="card m-0">
                                <div class="card-body">
                                  <form action="{{ route('penulis.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group mb-4">
                                      <label for="nama">
                                        <h6 class="fs-4 fw-semibold mb-0">Nama Penulis</h6>
                                      </label>
                                      <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}" required>
                                      @error('nama')
                                      <div class="alert alert-danger mt-2">{{ $message }}</div>
                                      @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                      <label for="email">
                                        <h6 class="fs-4 fw-semibold mb-0">Email Penulis</h6>
                                      </label>
                                      <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" required>
                                      @error('email')
                                      <div class="alert alert-danger mt-2">{{ $message }}</div>
                                      @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                      <label for="foto_profil">
                                        <h6 class="fs-4 fw-semibold mb-0">Foto Profil</h6>
                                      </label>
                                      <div class="mb-2">
                                        <img src="{{ asset('/images/profil/' . $data->foto_profil) }}" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                                      </div>
                                      <input type="file" class="form-control" id="foto_profil" name="foto_profil">
                                      <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                                      @error('foto_profil')
                                      <div class="alert alert-danger mt-2">{{ $message }}</div>
                                      @enderror
                                    </div>

                                    <button type="submit" class="btn btn-success mt-3">Perbarui Penulis</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('penulis.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
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
            <p>Tidak ada data penulis.</p>
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
