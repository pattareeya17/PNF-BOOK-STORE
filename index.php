<?php
include 'condb.php'; // Include your database connection file
$sql = "SELECT * FROM product ORDER BY pro_id";
$result = $conn->query($sql);
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

<div class="container ">
    <br><br>
    <div class="row">
        <?php
        $sql ="SELECT * FROM product ORDER BY pro_id";
        $result = $conn->query($sql);
        while($row=mysqli_fetch_array($result )){
            ?>
            <div class="col-sm-3 ">
                <div class="text-center">
                    <img src="img/<?=$row['image']?>" width="200px" height="320px" class="mt-5 p-2 border"> <br>
                    ID: <?=$row['pro_id']?> <br>
                    <h5 class="text-dark"> <?=$row['pro_name']?> </h5><br>
                    ราคา <b class="text-danger"><?=$row['price']?>   </b>  บาท<br>
                    <a class="btn btn-outline-primary mt-3" href="shop_product_detail.php?id=<?=$row['pro_id']?> " > รายละเอียด  </a>
                </div>
            </div>
            <?php
        }
        mysqli_close($conn);
        ?>
    </div>
</div>

<br><br>
<br><br>
<br><br>
</body>
</html>
