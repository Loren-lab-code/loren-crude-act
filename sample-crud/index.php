<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Sample CRUD</title></head>
<body>
    <h2>Record List</h2>
    <a href="create.php">Add New Record</a><br><br>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Actions</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM records ORDER BY id DESC");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>
                    <a href='edit.php?id=" . $row['id'] . "'>Edit</a> | 
                    <a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>