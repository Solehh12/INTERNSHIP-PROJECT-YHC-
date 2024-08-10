<?php
include('db.php');

$course_id = $_GET['course_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $embed_link = $_POST['embed_link'];

    $sql = "INSERT INTO materials (course_id, title, description, embed_link) VALUES ('$course_id', '$title', '$description', '$embed_link')";
    if ($conn->query($sql) === TRUE) {
        header('Location: view_course.php?id=' . $course_id);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Materi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Materi ke Kursus</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Judul Materi</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi Materi</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="embed_link" class="form-label">Link Pembelajaran</label>
                <input type="text" class="form-control" id="embed_link" name="embed_link" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
