<?php
    session_start();
    include 'condb.php';

    ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<?php include 'manu.php'; ?> 

<div class="container">
  <form id="form1" method="POST" action="insert_cart.php">
    <div class =" row">
      <div class =" col-md-10">
      <div class =" alert alert-success" h4 role="alert">
            การสั่งซื้อสินค้า
      </div>
    <table class ="table table-hover">
      <tr>
          <th>ลำคับที่</th>
          <th>ชื่อสินค้า</th>
          <th>ราคา</th>
          <th>จำนวณ</th>
          <th>ราคารวม</th>
          <th>เพิ่ม-ลด</th>
          <th>ลบ</th>
      </tr>
<?php
$Total = 0;
$sumPrice = 0;
$m = 1;
for ($i = 0; $i <= (int)$_SESSION['intLine']; $i++) {
    if ($_SESSION["strProductID"][$i] != "") {
        $sql1 = "SELECT * FROM product WHERE pro_id = '" . $_SESSION["strProductID"][$i] . "'";
        $result1 = $conn->query($sql1);
        $row_pro = mysqli_fetch_array($result1);

        $_SESSION["price"] = $row_pro['price'];
        $Total = $_SESSION["strQty"][$i];
        $sum = $Total * $row_pro['price'];
        $sumPrice = $sumPrice + $sum;
        $_SESSION['$sum_price']=$sumPrice;
?>

        <tr>
            <td> <?= $m ?> </td>
            <td> 
                <img src="img/<?= $row_pro['image']?>" width="80" height="100" class="border">
            <?= $row_pro['pro_name'] ?> 
            </td>
            <td> <?= $row_pro['price'] ?> </td>
            <td> <?= $_SESSION["strQty"][$i] ?> </td>
            <td> <?= $sum ?> </td>
            <td> 
            <a href ="order.php?id=<?=$row_pro['pro_id']?>" class="btn btn-outline-success">+</a>
            <?php if($_SESSION["strQty"][$i] >1 ) { ?>
            <a href ="order_del.php?id=<?=$row_pro['pro_id']?>" class="btn btn-outline-success">-</a>
            <?php } ?>
            </td>
            <td> <a href ="pro_delete.php?Line=<?=$i?>"> <img src="img/delete.webp" width="30" > </a> </td>
            
        </tr>
<?php
        $m = $m + 1;
    }
}
?>
<tr>
  <td class="text-end" colspan="4"> รวมเป็นเงิน </td>
  <td class="text-center"> <?=$sumPrice ?> </td>
  <td> บาท </td>

</tr>
</table>
  <div style ="text-align:right">
  <a href ="index.php"> <button type="button" class="btn btn-outline-success">เลือกสินค้า</button> </a>
  <button type="submit" class="btn btn-success">ยืนยันการสั่งซื้อ</button>
  </div>
  </div>
  <br><br><br><br><br><br><br><br>
  
  <div class="container">
    <div class =" row">
        <div class =" col-md-4">
          <div class =" alert alert-success" h4 role="alert">
            ข้อมูลจัดส่งสินค้า
          </div>
          ชื่อ-นามสกุล:
          <input type="text" name="cus_name" class="form-control" required placeholder="ชื่อ-นามสกุล..." ><br>
          ที่อยู้จัดส่งสินค้า:
          <textarea class="form-control" required placeholder="ที่อยู่..." name="cus_add" row="3" > </textarea><br>
          เบอร์โทรศัพท์:
          <input type="tel" name="cus_tel" class="form-control" required placeholder="เบอร์โทรศัพท์" >
        </div>
      <div>
    <div>
  </form>
  <br><br><br><br>
</div>
</body>
</html>
