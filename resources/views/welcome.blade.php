<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Sistem Informasi Klinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="text-center">
        <h1 class="mb-4">Selamat Datang di Sistem Informasi Klinik</h1>
        <a href="{{ route('login') }}" class="btn btn-primary px-4 py-2">Login</a>
    </div>
</body>
</html>
