<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kami</title>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">Aplikasi Kami</a>
            <div class="ml-auto">
                <button class="btn btn-outline-danger" id="logoutButton">Logout</button>
                <a class="btn btn-outline-primary ml-2" onclick="tambahData()" id="tambahData">Tambah Data</a>
                <a class="btn btn-outline-primary ml-2" onclick="kelolaData()" id="kelolaData">Kelola Data</a>
            </div>
        </div>
    </nav>

    <!-- Script -->
    <script>
        function tambahData() {
            window.location.href = 'tambah.php';
        }

        function kelolaData() {
            window.location.href = 'kelola.php';
        }
    </script>
</body>

</html>
