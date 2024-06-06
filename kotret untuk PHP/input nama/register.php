<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = 'user'; // Default role

    $stmt = $conn->prepare("INSERT INTO register (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $role);

    if ($stmt->execute()) {
        header("Location: login.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <!-- fonts google -->
    <link rel="stylesheet" href="fonts-google.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            color: #fff;
            margin: 0;
            padding: 0;
            justify-content: center;
            display: flex;
            align-items: center;
            height: 100vh;
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
        .login-button {
            background-color: #cc0000;
            color: white;
            border: none;
            padding: 8px 20px;
            cursor: pointer;
            transition: 0.3s ease;
            border-radius: 5px;
            margin-top: 10px;
            width: 20%;
        }
        .login-button:hover {
            background-color: #ff0000;
        }

        .tambah,
        .login-button{
            font-family: 'work sans';
            font-weight: bold;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="post" action="register.php">
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <input class="tambah" type="submit" value="Tambah akun">
        </form>
        <button class="login-button" onclick="window.location.href='login.php'">Kembali ke login</button>
    </div>
</body>
</html>
