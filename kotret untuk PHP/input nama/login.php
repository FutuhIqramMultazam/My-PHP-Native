<?php
session_start();
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM register WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['password'] = $user['password']; // Store password for verification
            header("Location: index.php");
        } else {
            $error = "Password yang anda masukan salah";
        }
    } else {
        $error = "Username yang anda masukan salah";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            color: #fff;
            margin: 0;
            padding: 0;
            justify-content: center;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        input[type="text"],
        input[type="password"] {
            background-color: #ffffff17;
            color: white;
            padding: 8px 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            width: 60%;
        }
        input[type="text"],
        input[type="password"]:focus-visible{
            outline: none;
        }
        input[type="submit"] {
            background-color: silver;
            color: black;
            border: none;
            padding: 8px 20px;
            cursor: pointer;
            transition: 0.3s ease;
            border-radius: 5px;
            width: 20%;
        }
        input[type="submit"]:hover {
            background-color: #999;
        }
        .register-button {
            background-color: #4caf50;
            color: black;
            border: none;
            padding: 8px 20px;
            cursor: pointer;
            transition: 0.3s ease;
            border-radius: 5px;
            margin-top: 10px;
            width: 20%;
        }
        .register-button:hover {
            background-color: #45a049;
        }
        .manage-users-button {
            background-color: #4287f5;
            color: black;
            border: none;
            padding: 8px 20px;
            cursor: pointer;
            transition: 0.3s ease;
            border-radius: 5px;
            margin-top: 10px;
            width: 20%;
        }
        .manage-users-button:hover {
            background-color: #3366cc;
        }
        .wrapper{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Menggunakan tinggi viewport untuk kontainer */
      }
    </style>
</head>
<body>
    <div class="wrapper">
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post" action="login.php">
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <input type="submit" value="Login">
        </form>
        <button class="register-button" onclick="window.location.href='register.php'">Buat akun baru?</button>
        <button class="manage-users-button" onclick="window.location.href='login_manage_users.php'">Manage Users</button>
    </div>
    </div>
    
</body>
</html>
