<?php
include 'db.php';
if (!isset($_GET['id'])) { header("Location: index.php"); exit; }
$id = intval($_GET['id']);
$conn->query("DELETE FROM records WHERE id=$id");
header("Location: index.php");
exit;
?>