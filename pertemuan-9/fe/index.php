<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sessionToken = localStorage.getItem('session_token');
            if (!sessionToken) {
                document.getElementById('login-button').classList.remove('d-none');
            } else {
                const formData = new FormData();
                formData.append('session_token', sessionToken);

                axios.post('http://localhost/pemograman-web-utb/pertemuan-9/be/session.php', formData)
                    .then(response => {
                        if (response.data.status === 'success') {
                            localStorage.setItem('name', response.data.hasil.name);
                            alert(`Selamat datang, ${response.data.hasil.name}`);
                            window.location.href = 'dashboard.php';
                        } else {
                            localStorage.removeItem('session_token');
                            alert('Session tidak valid. Silakan login kembali.');
                            document.getElementById('login-button').classList.remove('d-none');
                        }
                    })
                    .catch(() => {
                        alert('Terjadi kesalahan saat memeriksa session.');
                        document.getElementById('login-button').classList.remove('d-none');
                    });
            }
        });
    </script>

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        footer {
            margin-top: auto;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-fluid bg-primary text-white text-center py-5">
        <h1 class="display-4">Selamat Datang di Aplikasi Kami</h1>
        <p class="lead">Aplikasi terbaik untuk kebutuhan Anda. Masuk sekarang dan nikmati fiturnya!</p>
    </div>

    <div class="container text-center my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Mulai Perjalanan Anda</h2>
                <p class="mb-4">Jika Anda belum memiliki akun, silakan login untuk melanjutkan.</p>
                <button id="login-button" class="btn btn-lg btn-success d-none" onclick="window.location.href='login.php'">Login</button>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">&copy; 2024 Aplikasi Kami. Semua Hak Dilindungi.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
