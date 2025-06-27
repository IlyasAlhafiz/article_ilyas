<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{ asset('admin/css/styles.min.css') }}" />
  <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo/LogoPgrafiT.png') }}" />
  <script src="{{ asset('admin/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <style>
    @media (max-width: 768px) {
      .col-lg-8, .col-lg-4 {
        width: 100%;
      }
    }
  </style>
</head>
<body>
@if(Auth::user()->is_admin === 1)
  @include('backend.layouts.navper')
  @include('backend.layouts.sidebar')

  <div class="body-wrapper">
    <header class="app-header">
      @include('backend.layouts.navbar')
    </header>

    <div class="body-wrapper-inner">
      <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="mb-0">Dashboard</h4>
        </div>

        <div class="row">
          <div class="col-lg-8 mb-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title fw-semibold mb-3">Artikel per Bulan</h5>
                <div id="artikel-per-bulan"></div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card bg-danger-subtle shadow-none mb-3">
              <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-3">
                  <div class="bg-danger text-white rounded-circle p-2">
                    <iconify-icon icon="solar:users-group-rounded-bold-duotone"></iconify-icon>
                  </div>
                  <h6 class="mb-0 text-muted">Total Artikel</h6>
                </div>
                <h2>{{ $totalArtikel }}</h2>
              </div>
            </div>

            <div class="card bg-warning-subtle shadow-none">
              <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-3">
                  <div class="bg-warning text-white rounded-circle p-2">
                    <iconify-icon icon="solar:comment-2-line-duotone"></iconify-icon>
                  </div>
                  <h6 class="mb-0 text-muted">Total Komentar</h6>
                </div>
                <h2>{{ $totalKomentar }}</h2>
                <div id="total-komentar" class="mt-2"></div>
              </div>
            </div>
          </div>
        </div>

      @include('backend.layouts.footer')
    </div>
  </div>

  <script src="{{ asset('admin/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('admin/js/app.min.js') }}"></script>
  <script src="{{ asset('admin/libs/simplebar/dist/simplebar.js') }}"></script>

  <script>
    $(document).ready(function() {
      var artikelPerBulan = @json($artikelPerBulan);
      var judulArtikelPerBulan = @json($judulArtikelPerBulan);
      var komentarPerBulan = @json($komentarPerBulan);
      var namaKomentarPerBulan = @json($namaKomentarPerBulan);

      new ApexCharts(document.querySelector("#artikel-per-bulan"), {
        chart: { type: 'line', height: 475, zoom: { enabled: false } },
        series: [{ name: 'Artikel', data: Object.values(artikelPerBulan) }],
        xaxis: {
          categories: Object.values(judulArtikelPerBulan),
          labels: { style: { colors: ['#5e6e77'], fontSize: '12px', fontWeight: 'bold' } }
        },
        stroke: { width: 4, curve: 'smooth' },
        colors: ['#34bfa3'],
        grid: { borderColor: '#f1f1f1', strokeDashArray: 4 },
        tooltip: {
          theme: 'dark',
          x: { show: true },
          y: { formatter: val => `Jumlah Artikel: ${val}` }
        },
        title: {
          text: 'Artikel per Bulan',
          align: 'center',
          style: { fontSize: '18px', color: '#5e6e77', fontWeight: 'bold' }
        }
      }).render();

      new ApexCharts(document.querySelector("#total-komentar"), {
        chart: { type: 'bar', height: 300 },
        series: [{ name: 'Komentar', data: Object.values(komentarPerBulan) }],
        xaxis: {
          categories: Object.values(namaKomentarPerBulan),
          labels: { style: { colors: ['#5e6e77'], fontSize: '12px', fontWeight: 'bold' } }
        },
        stroke: { width: 4, curve: 'smooth' },
        colors: ['#ff6f61'],
        grid: { borderColor: '#f1f1f1', strokeDashArray: 4 },
        tooltip: {
          theme: 'dark',
          x: { show: true },
          y: { formatter: val => `Jumlah Komentar: ${val}` }
        },
        title: {
          text: 'Komentar per Bulan',
          align: 'center',
          style: { fontSize: '18px', color: '#5e6e77', fontWeight: 'bold' }
        }
      }).render();
    });
  </script>
  @endif
</body>
</html>
