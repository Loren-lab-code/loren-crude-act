<?php
include 'db.php';
if (!isset($_GET['id'])) { header("Location: index.php"); exit; }
$id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $stmt = $conn->prepare("UPDATE records SET name=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $email, $id);
    $stmt->execute();
    header("Location: index.php");
    exit;
}

$result = $conn->query("SELECT * FROM records WHERE id=$id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head><title>Edit Record</title></head>
<body>
    <h2>Edit Record</h2>
    <form method="POST">
        Name: <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>"><br><br>
        <button type="submit">Update</button> <a href="index.php">Cancel</a>
    </form>
</body>
</html>