<?php
session_start();
include 'condb.php';
// Fetch the latest order using ORDER BY and LIMIT 1
$sql = "SELECT * FROM tb_order ORDER BY reg_date DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$rs = mysqli_fetch_array($result);

if ($rs) {
    $orderID = $rs['orderID'];
    $cus_name = $rs['cus_name'];
    $telephon = $rs['telephon'];

    // Calculate the total price by summing the 'Total' column from oder_detail
    $sql1 = "SELECT SUM(Total) AS total_price FROM oder_detail WHERE orderID = '$orderID'";
    $result1 = mysqli_query($conn, $sql1);
    $total_price = 0; // Initialize total price

    if ($row = mysqli_fetch_array($result1)) {
        $total_price = $row['total_price'];
    }
} else {
    // Handle the case where no order is found
    // You can display an error message or take other actions as needed
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสั่งซื้อ</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php include 'manu.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="alert alert-primary h4 text-center mt-4" role="alert">
                    ข้อมูลการสั่งซื้อ
                </div>
                เลขที่การสั่งซื้อ : <?= $orderID ?><br>
                ชื่อ-นามสกุล (ลูกค้า): <?= $cus_name ?><br>
                เบอร์โทรศัพท์: <?= $telephon ?><br>

                <br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>รหัสสินค้า</th>
                            <th>ชื่อสินค้า</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th>ราคารวม</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2 = "SELECT d.pro_id, p.pro_name, d.orderPrice, d.orderQty, d.Total
                            FROM oder_detail d
                            JOIN product p ON d.pro_id = p.pro_id
                            WHERE d.orderID = '$orderID'";
                        $result2 = mysqli_query($conn, $sql2);

                        while ($row = mysqli_fetch_array($result2)) {
                            ?>
                            <tr>
                                <td><?php echo $row['pro_id']; ?></td>
                                <td><?php echo $row['pro_name']; ?></td>
                                <td><?php echo $row['orderPrice']; ?></td>
                                <td><?php echo $row['orderQty']; ?></td>
                                <td><?php echo $row['Total']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <h6 class="text-end"> รวมเป็นเงิน<?=number_format($total_price,2)?>บาท</h6>
            </div>
        </div>
    </div><br><br>
    ***กรุณาโอนเงินภายใน 7 วัน หลังจากทำการสั่งซื้อ (โอนเงินผ่านธนาคาร กสิกรไทย ชื่อบัญชี นางสาวนพฤดี สกุลชื่น ประเภทบัญชีออมทรัพย์ เลขที่บัญชี 01234567899)
    <br><br>
</div><br>
<div class = "text-center">
<a style="margin-right: 10px;" class="btn btn-dark" href="show_product.php">Back</a>
<button onclick="window.print()" class="btn btn-light" href="">Print</button><br>
</div>
</div>
</div>
</body>
</html>