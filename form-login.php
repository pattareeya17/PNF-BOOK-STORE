<?php
session_start();
$open_connect = 1;
require('connect.php');
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('img/bookshop.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .container {
            max-width: 400px;
            margin-top: 100px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            background-color: #F8F8FF;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            width: 100%;
            font-size: 18px;
        }

        .btn-secondary {
            width: 100%;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="h4 text-center mb-4 mt-4" role="alert">Login</div>
        <form action="process-login.php" method="POST">
            <div class="form-group">
                <input name="email_account" type="email" class="form-control" placeholder="อีเมล" required>
            </div>
            <div class="form-group">
                <input name="password_account" type="password" class="form-control" placeholder="รหัสผ่าน" required>
            </div>
            <!-- <button type="submit" class="btn btn-primary"  href="index.php">Login</button> -->
            <button type="submit" class="btn btn-primary" onclick="redirectToIndex()">Login</button>
            <a class="btn btn-secondary mt-3" href="form-register.php">New Account</a>
        </form>
    </div>
    <script>
        // JavaScript function to redirect to index.php
        function redirectToIndex() {
            window.location.href = "index.php";
        }
    </script>
        
</body>

</html>