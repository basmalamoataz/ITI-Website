<?php
include 'database.php'; // your database connection

// Handle deletion
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM members WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    // Optional: redirect to avoid resubmission
    header("Location: changedata.php");
    exit();
}

// Fetch all members
$result = $conn->query("SELECT id, username FROM members");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Members</title>
    <style>
        table { border-collapse: collapse; width: 60%; margin: 40px auto; }
        th, td { border: 1px solid #aaa; padding: 8px; text-align: center; }
        th { background: #eee; }
        .delete-btn {
            color: #fff;
            background: #e74c3c;
            border: none;
            padding: 6px 14px;
            border-radius: 3px;
            cursor: pointer;
        }
        .delete-btn:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Members List</h2>
    <table>
        <tr><th>ID</th><th>Username</th><th>Action</th></tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td>
                <a href="changedata.php?delete=<?= $row['id'] ?>" 
                   onclick="return confirm('Are you sure you want to delete this member?');"
                   class="delete-btn">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
<?php $conn->close(); ?>