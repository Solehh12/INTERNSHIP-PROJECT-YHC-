<?php
include('db.php');

$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $embed_link = $_POST['embed_link'];

    $sql = "UPDATE materials SET title='$title', description='$description', embed_link='$embed_link' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: view_course.php?id=' . $_POST['course_id']);
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    $sql = "SELECT * FROM materials WHERE id='$id'";
    $result = $conn->query($sql);
    $material = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Materi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Materi</h2>
        <form method="POST">
            <input type="hidden" name="course_id" value="<?php echo $material['course_id']; ?>">
            <div class="mb-3">
                <label for="title" class="form-label">Judul Materi</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $material['title']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi Materi</label>
                <textarea class="form-control" id="description" name="description" required><?php echo $material['description']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="embed_link" class="form-label">Link Pembelajaran</label>
                <input type="text" class="form-control" id="embed_link" name="embed_link" value="<?php echo $material['embed_link']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
