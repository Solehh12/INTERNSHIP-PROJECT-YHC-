<?php
include('db.php');

$id = $_GET['id'];

$sql = "SELECT * FROM courses WHERE id='$id'";
$result = $conn->query($sql);
$course = $result->fetch_assoc();

$sql_materials = "SELECT * FROM materials WHERE course_id='$id'";
$materials_result = $conn->query($sql_materials);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kursus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Detail Kursus</h2>
        <p><strong>Judul:</strong> <?php echo $course['title']; ?></p>
        <p><strong>Deskripsi:</strong> <?php echo $course['description']; ?></p>
        <p><strong>Durasi:</strong> <?php echo $course['duration']; ?> jam</p>
        
        <h3>Daftar Materi</h3>
        <a href="add_material.php?course_id=<?php echo $course['id']; ?>" class="btn btn-primary mb-3">Tambah Materi Baru</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Link Pembelajaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($materials_result->num_rows > 0) {
                    while($material = $materials_result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $material['title'] . "</td>";
                        echo "<td>" . $material['description'] . "</td>";
                        echo "<td><a href='" . $material['embed_link'] . "' target='_blank'>Tonton</a></td>";
                        echo "<td>";
                        echo "<a href='edit_material.php?id=" . $material['id'] . "' class='btn btn-warning'>Edit</a> ";
                        echo "<a href='delete_material.php?id=" . $material['id'] . "' class='btn btn-danger' onclick='return confirm(\"Apakah Anda yakin?\")'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Belum ada materi.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
