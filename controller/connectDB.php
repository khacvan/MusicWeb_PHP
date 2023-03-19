<?php

$hostname= "localhost";
$user = "root";
$password = "123456";
$db_name = "musicweb";


$conn = mysqli_connect($hostname, $user, $password, $db_name);

if (!$conn) {
    echo "Connection failed!";
    var_dump(mysqli_error($conn));
}
?>

