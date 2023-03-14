<?php

$hostname= "localhost";
$user = "root";
$password = "";
$db_name = "zingmp3";


$conn = mysqli_connect($hostname, $user, $password, $db_name);

if (!$conn) {
    echo "Connection failed!";
    var_dump(mysqli_error($conn));
}
mysqli_select_db($conn,$db_name);

?>

