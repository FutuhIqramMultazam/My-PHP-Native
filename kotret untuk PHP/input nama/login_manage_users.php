<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'admin') {
    header("Location: manage_users.php");
    exit();
}

if (isset($_POST["kirim"])) {
    if ($_POST["username"]=="icam" && $_POST["password"]=="123") {
        $_SESSION['user_id'] = 1; // Set sesuai dengan ID pengguna yang sebenarnya
        $_SESSION['role'] = 'admin';
        header("Location: manage_users.php");
        exit;
    } else {
        $salah = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login manage users</title>
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
            ::placeholder { /* Style untuk placeholder */
                color: white;
                opacity: 0.6;
            }
        }
        input[type="submit"] {
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
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .manage-users-button {
            background-color: silver;
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
            background-color: #999;
        }
        .manage-users-button {
            background-color: #4287f5;
        }
        .manage-users-button:hover {
            background-color: #3366cc;
        }
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Menggunakan tinggi viewport untuk kontainer */
        }
        p{
            color: red;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <h2>Login manage users</h2>
            <?php if(isset($salah)): ?>
                <p>Username atau password salah</p>
            <?php endif; ?>
            <form action="login_manage_users.php" method="post">
                <div>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button class="manage-users-button" type="submit" name="kirim">Login</button>
            </form>
            <form action="index.php">
                <button  class="logout-users-button" type="submit">Kembali</button>
            </form>
        </div>
    </div>
</body>
</html>
