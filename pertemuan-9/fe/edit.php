<?php
include('header.php');
include('check_session.php');

$id = isset($_POST['id']) ? $_POST['id'] : null;
?>

<div class="container mt-5">
    <h2 class="mb-4">Edit Data</h2>
    <form id="addNewsForm">
        <input type="hidden" id="newsId" value="<?php echo $id; ?>"> <!-- Menyimpan ID berita -->
        <div class="form-group">
            <label for="judul">Title:</label>
            <input type="text" class="form-control" maxlength="50" id="judul" name="judul" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Content:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
        </div>
        <div class="form-group">
            <label for="url_image">Image:</label>
            <input type="file" class="form-control-file" id="url_image" name="url_image" accept="image/*">
        </div>
        <button type="button" class="btn btn-primary" onclick="editNews()">Edit News</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function getData() {
        const newsId = document.getElementById('newsId').value;
        var formData = new FormData();
        formData.append('idnews', newsId);
        axios.post('http://localhost/pemograman-web-utb/pertemuan-9/be/selectdata.php', formData)
            .then(function(response) {
                document.getElementById('judul').value = response.data.title;
                document.getElementById('deskripsi').value = response.data.desc;
            })
            .catch(function(error) {
                console.error(error);
                alert('Error fetching news data.');
            })
    }

    function editNews() {
        const newsId = document.getElementById('newsId').value;
        const judul = document.getElementById('judul').value;
        const deskripsi = document.getElementById('deskripsi').value;
        const urlImageInput = document.getElementById('url_image');
        const urlImage = urlImageInput.files[0];
        const tanggal = new Date().toISOString().split('T')[0]; // Get current date in YYYY-MM-DD format

        // Prepare form data
        var formData = new FormData();
        formData.append('idnews', newsId);
        formData.append('tanggal', tanggal);
        formData.append('judul', judul);
        formData.append('deskripsi', deskripsi);

        // Check if image is selected
        if (urlImageInput.files.length > 0) {
            formData.append('url_image', urlImage);
        }

        // Make AJAX request to edit the news
        axios.post('http://localhost/pemograman-web-utb/pertemuan-9/be/editnews.php', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function(response) {
            console.log(response.data);
            alert(response.data); // Display success message or response data
            window.location.href = 'kelola.php'; // Redirect after success
        })
        .catch(function(error) {
            console.error(error);
            alert('Error editing news.'); // Handle error case
        });
    }

    window.onload = getData;
</script>
