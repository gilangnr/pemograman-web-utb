<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                            // alert(`Selamat datang, ${response.data.hasil.name}`);
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
</head>
<body>
    
</body>
</html>