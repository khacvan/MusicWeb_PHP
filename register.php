
<?php
session_start();
include "./controller/connectDB.php";
include "./controller/controller.php";


//if(isset($_POST['register'])) {
//    $username = mysqli_real_escape_string($conn, $_POST['username']);
//    $email = mysqli_real_escape_string($conn, $_POST['email']);
//    $password = mysqli_real_escape_string($conn, $_POST['password']);
//    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-password']);
//
//    $check_Username = "SELECT * FROM users where username = '$username'";
//    $check_Email = "SELECT * FROM users where email = '$email'";
//
//    if(strlen($password)<6){
//        $error_message = "Mật khẩu phải có từ 6 kí tự trở lên";
//    }elseif (mysqli_num_rows(mysqli_query($conn,$check_Username))>0){
//        $error_message = "Tên tài khoản đã có người sử dụng!";
//    }
//    elseif (mysqli_num_rows(mysqli_query($conn,$check_Email))>0){
//        $error_message = "Email đã có tồn tại trong hệ thống!";
//    } elseif ($password!==$confirm_password){
//        $error_message = "Mật khẩu không trùng khớp!";
//    }
//    else{
//        // Mã hóa mật khẩu bằng bcrypt
//        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
//
//        // Tạo câu lệnh SQL để thêm người dùng vào cơ sở dữ liệu
//        $sql = "INSERT INTO users (username, email, password, avatar, vip, roles) VALUES ('$username','$email', '$encrypted_password','admintrator.png',true,true)";
//
//        // Thực thi câu lệnh SQL
//        if (mysqli_query($conn, $sql)) {
////            echo "Đăng ký thành công!";
//            header('Location: login.php');
//        } else{
//            $error_message = "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
//        }
//    }
//}
//
//
//
//?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up ZingMp3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="assets/img/login/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<!--===============================================================================================-->
</head>
<body>

<div class="limiter">
	<div class="container-login100" style="background-image: url('assets/img/login/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
			<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-49">
						Sign Up
					</span>

				<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is required">
					<span class="label-input100">Username</span>
					<input class="input100" type="text" name="username" placeholder="Type your username" required>
					<span class="focus-input100" data-symbol="&#xf206;"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-23" data-validate = "Email is required">
					<span class="label-input100">Email</span>
					<input class="input100" type="email" name="email" placeholder="Type your email" required>
					<span class="focus-input100" data-symbol="&#xf206;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Password is required">
					<span class="label-input100">Password</span>
					<input class="input100" type="password" name="password" placeholder="Type your password" required>
					<span class="focus-input100" data-symbol="&#xf190;"></span>
				</div>


				<div class="wrap-input100 validate-input" data-validate="Password is required">
					<span class="label-input100">Confirm Password</span>
					<input class="input100" type="password" name="confirm-password" placeholder="Confirm your  password" required>
					<span class="focus-input100" data-symbol="&#xf190;"></span>
				</div>

				<br>



				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button class="login100-form-btn" id="register" name="register" type="submit"  data-toggle="modal" data-target="#modalSuccess">
							Sign Up
						</button>
					</div>
				</div>

                <?php if (isset($error_message)): ?>
                    <br>
                    <br>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>

				<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Or Sign Up Using
						</span>
				</div>

				<div class="flex-c-m">
					<a href="#" class="login100-social-item bg1">
						<i class="fa fa-facebook"></i>
					</a>

					<a href="#" class="login100-social-item bg2">
						<i class="fa fa-twitter"></i>
					</a>

					<a href="#" class="login100-social-item bg3">
						<i class="fa fa-google"></i>
					</a>
				</div>

			</form>
		</div>
	</div>
</div>






<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/bootstrap/js/popper.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/daterangepicker/moment.min.js"></script>
<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="assets/javascript/main1.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#success-modal').modal('show');
        setTimeout(function(){
            window.location.href = 'login.php';
        }, 3000);
    });
</script>

</body>
</html>