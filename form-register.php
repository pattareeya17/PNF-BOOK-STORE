<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างบัญชีใหม่</title>
    <style>
        body {
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            text-align: center;
            background: url('img/bookshop.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .container {
    max-width: 400px;
    margin-top: 100px;
    margin-left: auto;
    margin-right: auto;
    padding: 20px;
    border: 2px; /* ปรับขนาดของกรอบและสีตามต้องการ */
    border-radius: 10px;
    background-color: #ffffff;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    background-color: #F8F8FF;
}


        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
    width: 100%;
    padding: 10px;
    background-color: #007bff; /* สีปุ่มเดียวกับหน้า Login */
    color: #ffffff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
}

a.btn-secondary {
    width: 100%;
    font-size: 18px; /* สีเมื่อนำเมาส์ไปวางบนปุ่ม */
}


        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>สร้างบัญชีของคุณ</h1>
        <form action="process-register.php" method="POST">
            <div>
                <input name="username_account" type="text" placeholder="ชื่อผู้ใช้" required>
            </div>
            <div>
                <input name="email_account" type="email" placeholder="อีเมล" required>
            </div>
            <div>
                <input name="password_account1" type="password" placeholder="รหัสผ่านใหม่" required>
            </div>
            <div>
                <input name="password_account2" type="password" placeholder="ยืนยันรหัสผ่าน" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <p><a class="btn btn-secondary mt-3" href="form-login.php">Login</a></p>
        </form>
    </div>
</body>

</html>
