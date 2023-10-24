<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Shop</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class=" navbar-expand-lg navbar navbar-light"; style="background-color: #e3f2fd;">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">PNF BOOK STORES</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                  <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                  <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                  </li>
              </ul>
        </div>
    </div>
</nav>

<style>
    body {
    background-color: #FFD700; /* รหัสสีหรือชื่อสีของพื้นหลังที่คุณต้องการใช้ */
    }
    .student-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }
    .student-info {
    text-align: center;
    margin: 10px 0; /* เพิ่มระยะห่างด้านบนและด้านล่างของ .student-info */
    }
</style>

</head>
<body>
    <div class="student-container">
        <div class="student-info" ><br><br><br><br><br><br><br><br><br><br><br>
        <img src="img\superwohhh.jpg" alt="Image" class="rounded-md"><br><br>
        <h2><titla>รายชื่อสมาชิก (ผู้รอดชีวิต)</titla></h2><br><br>
            <h5><p>นางสาวพรวลัย สมพรมปัน</p></h5>
            <h5><p>รหัสนิสิต: 64313649</p></h5>
        </div>
        <div class="student-info">
            <h5><p>นางสาวภัทรียา เกษมสุข</p></h5>
            <h5><p>รหัสนิสิต: 64314363</p></h5>
        </div>
        <div class="student-info">
            <h5><p>นางสาวภูพิชญา มิละพงษ์</p></h5>
            <h5><p>รหัสนิสิต: 64314516</p></h5>
        </div>
        <div class="student-info">
            <h5><p>นางสาวสุนิสา สุขเกษม</p></h5>
            <h5><p>รหัสนิสิต: 64316404</p></h5>
        </div>
    </div>
</body>
</html>