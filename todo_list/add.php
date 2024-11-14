<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $what_to_do = $_POST['what_to_do'];

    $stmt = $conn->prepare("INSERT INTO todos (what_to_do) VALUES (?)");
    $stmt->bind_param("s", $what_to_do);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kegiatan</title>
</head>
<body>
    <h2>Tambah Kegiatan</h2>
    <form method="post">
        <label>What To Do:</label>
        <input type="text" name="what_to_do" required>
        <button type="submit">Tambah</button>
    </form>
</body>
</html>
