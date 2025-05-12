<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-page d-flex align-items-center justify-content-center">
        <div class="login-card p-4">
            <h2><strong>Reset<br></strong></h2>
            <h3><strong>Password</strong></h3>

            <div class="login-box p-3 mt-3">
                <h4 class="text-center mb-3">Lupa Password</h4>

                @if (session('status'))
                    <div class="alert alert-success text-white">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('forgot.password.submit') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                        @error('username') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Password Baru" name="new_password" required>
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Konfirmasi Password" name="new_password_confirmation" required>
                        @error('new_password') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-grid mb-2">
                        <button type="submit" class="btn btn-login">Reset Password</button>
                    </div>

                    <p class="text-center small"><a href="{{ route('login') }}">Kembali ke login</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
