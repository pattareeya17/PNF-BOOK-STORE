<?php
session_start();
include 'condb.php';    
$cusName = $_POST['cus_name'];
$cusAddress = $_POST['cus_add'];
$cusTel = $_POST['cus_tel'];

$sql = "INSERT INTO tb_order (cus_name, address, telephon, total_price, order_status)
        VALUES ('$cusName', '$cusAddress', '$cusTel', '" . $_SESSION['$sum_price'] . "', '1')";

$_SESSION["order_id"]=$orderID;
if (mysqli_query($conn, $sql)) {
    $orderID = mysqli_insert_id($conn);

    // Insert order details into 'order_detail' table
    for ($i = 0; $i <= (int)$_SESSION['intLine']; $i++) {
        if ($_SESSION["strProductID"][$i] != "") {
            $sql1 = "SELECT * FROM product WHERE pro_id = '" . $_SESSION["strProductID"][$i] . "'";
            $result1 = $conn->query($sql1);
            $row1 = mysqli_fetch_array($result1); 
            $price = $row1['price'];
            $total = $_SESSION["strQty"][$i] * $price;

            $sql2 = "insert into  oder_detail (orderID, pro_id, orderPrice, orderQty, Total)
                    VALUES ('$orderID', '" . $_SESSION["strProductID"][$i] . "', '$price', '" . $_SESSION["strQty"][$i] . "', '$total')";
            if (mysqli_query($conn, $sql2)) {
                // Update product stock
                $sql3 = "UPDATE product SET amount = amount - '" . $_SESSION["strQty"][$i] . "'
                         WHERE pro_id = '" . $_SESSION["strProductID"][$i] . "'";
                mysqli_query($conn, $sql3);
            }
        }
    }

    // Clear session data
    unset($_SESSION["intLine"]);
    unset($_SESSION["strProductID"]);
    unset($_SESSION["strQty"]);
    unset($_SESSION["sum_price"]);

    //echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
    echo "<script>window.location='print_order.php';</script>";
} 
// else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

mysqli_close($conn);
?>
