<?php
include 'condb.php';
?>
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
<?php include 'manu.php'; ?> 

<div class="container">
<div class="row">
    <?php
    $ids = $_GET['id'];
    $sql = "SELECT * FROM product WHERE product.pro_id = '$ids'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
        ?>
        <div class="col-sm-4">
            <img src="img/<?=$row['image']?>" width="350px" class="mt-5 p-2 m-2 border"> 
        </div>

        <div class="col-sm-6">
        <br><br>
            ID: <?=$row['pro_id']?> <br>
            ชื่อหนังสือ:<h5 class="text-dark"> <?=$row['pro_name']?> </h5>
            แปลจากหนังสือ:<?=$row['tarn']?> <br>
            ผู้เขียน:<?=$row['author']?> <br>
            ผู้แปล: <?=$row['trantor']?> <br>
            สำนักพิมพ์: <?=$row['publisher']?> <br>
            จำนวนหน้า: <?=$row['pages']?> หน้า<br>
            รายละเอียด: <?=$row['detail']?> <br>
            ราคา:  <b class="text-danger"><?=$row['price']?>   </b>  บาท<br>
            <a class="btn btn-outline-primary mt-3" href="order.php?id=<?=$row['pro_id']?>"  > Add cart  </a>
            <a href ="index.php"> <button type="button" class="btn btn-outline-primary mt-3">ย้อนกลับ</button> </a>
        </div>
        <?php
    
    ?>
    </div>
</div>
<?php 
mysqli_close($conn);
?>
  
</body>
</html>
