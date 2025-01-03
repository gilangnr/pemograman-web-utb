<?php
include('header.php');
include('check_session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Add News Form</h2>
            </div>
            <div class="card-body">
                <form id="addNewsForm">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Title:</label>
                        <input type="text" class="form-control" maxlength="50" id="judul" name="judul" placeholder="Enter news title" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Content:</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" placeholder="Enter news content" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="url_image" class="form-label">Image:</label>
                        <input type="file" class="form-control" id="url_image" name="url_image" accept="image/*" required>
                    </div>
                    <button type="button" class="btn btn-primary w-100" onclick="addNews()">Add News</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
    function addNews() {
        const judul = document.getElementById('judul').value;
        const deskripsi = document.getElementById('deskripsi').value;
        const urlImageInput = document.getElementById('url_image');
        const url_image = urlImageInput.files[0];
        const tanggal = new Date().toISOString().split('T')[0]; // Get current date in ISO format

        // Create form data
        const formData = new FormData();
        formData.append('judul', judul);
        formData.append('deskripsi', deskripsi);
        formData.append('url_image', url_image);
        formData.append('tanggal', tanggal);

        // Make POST request using Axios
        axios.post('http://localhost/pemograman-web-utb/pertemuan-9/be/addnews.php', formData, {
            headers: {
                "Content-Type": "multipart/form-data"
            }
        })
        .then(function(response) {
            console.log(response.data);
            alert(response.data);
            // Reset the form
            document.getElementById("addNewsForm").reset();
        })
        .catch(function(error) {
            console.error(error);
            alert('Error adding news.');
        });
    }
    </script>
</body>
</html>
