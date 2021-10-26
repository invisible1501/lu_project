<?php

function access()
{
    if (!empty($_POST)) {
        $tenDangNhap = $_POST['userName'];
        $matKhau = $_POST['password'];

        $connect = new mysqli("localhost", "root", "", "15012001");
        mysqli_set_charset($connect, "utf8");
        if($connect->connect_error) {
            var_dump($connect->connect_error);
            die();
        }

        $query = "SELECT * FROM INFO_USER WHERE USER_NAME = '".$tenDangNhap."' AND PASS_WORD = '".$matKhau."'";
        $result = mysqli_query($connect, $query);
        $data = array();
        while($row = mysqli_fetch_array($result, 1)) {
            $data[] = $row;
        }

        $connect->close();

        /* if (isset($_SESSION['username'])) {
            $sessionTenDangNhap = $_SESSION['username'];
            $sessionmatKhau = $_SESSION['password'];
            if ($tenDangNhap == $sessionTenDangNhap && $matKhau == $sessionmatKhau) header("Location: welcome.php");
        } */
        if($data != NULL) {
            header("Location: welcome.php");
        }
    }
}
