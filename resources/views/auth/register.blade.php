<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset ('css/login.css') }}">

</head>
<body>
    <div class="login-page d-flex align-items-center justify-content-center">
        <div class="login-card p-4">
            <h2><strong>Register <br></strong></h2>
            <h3><strong>Admin</strong></h3>

            <div class="login-box p-3 mt-3">
                <h4 class="text-center mb-3">Register</h4>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Username"  name="username" required>
                    </div>

                    <div class="mb-2">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>

                    <div class="mb-2">
                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" required>
                    </div>

                    <div class="d-flex justify-content-end mb-3">
                        
                    </div>
                    <div class="d-grid mb-2">
                        <button type="submit" class="btn btn-login">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
