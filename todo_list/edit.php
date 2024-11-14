<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM todos WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $what_to_do = $_POST['what_to_do'];

    $stmt = $conn->prepare("UPDATE todos SET what_to_do=? WHERE id=?");
    $stmt->bind_param("si", $what_to_do, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Kegiatan</title>
</head>
<body>
    <h2>Edit Kegiatan</h2>
    <form method="post">
        <label>What To Do:</label>
        <input type="text" name="what_to_do" value="<?= htmlspecialchars($row['what_to_do']); ?>" required>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
