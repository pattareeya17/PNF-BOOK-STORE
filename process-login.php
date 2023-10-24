<?php
session_start();
$open_connect = 1;
require('connect.php');

if(isset($_POST['email_account']) && isset($_POST['password_account'])){
    $email_account = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['email_account']));
    $password_account = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['password_account']));
    
    // เริ่มต้นตรวจสอบข้อมูล
    $query_check_account = "SELECT * FROM account WHERE email_account = '$email_account'";
    $call_back_check_account = mysqli_query($connect, $query_check_account);

    if(mysqli_num_rows($call_back_check_account) == 1){
        $result_check_account = mysqli_fetch_assoc($call_back_check_account);
        $hash = $result_check_account['password_account'];
        $password_account = $password_account . $result_check_account['salt_account'];

        // ตรวจสอบรหัสผ่าน
        if(password_verify($password_account, $hash) && $result_check_account['lock_account'] != 1){
            $query_reset_login_count_account = "UPDATE account SET login_count_account = 0 WHERE email_account = '$email_account'";
            mysqli_query($connect, $query_reset_login_count_account);

            $_SESSION['id_account'] = $result_check_account['id_account'];
            $_SESSION['role_account'] = $result_check_account['role_account'];

            if($result_check_account['role_account'] == 'member'){
                header('Location: index.php'); // นำผู้ใช้ไปยังหน้า index.php
            } elseif($result_check_account['role_account'] == 'admin'){
                header('Location: admin.php');
            }
        } else {
            // กรณีรหัสผ่านไม่ถูกต้องหรือบัญชีถูกระงับ
            $query_update_login_count_account = "UPDATE account SET login_count_account = login_count_account + 1 WHERE email_account = '$email_account'";
            mysqli_query($connect, $query_update_login_count_account);

            if($result_check_account['login_count_account'] + 1 >= $limit_login_account){
                $query_lock_account = "UPDATE account SET lock_account = 1, ban_account = NOW() + INTERVAL $time_ban_account MINUTE WHERE email_account = '$email_account'";
                mysqli_query($connect, $query_lock_account);
            }

            header('Location: form-login.php'); // รหัสผ่านไม่ถูกต้องหรือบัญชีถูกระงับ
        }
    } else {
        header('Location: form-login.php'); // ไม่มีอีเมลนี้ในระบบ
    }
} else {
    header('Location: form-login.php'); // กรุณากรอกข้อมูล
}
?>
