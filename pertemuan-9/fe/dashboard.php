<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        footer {
            margin-top: auto;
        }
    </style>
</head>

<body class="bg-light">

    <?php include 'header.php' ?>

    <div class="container mt-5">
        <div class="text-center">
            <h1 class="mb-4">Selamat Datang, <span id="welcomeMessage"></span>!</h1>
            <p class="lead">Nikmati semua fitur eksklusif yang kami sediakan untuk Anda.</p>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">&copy; 2024 Aplikasi Kami. Semua Hak Dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const name = localStorage.getItem('name');
            if (!name) {
                window.location.href = 'login.php';
            }
            document.getElementById('welcomeMessage').textContent = name;

            const logoutButton = document.getElementById('logoutButton');
            if (logoutButton) {
                logoutButton.addEventListener('click', function () {
                    const sessionToken = localStorage.getItem('session_token');
                    if (!sessionToken) {
                        alert('No session token found. Redirecting to login.');
                        window.location.href = 'login.php';
                        return;
                    }

                    const formData = new FormData();
                    formData.append('session_token', sessionToken);

                    axios.post('http://localhost/pemograman-web-utb/pertemuan-9/be/logout.php', formData)
                        .then(response => {
                            if (response.data.status === 'success') {
                                localStorage.removeItem('session_token');
                                localStorage.removeItem('name');
                                window.location.href = 'index.php';
                            } 
                        })
                        .catch(error => {
                            console.error('Error during logout:', error);
                            alert('Terjadi kesalahan saat logout. Silakan coba lagi.');
                        });
                });
            } else {
                console.error('Logout button not found.');
            }
        });
    </script>
</body>

</html>
