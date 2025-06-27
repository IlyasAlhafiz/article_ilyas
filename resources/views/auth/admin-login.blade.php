<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Login - Pgrafi Dashboard</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/logos/favicon.png') }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/css/admin-login.css') }}" />
</head>

<body>
  <div class="login-card shadow-sm">
    <a href="{{ route('welcome') }}">
      <img src="{{ asset('images/logo/LogoPgrafiT.png') }}" alt="Logo Pgrafi" class="logo" />
    </a>

    <form method="POST" action="{{ route('admin.login') }}">
      @csrf

      <div class="mb-3">
        <label for="email" class="form-label">Email Admin</label>
        <input id="email" type="email" name="email"
          class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus
          placeholder="admin@example.com" />
        @error('email')
          <div class="error-message">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <input id="password" type="password" name="password"
          class="form-control @error('password') is-invalid @enderror" required placeholder="••••••••" />
        @error('password')
          <div class="error-message">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3 form-check">
        <input type="checkbox" name="remember" id="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">Ingat Saya</label>
      </div>

      <button type="submit" class="btn btn-primary w-100 py-2 fs-5 rounded-2">Masuk sebagai Admin</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
