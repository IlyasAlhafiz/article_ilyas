<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Komentar</title>
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
          <h5 class="card-title fw-semibold mb-4">Daftar Komentar</h5>
          @if ($komentar->isEmpty())
            <div class="alert alert-warning" role="alert">
              Tidak ada komentar yang ditemukan.
            </div>
          @else
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead class="table-light">
                  <tr>
                    <th>Artikel</th>
                    <th>User</th>
                    <th>Isi Komentar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($komentar as $data)
                    <tr>
                      <td>{{ $data->artikel->judul }}</td>
                      <td>{{ $data->user->name }}</td>
                      <td>{{ Str::limit($data->isi_komentar, 50) }}</td>
                      <td>
                        <!-- Tombol Modal Lihat -->
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalLihat{{ $data->id }}" title="Lihat">
                          <iconify-icon icon="mdi:eye" width="20" height="20"></iconify-icon>
                        </button>

                        <!-- Modal Lihat -->
                        <div class="modal fade" id="modalLihat{{ $data->id }}" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Detail Komentar</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <p><strong>Artikel:</strong> {{ $data->artikel->judul }}</p>
                                <p><strong>User:</strong> {{ $data->user->name }}</p>
                                <p><strong>Isi Komentar:</strong></p>
                                <p>{{ $data->isi_komentar }}</p>
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Tombol Modal Edit -->
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit{{ $data->id }}" title="Edit">
                          <iconify-icon icon="mdi:pencil" width="20" height="20"></iconify-icon>
                        </button>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="modalEdit{{ $data->id }}" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Edit Komentar</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                              </div>
                              <form action="{{ route('komentar.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="isi_komentar{{ $data->id }}">Isi Komentar</label>
                                    <textarea name="isi_komentar" id="isi_komentar{{ $data->id }}" class="form-control" rows="4">{{ $data->isi_komentar }}</textarea>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('komentar.destroy', $data->id) }}" method="POST" style="display:inline-block;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus komentar ini?')">
                            <iconify-icon icon="mdi:trash-can" width="20" height="20"></iconify-icon>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @endif

        </div>
      </div>
    </div>
  </div>

  @include('backend.layouts.footer')
</div>

<!-- Script -->
<script src="{{ asset('admin/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('admin/js/sidebarmenu.js')}}"></script>
<script src="{{ asset('admin/js/app.min.js')}}"></script>
<script src="{{ asset('admin/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
<script src="{{ asset('admin/libs/simplebar/dist/simplebar.js')}}"></script>
<script src="{{ asset('admin/js/dashboard.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
