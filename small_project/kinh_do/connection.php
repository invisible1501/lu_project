<?php

$connect = new mysqli("localhost", "root", "", "LIST_ORDER");
mysqli_set_charset($connect, "utf8");
if ($connect->connect_error) {
    var_dump($connect->connect_error);
    die();
}

$query = "INSERT INTO INFO_USER(USER_NAME, PASS_WORD) VALUES('" . $username . "', '" . $password . "')";
mysqli_query($connect, $query);

//dong ket noi
$connect->close();
