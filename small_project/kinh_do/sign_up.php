<?php

require_once("dky.php");

/* $arr = array(
    array(
        'username' => 'nam0106y1501',
        'password' => 'yeubemai151'
    ), array(
        'username' => 'cobemuadong',
        'password' => '123456'
    ), array(
        'username' => 'quentenroi',
        'password' => 'quenluonroi'
    )
);*/

register();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .wrapper {
            position: relative;
            width: 100%;
            height: 100vh;
        }

        .wrapper>div {
            position: absolute;
            height: fit-content;
            width: 100%;
            margin: auto;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
        }

        .wrapper .form {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 30%;
            z-index: 10;
            background: rgba(255, 0, 0, 0.4);
            box-shadow: 0 6px 43px 0 rgba(0, 0, 0, 0.6);
            padding: 15px 0;
            height: fit-content;
            width: 40%;
            color: white;
            margin: auto;
        }

        img {
            opacity: 0.75;
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        form {
            text-align: center;
        }

        form>div {
            width: 80%;
            margin: auto;
            margin-top: 25px;
            margin-bottom: 25px;
            height: 40px;
            text-align: left;
        }

        .c {
            margin: 10px auto;
        }

        .c a:hover {
            cursor: pointer;
        }

        .c span {
            float: right;
        }

        form>div input {
            padding-left: 10px;
            border: none;
            color: black;
            font-weight: bold;
            background: rgba(227, 226, 223, 0.8);
            box-shadow: 4px 2px 10px 0 rgba(0, 0, 0, 0.5);
            height: 100%;
            width: 100%;
        }

        ::placeholder {
            color: black;
        }

        form span:first-child {
            font-size: 26px;
        }

        form button {
            background: rgba(93, 0, 30, 0.6);
            color: white;
            width: 100px;
            height: 40px;
        }

        @media only screen and (max-width: 900px) {
            .wrapper .form {
                width: 60%;
                left: 20%;
                background: rgba(255, 0, 0, 0.5);
            }
        }

        @media only screen and (max-width: 750px) {
            .wrapper .form {
                width: 80%;
                left: 10%;
            }

            form span:first-child {
                font-size: 23px;
            }
        }

        @media only screen and (max-width: 550px) {
            .wrapper .form {
                width: 96%;
                left: 2%;
            }
        }
    </style>
    <script>
        function show() {
            var p = document.getElementById('pwd');
            var re_p = document.getElementById('re_pwd');
            p.setAttribute('type', 'text');
            re_p.setAttribute('type', 'text');
        }

        function hide() {
            var p = document.getElementById('pwd');
            var re_p = document.getElementById('re_pwd');
            p.setAttribute('type', 'password');
            re_p.setAttribute('type', 'password');
        }

        var pwShown = 0;

        function showHide() {

            document.getElementById("eye").addEventListener("click", function() {
                if (pwShown == 0) {
                    pwShown = 1;
                    show();
                } else {
                    pwShown = 0;
                    hide();
                }
            }, false);

        }
    </script>
</head>

<body>
    <div class="wrapper">
        <div>
            <div class="form">
                <form action="" method="POST">
                    <span>Fill out the form below to sign up</span>
                    <div><input type="text" placeholder="Username" name="userName"></div>
                    <div><input id="pwd" type="password" placeholder="Password" name="password"></div>
                    <div><input id="re_pwd" type="password" placeholder="Confirm Password"></div>
                    <div class="c">
                        <a id="eye" onclick="showHide()">Show password</a>
                        <span><a>Remember me</a></span>
                    </div>
                    <button>Sign Up</button>
                </form>
            </div>
            <img src="image/banner.png" alt="">
        </div>
    </div>
</body>

</html>