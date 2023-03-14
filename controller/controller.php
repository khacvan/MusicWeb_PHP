

// Xử lý đăng nhập
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND pass='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Tên đăng nhập và mật khẩu đúng
        session_start();
        $_SESSION['username'] = $username;
        header("Location: index.html"); // Chuyển hướng đến trang chính
    } else {
        // Tên đăng nhập hoặc mật khẩu sai

        $error_massage = "Tên đăng nhập hoặc mật khẩu sai.";
//         var_dump($error_massage);
    }
}

