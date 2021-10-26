<?php

function register()
{
    if (!empty($_POST)) {
        $username = $_POST['userName'];
        $password = $_POST['password'];

        //ket noi toi co so du lieu co ten la login 
        $connect = new mysqli("localhost", "root", "", "15012001");
        mysqli_set_charset($connect, "utf8");
        if($connect->connect_error) {
            var_dump($connect->connect_error);
            die();
        }

        $query = "INSERT INTO INFO_USER(USER_NAME, PASS_WORD) VALUES('".$username."', '".$password."')";
        mysqli_query($connect, $query);

        //dong ket noi
        $connect->close();

        header("Location: sign_in.php");
        /* for ($i = 0; $i < count($arr); $i++) {
            if ($username == $arr[$i]['username']) {
                if ($password == $arr[$i]['password']) {
                    header("Location: welcome.php");
                }
            }
        } */
    }
}
