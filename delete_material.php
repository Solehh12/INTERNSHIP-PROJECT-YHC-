<?php
include('db.php');

$id = $_GET['id'];

$sql = "DELETE FROM materials WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header('Location: view_course.php?id=' . $_GET['course_id']);
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
