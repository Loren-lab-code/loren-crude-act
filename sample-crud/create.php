<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $stmt = $conn->prepare("INSERT INTO records (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Record</title></head>
<body>
    <h2>Add New Record</h2>
    <form method="POST">
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email"><br><br>
        <button type="submit">Save</button> <a href="index.php">Cancel</a>
    </form>
</body>
</html>