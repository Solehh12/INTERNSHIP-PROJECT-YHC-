<?php
include('db.php');

$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];

    $sql = "UPDATE courses SET title='$title', description='$description', duration='$duration' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    $sql = "SELECT * FROM courses WHERE id='$id'";
    $result = $conn->query($sql);
    $course = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kursus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Kursus</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Judul Kursus</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $course['title']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi Kursus</label>
                <textarea class="form-control" id="description" name="description" required><?php echo $course['description']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Durasi (jam)</label>
                <input type="number" class="form-control" id="duration" name="duration" value="<?php echo $course['duration']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
