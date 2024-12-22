<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">Login</h2>
            <form id="login-form">
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('login-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            axios.post('http://localhost/pemograman-web-utb/pertemuan-9/be/login.php', new URLSearchParams({
                    'username': username,
                    'password': password
                }), {
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                })
                .then(function(response) {
                    const data = response.data;

                    if (data.status === 'success') {
                        localStorage.setItem('session_token', data.session_token);
                        localStorage.setItem('name', data.name);
                        alert('Login berhasil, selamat datang ' + data.name);
                        window.location.href = 'dashboard.php';
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(function(error) {
                    alert('Terjadi kesalahan: ' + error);
                });
        });
    </script>
</body>

</html>
