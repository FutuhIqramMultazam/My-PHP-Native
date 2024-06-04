<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login_manage_users.php");
    exit();
}

include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_user_id'])) {
    $delete_user_id = $_POST['delete_user_id'];
    $stmt = $conn->prepare("DELETE FROM register WHERE id = ?");
    $stmt->bind_param("i", $delete_user_id);
    $stmt->execute();
    $stmt->close();
    $_SESSION['success_message'] = "User berhasil dihapus";
    header("Location: manage_users.php");
    exit();
}

$result = $conn->query("SELECT id, username, role FROM register");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            text-align: center;
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: #fff;
        }

        th, td {
            border: 1px solid #333;
            padding: 8px;
        }

        th {
            background-color: #444;
        }

        .edit-user-button, .delete-user-button {
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 4px;
        }

        .edit-user-button {
            background-color: #4caf50;
        }

        .delete-user-button {
            background-color: #ff0000;
        }

        .edit-user-button:hover {
            background-color: #45a049;
        }

        .delete-user-button:hover {
            background-color: #cc0000;
        }

        .logout-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #ff0000;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 4px;
        }

        .logout-button:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Manage Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        <?php $i = 1;?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row['username']; ?></td>
                <td><?= $row['role']; ?></td>
                <td>
                    <form method="post" action="manage_users.php" style="display:inline;">
                        <input type="hidden" name="delete_user_id" value="<?php echo $row['id']; ?>">
                        <input type="submit" class="delete-user-button" value="Delete">
                    </form>
                    <button onclick="window.location.href='edit_user.php?id=<?php echo $row['id']; ?>'" class="edit-user-button">Edit</button>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endwhile; ?>
    </table>
    <a href="index.php">kembali ke input data</a><br>
    <a href="logout.php">keluar</a>

    <script>
        <?php if (isset($_SESSION['success_message'])): ?>
            alert('<?php echo $_SESSION['success_message']; ?>');
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>
    </script>
</div>
</body>
</html>
