

<?php
    include "./controller/connectDB.php";
    // Xử lý đăng nhập


if(isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $check_User = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $check_User);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        if(password_verify($password, $hashed_password)) {
            // Tạo session cho user
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            // Chuyển hướng đến trang chủ
            header('Location: index.php');
        } else {
            $error_message = "Mật khẩu không đúng!";


        }
    } else {
        $error_message = "Tài khoản không tồn tại!";
    }
}




if(isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-password']);

    $check_Username = "SELECT * FROM users where username = '$username'";
    $check_Email = "SELECT * FROM users where email = '$email'";

    if(strlen($password)<6){
        $error_message = "Mật khẩu phải có từ 6 kí tự trở lên";
    }elseif (mysqli_num_rows(mysqli_query($conn,$check_Username))>0){
        $error_message = "Tên tài khoản đã có người sử dụng!";
    }
    elseif (mysqli_num_rows(mysqli_query($conn,$check_Email))>0){
        $error_message = "Email đã có tồn tại trong hệ thống!";
    } elseif ($password!==$confirm_password){
        $error_message = "Mật khẩu không trùng khớp!";
    }
    else{
        // Mã hóa mật khẩu bằng bcrypt
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

        // Tạo câu lệnh SQL để thêm người dùng vào cơ sở dữ liệu
        $sql = "INSERT INTO users (username, email, password, avatar, vip, roles) VALUES ('$username','$email', '$encrypted_password','admintrator.png',true,true)";

        // Thực thi câu lệnh SQL
        if (mysqli_query($conn, $sql)) {
            header('Location: login.php');
        } else{
            $error_message = "Lỗi không xác định! ";
        }
    }
}




?>
