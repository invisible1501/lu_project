<?php

require_once('db/dbhelper.php');
require_once('utils/utilities.php');

$list_product = executeResult('select * from products');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="all,follow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-
    B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-
    DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-
    Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-latest.pack.js"></script>

    <!-- Chat bot -->
    <link href="https://chatcompose.azureedge.net/static/all/global/export/css/main.5b1bd1fd.css" rel="stylesheet">
    <script async type="text/javascript" src="https://chatcompose.azureedge.net/static/all/global/export/js/main.a7059cb5.js?user=tttm15012001&lang=VI" user="tttm15012001" lang="VI"></script>

    <title>Document</title>
    <script>
        /* $.post('api/cookie.php', {
                'action': 'add',
                'id': id,
                'num': 1
            }, function(data) {
                header("Location: sign_in.php");
            })  */

        function nav() {
            var sideNav = document.getElementById("nav");
            var menu = document.getElementById("menu");
            if (sideNav.style.left == "-250px") {
                sideNav.style.left = "0";
                menu.src = "image/close.png";
            } else {
                sideNav.style.left = "-250px";
                menu.src = "image/menu.png";
            }
        }

        function addToCart(id) {
            //var data_test = 'This is first demo';
            $.ajax({
                url: 'api/cookie.php',
                type: 'POST',
                data: {
                    'action': 'add',
                    'id': id,
                    'num': 1
                },
                success: function(data) {
                    location.reload();
                },
                error: function(e) {
                    console.log(e.message);
                }
            });
        }
    </script>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .header {
            width: 100%;
            background-color: #FFD700;
            height: 110px;
        }

        .header .div_1 img {
            width: 110px;
            height: 110px;
            object-fit: cover;
        }

        .header .div_2,
        .header .div_3 {
            line-height: 35px;
            height: 35px;
            width: 100%;
            margin-top: 37.5px;
            text-align: left;
            padding: 0;
        }

        .header .div_2 select {
            width: 50px;
            height: 35px;
            float: right;
        }

        .header .div_2 input {
            width: calc(100% - 100px);
            float: right;
            height: 35px;
        }

        .div_2_2 {
            display: none;
        }

        .header .div_3 {
            padding-left: 10px;
        }

        .header .div_3 nav {
            float: right;
        }

        .header .div_3 nav img {
            width: 35px;
            height: 35px;
            margin-top: -4px;
        }

        .header .div_3 nav .login a {
            color: red;
        }

        .header .div_3 nav>div {
            border-radius: 5px;
            padding: 0 7px;
            float: left;
        }

        .header .div_3 nav .login {
            font-weight: bold;
        }

        .header .div_3 nav .login:hover {
            background-color: white;
        }

        .header .div_3 nav .login:hover a {
            color: black;
        }

        .header .div_3 nav a {
            color: white;
        }

        #nav {
            height: 100vh;
            width: 220px;
            position: fixed;
            top: 0;
            left: -250px;
            z-index: 10;
            padding: 60px 3px 0 3px;
            background-color: #444444;
            transition: left 0.5s;
            font-size: 15.5px;
        }

        #nav ul li a {
            list-style-type: none;
            text-decoration: none;
            color: white;
        }

        #nav .dropdown-divider {
            margin: 10px 0;
        }

        #menuBtn {
            position: fixed;
            top: 15px;
            left: 15px;
            width: fit-content;
            width: 40px;
            height: 40px;
            text-align: center;
            background-color: #444444;
            z-index: 11;
            border-radius: 3px;
        }

        #menuBtn img {
            width: 20px;
            margin-top: 10px;
            object-fit: cover;
        }

        .lien_he {
            position: fixed;
            right: 20px;
            bottom: 90px;
            z-index: 11;
            width: 60px;
            height: fit-content;
        }

        .lien_he>div {
            width: 50px;
            height: 50px;
            margin: 10px 0;
        }

        .lien_he>div img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .lien_he>div:hover {
            width: 60px;
            height: 60px;
            margin-top: -10px;
        }

        #carouselExampleIndicators {
            height: 570px;
        }

        #carouselExampleIndicators .carousel-inner .img {
            width: 100%;
            height: 570px;
        }

        #carouselExampleIndicators video {
            height: 570px;
        }

        #carouselExampleIndicators .img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #carouselExampleIndicators ol li {
            color: blue;
        }

        #trangVang {
            background-color: #eee;
            width: 100%;
        }

        #trangVang .header {
            font-family: 'Lobster', cursive;
            height: 80px;
            color: rgb(158, 19, 19);
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            line-height: 80px;
        }

        .content {
            padding: 25px 0;
            text-align: center;
            width: 100%;
        }

        .content .img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            background-color: white;
            height: 230px;
        }

        .content .img img {
            width: 90%;
            margin: auto;
            height: 100%;
        }

        .content .card-body {
            background-color: white;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .content .item {
            transition: 0.6s;
        }

        .content .item:hover {
            margin-top: -6px;
            margin-bottom: 6px;
        }

        .card-body>div .button {
            width: 100px;
            background-color: white;
        }

        #trangVang button {
            width: 100px;
            height: 30px;
            background-color: red;
            color: white;
        }

        #trangVang button:hover {
            cursor: pointer;
            background-color: brown;
        }

        #news {
            padding: 0px 0 230px 0;
        }

        #news .header {
            width: 100%;
            color: rgb(158, 19, 19);
            font-size: 30px;
            font-weight: bold;
            font-family: 'Lobster', cursive;
            text-align: center;
            height: 80px;
            line-height: 80px;
        }

        #news .content>div {
            text-align: left;
        }

        #news .content .img {
            padding: 0 10px;
            opacity: 0.6;
            transition: 0.6s;
            width: 100%;
            height: 300px;
        }

        #news .content .script {
            padding-right: 25px;
            text-align: justify;
            opacity: 0;
            position: absolute;
            top: 50%;
            transition: 0.9s;
        }

        #news .content .img:hover {
            cursor: pointer;
            opacity: 1;
        }

        #news .content .img:hover .script {
            top: 100%;
            opacity: 1;
        }

        #news .content .script>div {
            font-size: 14px;
            height: fit-content;
            padding: 3px 0;
        }

        #news .content .script hr {
            width: 30px;
            padding: 0;
            margin: 0;
        }

        #news .content .img>img {
            border-radius: 10px;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #news span a {
            color: rgb(158, 19, 19);
        }

        .wrapper_hidden {
            width: 100%;
            height: 100vh;
            position: fixed;
            top: 0;
            left: -100%;
            transition: 0.5s;
        }

        .wrapper_hidden>div {
            display: grid;
            grid-template-columns: 17.5% 65% 17.5%;
        }

        .wrapper_hidden>div:first-child,
        .wrapper_hidden>div:last-child {
            height: calc((100vh - 550px) / 2);
        }

        .hidden {
            text-align: center;
            height: 550px;
            padding: 15px 45px;
            border-radius: 20px;
            background-color: #eee;
            overflow-y: scroll;
            z-index: 1000;
        }

        .hidden p {
            text-align: justify;
        }

        .hidden .head {
            height: fit-content;
            padding: 10px 0;
            border-radius: 13px;
            text-align: center;
            font-size: 22px;
            word-spacing: 8px;
            color: red;
            font-weight: bold;
            font-family: 'Lobster', cursive;
        }

        .hidden img {
            width: 60%;
            height: auto;
            object-fit: cover;
        }

        /* Hoạt động chính */

        #hd_chinh .header {
            width: 100%;
            color: rgb(158, 19, 19);
            font-size: 30px;
            font-weight: bold;
            font-family: 'Lobster', cursive;
            text-align: center;
            height: 80px;
            line-height: 80px;
        }

        #hd_chinh .hang_2,
        .hang_3 {
            display: grid;
        }

        .hd_chinh {
            height: fit-content;
            padding: 50px 0;
            width: 100%;
        }

        .hd_chinh img {
            border-radius: 10px;
            width: 100%;
            height: 100%;
        }

        #hd_chinh .hang_2 {
            margin-bottom: 50px;
            height: 200px;
            grid-template-columns: 7% 28.66% 28.66% 28.66% 7%;
        }

        #hd_chinh .hang_3 {
            height: fit-content;
            grid-template-columns: 7% 16% 27% 27% 16% 7%;
        }

        #hd_chinh .hang_2>div,
        .hang_3>div {
            padding: 0 25px;
        }

        #hd_chinh .pic {
            width: 100%;
            position: relative;
        }

        #hd_chinh .pic .overlay {
            width: calc(100% - 50px);
            height: 100%;
            position: absolute;
            top: 0;
            border-radius: 10px;
            background-image: linear-gradient(to top, rgba(255, 215, 0, 0.8), rgba(238, 238, 238, 0.3));
            opacity: 0;
            transition: 1s;
        }

        #hd_chinh .script {
            width: 80%;
            text-align: center;
            color: black;
            position: absolute;
            bottom: 0;
            opacity: 0;
            left: 50%;
            transform: translateX(-50%);
            transition: 0.8s;
            font-weight: bold;
        }

        hr {
            width: 90%;
            margin: 10px auto;
            height: 2px;
        }

        #hd_chinh .pic:hover .overlay {
            opacity: 1;
        }

        #hd_chinh .pic:hover .script {
            bottom: 10%;
            opacity: 0.7;
        }

        #contact {
            width: 100%;
            background-color: rgb(170, 29, 4);
            padding-top: 30px;
            color: rgb(224, 224, 224);
        }

        #contact .contact {
            box-shadow: 0px 3px 5px rgb(114, 18, 1);
        }

        #contact .contact .chi_nhanh {
            width: 50%;
            margin: auto;
        }

        #contact .contact .chi_nhanh>div {
            text-align: center;
        }

        #contact .contact .chi_nhanh>div .header {
            width: 100%;
            height: 45px;
            line-height: 45px;
            padding-left: 10px;
            font-size: 18px;
            font-weight: bold;
            background-color: rgb(114, 29, 3);
        }

        #contact h4 {
            font-size: 13.8px;
            margin: 15px 0;
        }

        #contact p {
            line-height: 28px;
        }

        #contact .script {
            width: 90%;
            margin: auto;
            padding: 60px 0;
            text-align: center;
            color: rgb(180, 179, 179);
            font-size: 16.5px;
            line-height: 22px;
        }

        #contact .bottom {
            margin-top: 5px;
            z-index: -1;
            width: 100%;
            height: 65px;
            background-color: rgb(170, 29, 4);
        }

        @media only screen and (max-width: 1200px) {
            #news {
                padding-bottom: 0px;
            }

            #news .row>div {
                margin-bottom: 200px;
            }
        }

        @media only screen and (max-width: 767.5px) {
            .header .div_1 img {
                width: 90px;
                height: 90px;
                object-fit: cover;
                margin-top: 10px;
            }

            .header .div_2>div {
                padding-right: 10px;
            }

            .header .div_2 input {
                width: calc(100% - 50px);
            }

            .header .middle {
                width: 100%;
                height: 35px;
            }

            .header .div_2 {
                position: relative;
            }

            .header .div_2>div {
                width: 100%;
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                height: fit-content;
                margin: auto;
            }

            .div_2_2 {
                display: unset;
                width: 100%;
                height: 35px;
                line-height: 35px;
            }

            .div_2_2 {
                text-align: center;
            }

            .div_2_2 img {
                width: 35px;
                height: 35px;
                object-fit: cover;
            }

            .div_3 {
                display: none;
            }

            #contact .contact .chi_nhanh {
                width: 90%;
            }

            #contact .script {
                width: 90%;
                margin: auto;
            }
        }
    </style>
</head>

<body onload="nav()">
    <?php
    $count = 0;
    $cart = [];
    if (isset($_COOKIE['cart'])) {
        $json = $_COOKIE['cart'];
        $cart = json_decode($json, true);
    }
    foreach ($cart as $item) {
        $count += $item['num'];
    }
    ?>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-3 col-4 div_1">
                    <img src="image/LU/Logo Bánh Lu.png" alt="">
                </div>
                <div class="col-lg-7 col-md-5 col-sm-9 col-8 div_2">
                    <div>
                        <div class="div_2_2">
                            <nav>
                                <a href="cart.php"><img src="image/icons8-cart-64.png" alt=""></a>
                                <a href="#">Đăng nhập</a>
                                <a href="#">Đăng ký</a>
                            </nav>
                        </div>
                        <div class="middle">
                            <input type="text" placeholder="Điền loại bánh cần tìm">
                            <div>
                                <select id="multiSelect">
                                    <option value="">All</option>
                                    <option value="">Bánh quế Lu Wafer 97.5g</option>
                                    <option value="">Bánh quế Lu Wafer 234g</option>
                                    <option value="">Cookies bơ Pháp LU 180g</option>
                                    <option value="">Cookies bơ Pháp LU 310g</option>
                                    <option value="">Cookies bơ Pháp LU 540g</option>
                                    <option value="">Cookies bơ Pháp LU 708g</option>
                                    <option value="">Cookies bơ Pháp LU 894g</option>
                                    <option value="">Lu veritable petit beurre 600g</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 div_3">
                    <nav>
                        <div><a href="cart.php"><img src="image/icons8-cart-64.png" alt=""></a><sup><?= $count ?></sup></div>
                        <div class="login">Kính chào quý khách</div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div id="nav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">TRANG CHỦ</a>
            </li>
            <div class="dropdown-divider"></div>
            <li class="nav-item">
                <a class="nav-link" href="#">BẢNG GIÁ 2022</a>
            </li>
            <div class="dropdown-divider"></div>
            <li class="nav-item">
                <a class="nav-link" href="#">BÁNH QUẾ LU WAFER</a>
            </li>
            <div class="dropdown-divider"></div>
            <li class="nav-item">
                <a class="nav-link" href="#">BÁNH COOKIES BƠ PHÁP LU</a>
            </li>
            <div class="dropdown-divider"></div>
            <li class="nav-item">
                <a class="nav-link" href="#">LU VERITABLE PETIT BEURRE</a>
            </li>
            <div class="dropdown-divider"></div>
            <li class="nav-item">
                <a class="nav-link" href="#">LIÊN HỆ</a>
            </li>
            <div class="dropdown-divider"></div>
        </ul>
    </div>
    <div class="lien_he">
        <div>
            <a href="#">
                <img src="image/fb.png" alt="">
            </a>
        </div>
        <div>
            <a href="#">
                <img src="image/youtube.png" alt="">
            </a>
        </div>
        <div>
            <a href="#">
                <img src="image/zalo.png" alt="">
            </a>
        </div>
        <div>
            <a href="#">
                <img src="image/twitter.png" alt="">
            </a>
        </div>
    </div>
    <div id="menuBtn" onclick="nav()"><img src="image/menu.png" id="menu"></div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active img">
                <img class="d-block w-100" src="image/banner_1.png" alt="First slide">
            </div>
            <div class="carousel-item img">
                <video class="d-block w-100" muted="" preload="metadata" controls autoplay>
                    <source src="image/tvc.mp4" type="video/mp4">
                </video>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div id="trangVang">
        <div class="header">
            BÁNH LU 2022
        </div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <?php
                    foreach ($list_product as $item) {
                        echo '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 item" style="padding: 15px; height: fit-content;">
                                    <div class="img">
                                        <img class="card-img-top" src="' . $item['thumbnail'] . '" alt="">
                                    </div>
                                    <div class="card-body">
                                        <div>' . $item['title'] . '</div>
                                        <div style="font-size: 16px; color: red;">' . number_format($item['price'], 0, ',', '.') . '</div>
                                        <div>
                                            <button onclick="addToCart(' . $item['id'] . ')">ĐẶT HÀNG</button>
                                        </div>
                                    </div>
                                </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div id="news">
        <div class="header">
            Blog
        </div>
        <div class="content container">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="img" onclick="show(0)">
                        <img src="image/LU/bí mật ẩn sau chiếc bánh quy Lu trứ danh của nước Pháp.jpg" alt="">
                        <div class="script">
                            <div>
                                <span>
                                    <a href="https://tiengphapthuvi.fr/bi-mat-sau-chiec-banh-quy-lu-tru-danh-cua-nuoc-phap/" target="_blank">
                                        BÍ MẬT ẨN SAU CHIẾC BÁNH QUY LU TRỨ DANH CỦA NƯỚC PHÁP
                                    </a>
                                </span>
                            </div>
                            <div>
                                <p style="font-size: 11px;">07/12/2021</p>
                            </div>
                            <hr>
                            <div>
                                <p>Suốt chiều dài lịch sử 170 năm, có mặt trên hơn 100 quốc gia,
                                    bánh quy LU vẫn giữ được danh tiếng nhờ hương vị tinh tế bất chấp thời gian.
                                    Và ẩn sau mỗi chiếc bánh ấy là những câu chuyện thú vị về nền văn hóa Pháp –
                                    cái nôi của văn hóa châu Âu.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="img" onclick="show(1)">
                        <img src="image/LU/Tết là gì trong suy nghĩ của cánh mày râu.jpg" alt="">
                        <div class="script">
                            <div>
                                <span>
                                    <a href="https://afamily.vn/tet-la-gi-trong-suy-nghi-cua-canh-may-rau-20190118162957808.chn" target="_blank">
                                        TẾT LÀ GÌ TRONG SUY NGHĨ CỦA CÁNH MÀY RÂU?
                                    </a>
                                </span>
                            </div>
                            <div>
                                <p style="font-size: 11px;">18/12/2021</p>
                            </div>
                            <hr>
                            <div>
                                <p>Mỗi độ Tết về, mạng xã hội lại dậy sóng những luồng ý kiến trái chiều
                                    về vai trò và sự bận rộn của người phụ nữ trong ngày Tết.
                                    Số đông thấu hiểu sự vất vả với người phụ nữ, số khác lên tiếng chê
                                    trách cánh đàn ông thiếu sự hỗ trợ và chia sẻ. Vậy những người đàn ông, họ nghĩ gì khi Tết đến</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="img" onclick="show(2)">
                        <img src="image/LU/Xu hướng chọn hộp quà bánh ngày Tết.jpg" alt="">
                        <div class="script">
                            <div>
                                <span>
                                    <a href="https://www.bachhoaxanh.com/kinh-nghiem-hay/cac-hop-banh-quy-dep-ngon-thich-hop-lam-qua-tang-ngay-tet-1228863" target="_blank">
                                        CÁCH CHỌN HỘP QUÀ BÁNH NGÀY TẾT
                                    </a>
                                </span>
                            </div>
                            <div>
                                <p style="font-size: 11px;">07/01/2021</p>
                            </div>
                            <hr>
                            <div>
                                <p>Các hộp bánh quy đẹp, ngon thích hợp tặng Tết luôn là chủ đề
                                    tìm kiếm mỗi khi Tết đến xuân về. Bởi lựa chọn quà biếu Tết tặng gia đình,
                                    bạn bè, đồng nghiệp, đối tác,... vừa mang ý nghĩa gửi đi may mắn, bình an,
                                    vừa chứa đựng tình cảm người gửi.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="img" onclick="show(3)">
                        <img src="image/hộp bánh.jpg" alt="">
                        <div class="script">
                            <div>
                                <span>
                                    <a href="http://www.savourydays.com/cach-lam-banh-quy-bo-tet/" target="_blank">
                                        CÁCH LÀM HỘP QUÀ BÁNH NGÀY TẾT ĐẸP MẮT VÀ SANG TRỌNG
                                    </a>
                                </span>
                            </div>
                            <div>
                                <p style="font-size: 11px;">28/01/2022</p>
                            </div>
                            <hr>
                            <div>
                                <p>Ngoài những mẫu giỏ quà tết chúng ta thường thấy thì còn một hình thức tặng quà tết
                                    đẹp mắt khác nữa đó là tự tay làm một hộp quà Tết sang trọng và đẹp mắt để thể hiện
                                    tấm lòng chân thành nhất.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="hd_chinh">
        <div class="header">
            Hoạt Động Chính
        </div>
        <div class="hd_chinh">
            <div class="hang_2">
                <div></div>
                <div class="pic" onclick="show(4);">
                    <img src="image/banner_1.png" alt="">
                    <div class="overlay"></div>
                    <div class="script">
                        <h3>Hoạt động 1</h3>
                        <hr>
                        <p>ĐÓN TẾT TRỌN VẸN - CÙNG LU, THẤU ĐỦ YÊU ĐẦY</p>
                    </div>
                </div>
                <div class="pic" onclick="show(9);">
                    <img src="image/banner_1.png" alt="">
                    <div class="overlay"></div>
                    <div class="script">
                        <h3>Hoạt động 2</h3>
                        <hr>
                        <p>GỢI Ý ĐÓN TẾT 2022 CÙNG LU ĐỂ TẾT THÊM TRỌN VẸN BÊN GIA ĐÌNH</p>
                    </div>
                </div>
                <div class="pic" onclick="show(10);">
                    <img src="image/banner_1.png" alt="">
                    <div class="overlay"></div>
                    <div class="script">
                        <h3>Hoạt động 3</h3>
                        <hr>
                        <p>TẾT TRỌN VẸN BÊN NHỮNG NGƯỜI THƯƠNG YÊU</p>
                    </div>
                </div>
                <div></div>
            </div>
            <div class="hang_3">
                <div></div>
                <div class="pic" onclick="show(8);">
                    <img src="image/poster.png" alt="">
                    <div class="overlay"></div>
                    <div class="script">
                        <h3>Hoạt động 4</h3>
                        <hr>
                        <p>CUỘC THI “CHIA SẺ KHOẢNH KHẮC CÙNG LU”</p>
                    </div>
                </div>
                <div class="pic" onclick="show(5);">
                    <img src="image/thiệp.JPG" alt="">
                    <div class="overlay"></div>
                    <div class="script">
                        <h3>Hoạt động 5</h3>
                        <hr>
                        <p>THỨC QUÀ ĐÍNH KÈM TINH TẾ ĐẾN TỪ LU</p>
                    </div>
                </div>
                <div class="pic"  onclick="show(6);">
                    <img src="image/POP.jpg" alt="">
                    <div class="overlay"></div>
                    <div class="script">
                        <h3>Hoạt động 6</h3>
                        <hr>
                        <p>CÓ HẸN CÙNG LU TẠI AEON MALL TÂN PHÚ</p>
                    </div>
                </div>
                <div class="pic" onclick="show(7);">
                    <img src="image/lì xì.jpg" alt="">
                    <div class="overlay"></div>
                    <div class="script">
                        <h3>Hoạt động 7</h3>
                        <hr>
                        <p>CHƠI CÙNG LU – RINH QUÀ CỰC ĐỈNH</p>
                    </div>
                </div>
                <div></div>
            </div>
        </div>
    </div>
    <div id="contact">
        <div class="contact">
            <div class="chi_nhanh">
                <div>
                    <div class="header">
                        ĐIỂM BÁN BÁNH LU 2022
                    </div>
                    <h4>CÔNG TY TNHH ĐẦU TƯ PHÁT TRIỂN SXTM HOÀNG GIA</h4>
                    <div>
                        <p>
                            <span>Showroom: 5 Bùi Tá Hán, An Phú, Quận 2, Hồ Chí Minh</span><br>
                            Địa chỉ thuế:4/3 Lương Đình Của, Phường Bình An, quận 2, Tphcm <br>
                            Mã số thuế: 0313396342 (12/08/2015) <br>
                            Hotline: 0901.69.8910- 09.0203.8910 <br>
                            Ngày hoạt động: 12/08/2015,GPKD: 0313396342 <br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="script">
                Tất cả các sản phẩm bánh trung thu kinh đô 2021 được Hoàng Gia nhập trực tiếp từ tổng công ty
                Kinh Đô Mondelez và bán theo chính sách giá của công ty với đầy đủ các thông tin về sản phẩm
                hình ảnh được chụp ảnh trực tiếp khi nhập về để bán lại cho quý khách hàng và đầy đủ hoát đơn VAT.
                Vì vậy mọi quyền lợi về hình ảnh được bảo lưu với lí do thương mại đại lý sỉ và Hoàng Gia tự chụp ảnh
                và sử dụng ảnh sản phẩm sau khi đã mua hàng về chụp trực tiếp.
            </div>
        </div>
        <div class="bottom"></div>
    </div>
    <div class="wrapper_hidden">
        <div class="div_1" onclick="hide(0);">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="div_2">
            <div onclick="hide(0);"></div>
            <div class="hidden" onclick="show(0);">
                <div class="head">BÍ MẬT ẨN SAU CHIẾC BÁNH QUY LU TRỨ DANH CỦA NƯỚC PHÁP</div>
                <p>Suốt chiều dài lịch sử 170 năm, có mặt trên hơn 100 quốc gia,
                    <b>bánh quy LU</b> vẫn giữ được danh tiếng nhờ hương vị tinh tế bất chấp thời gian.
                    Và ẩn sau mỗi chiếc bánh LU ấy là những câu chuyện thú vị về nền văn hóa Pháp – cái nôi của văn hóa châu Âu.
                </p>
                <p>
                    <b>Thông điệp thời gian</b>
                <p>Năm 1846, cặp nghệ nhân làm bánh trẻ tuổi người Pháp Jean-Romain Lefèvre
                    và Pauline-Isabelle Utile đã có cuộc gặp gỡ định mệnh để cùng tạo nên những chiếc bánh LU
                    đầu tiên với hương vị thơm ngon độc đáo. Từ đó, bánh quy LU nhanh chóng trở thành một phần của ẩm thực Pháp.</p>
                </p>
                <img src="image/Lu-1.PNG" alt="">
                <p>Trong suốt chặng đường phát triển, các nhà máy sản xuất bánh LU ngày càng được mở rộng.
                    Những thế hệ kinh doanh kế thừa đã cho ra đời nhiều dòng sản phẩm bánh LU với hương vị ngày càng chuẩn mực.
                    Năm 2007, KraftFoods – tiền thân của tập đoàn Mondelēz International đã mua lại Danone Group –
                    đơn vị kinh doanh bánh quy LU Pháp bấy giờ. </p>
                <p>Kể từ đó, bánh quy LU nhanh chóng trở thành thương hiệu bán chạy hàng đầu và có mặt trên 100 quốc gia. </p>
                <p>Trải qua 170 năm phát triển, cho đến nay, bánh quy LU vẫn là câu chuyện thành công nhất trong lịch sử ẩm thực Pháp,
                    là một trong những thương hiệu lâu đời nhất thế giới. </p>
                <p>
                    <b>Câu chuyện tình yêu</b>
                <p>Câu chuyện của bánh LU Pháp không chỉ là câu chuyện lịch sử mà còn là câu chuyện của tình yêu và đam mê.
                    Thực tế, LU là ghép từ hai chữ cái đầu của tên đôi vợ chồng Lefèvre và Utile.
                    Họ đã khắc tên này vào mỗi chiếc bánh mà mình làm ra như một dấu ấn tình yêu lãng mạn. </p>
                </p>
                <img src="image/LU/bí mật ẩn sau chiếc bánh quy Lu trứ danh của nước Pháp.jpg" alt="">
                <p>Có thể nói, tình yêu của đôi vợ chồng, tình yêu của hai nghệ nhân làm bánh Pháp đầy đam mê đã trở thành chất xúc tác giúp hương vị những chiếc bánh thêm thăng hoa. </p>
                <p>Tình yêu đã khiến Louis – người con út của họ kế thừa sự nghiệp gia đình và quyết định mở rộng nhà máy sản xuất bánh LU vào năm 1890 để đưa bánh LU đi xa. </p>
                <p>Tình yêu này đã trải qua gần hai thế kỷ, những nhà sản xuất tiếp nối đã không ngừng phát triển di sản bánh LU cho đến ngày hôm nay. </p>
                <b>Tinh tế trong hương vị và nghệ thuật thiết kế</b> <br>
                <p>Bánh LU Pháp luôn có hương vị tinh tế quyến rũ nhờ được tạo nên từ những thành phần hảo hạng, đúng chất Pháp. Đặc biệt, việc các nghệ nhân làm bánh ngày nay sáng tạo các loại nhân từ trái cây cho vào bánh đã góp phần nâng tầm <b>bánh LU</b>. </p>
                <p>Bên cạnh vị bơ đậm đà, thiết kế bánh mang triết lý sâu sắc: thời gian là để yêu và tận hưởng những khoảnh khắc tươi đẹp của cuộc sống. </p>
                <p>4 góc bánh vuông thành sắc cạnh tượng trưng cho 4 mùa, 52 đường khía trên mặt bánh là 52 tuần trong một năm và 24 chấm tròn thể hiện cho 24 giờ của một ngày. Tất cả đều là thời gian để yêu. </p>
                <p>Người Pháp vẫn thường thưởng thức bánh quy khi uống cafe, khi tụ tập nói chuyện phiếm. Bánh quy xuất hiện trong những buổi tiệc trà, trong cả giây phút riêng tư khi đôi nhân tình nằm dài trên ghế sofa, cùng nhau xem một bộ phim tình cảm. </p>
                <img src="image/Lu2.PNG" alt=""> <br>
                <p>Người Pháp là như thế, luôn nhấm nháp bánh quy và chẳng bao giờ quên thật chậm rãi khi yêu. </p>
                <p>Có thể nói, chứa đựng những giá trị ẩm thực, văn hóa, lịch sử độc đáo, không lạ khi bánh quy LU được tôn vinh như một di sản ẩm thực, biểu tượng của nước Pháp. </p>
                <a href="">Xem thêm</a> <br>
                <a href="">>> Cách chọn hộp quà bánh ngày Tết >></a> <br>
                <a href="">>> Cách làm hộp quà bánh ngày Tết đẹp mắt và sang trọng >></a>
                </p>
            </div>
            <div onclick="hide(0);"></div>
        </div>
        <div class="div_3" onclick="hide(0);">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="wrapper_hidden">
        <div class="div_1" onclick="hide(1);">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="div_2">
            <div onclick="hide(1);"></div>
            <div class="hidden" onclick="show(1);">
                <div class="head">TẾT LÀ GÌ TRONG SUY NGHĨ CỦA CÁNH MÀY RÂU?</div>
                <p>Mỗi độ Tết về, mạng xã hội lại dậy sóng những luồng ý kiến trái chiều về vai trò
                    và sự bận rộn của người phụ nữ trong ngày Tết.
                </p>
                <p>
                    Số đông thấu hiểu sự vất vả với người phụ nữ, số khác lên tiếng chê trách cánh đàn ông thiếu sự hỗ trợ và chia sẻ.
                </p>
                <p><b>Vậy những người đàn ông nghĩ gì khi Tết đến?</b></p>
                <img src="image/Tết là gì trong suy nghĩ của cánh mày râu.jpg" alt="">
                <p><b>Tết với người đàn ông cũng không hề đơn giản…</b></p>
                <p>
                    Anh Trần Anh Quân (Q. Hai Bà Trưng, Hà Nội) chia sẻ: “Nghĩ đến Tết là nghĩ đến rượu,
                    không phải chỉ 3 ngày Tết đâu, mấy ngày trước Tết đã uống rượu liên tục rồi.
                    Nhậu mệt lắm nhưng cả năm mới có vài ngày gặp mặt đông đủ đồng nghiệp rồi anh em, họ hàng,
                    chẳng lẽ lại không uống. Nhiều khi, nhìn vợ tất bật chuẩn bị cũng thấy thương,
                    cũng cố hạn chế rượu nhưng cũng chẳng giúp được gì nhiều”.
                </p>
                <p>Bạn Nguyễn Việt Hà (Quận 1, TP.HCM) thì cho rằng: “Tết đến vấn đề nặng nề nhất với người đàn ông
                    là tài chính vì là trụ cột của gia đình. Gần Tết, mình thường tăng ca,
                    tranh thủ kiếm thêm việc làm để có thêm thu nhập đưa vợ sắm sửa rồi mua quà cáp cho nội ngoại hai bên.
                    Với vợ mình, có lẽ điều cô ấy vất vả nhất là dọn dẹp, con cái rồi nấu nướng cỗ bàn...”
                </p>
                <p>Rõ ràng, khi Tết đến, sự mệt mỏi, phiền muộn cho không thiên vị riêng ai với đủ các vấn đề từ tài chính, quà cáp hay những lễ nghi,
                    cỗ bàn đã có từ bao đời nay. </p>
                <p>Thế nhưng, nói đi cũng phải nói lại, người đàn ông hay người phụ nữ ai cũng có công việc của riêng mình,
                    cuối năm ai mà chẳng bận rộn, thế nhưng chuyện sắm sửa, cỗ bàn,
                    con cái nội ngoại vô hình chung lại phần nhiều rơi vào tay phụ nữ. </p>
                <p>Và có lẽ, những điều ấy lại khiến người phụ nữ trở nên khó tính, cáu bẳn, chẳng còn thời gian tận hưởng niềm vui đón năm mới đang về.</p>
                <img src="image/Tết là gì trong suy nghĩ của cánh mày râu.jpg" alt="">
                <p>
                    <b>Để những người phụ nữ trong gia đình thảnh thơi hơn vào dịp Tết, đàn ông cần làm gì?</b>
                <p>Một năm mới bước tới là dịp để cả nhà cùng gắn kết bên nhau, cùng nhìn lại một năm đã qua và vun đắp những hi vọng về tương lai tươi đẹp.</p>
                </p>
                <p>Thay vì dành nhiều thời gian cho ăn uống, tụ tập bạn bè thì ngày nay,
                    có rất nhiều người đàn ông sẵn sàng sẻ chia với sự vất vả của những người vợ,
                    người mẹ để những người phụ nữ trong nhà buôn bỏ những áp lực, vất vả để được thảnh thơi tận hưởng một cái Tết đúng nghĩa.</p>
                <p>Thấu hiểu cỗ bàn ngày Tết là một trong những gánh nặng lớn nhất của người phụ nữ, họ xắn tay cùng vào bếp. </p>
                <p>Sau bữa cơm cúng gia tiên, họ khuyến khích mẹ, vợ chuẩn bị những bữa ăn đơn giản,
                    tiện lợi cho cả nhà để người phụ nữ có thêm thời gian tận hưởng niềm vui năm mới,
                    bởi người phụ nữ cứ tất bật nấu nướng nhưng cả nhà ăn chẳng mấy rồi lại đổ bỏ,
                    vừa lãng phí lại tốn rất nhiều thời gian.
                </p>
                <img src="image/Tết là gì trong suy nghĩ của cánh mày râu.jpg" alt="">
                <p>Trước những ưu phiền chuyện bếp núc của người phụ nữ và sự sẵn sàng sẻ chia của người đàn ông hiện đại,
                    Tết năm nay nhãn hàng <b>bánh LU</b> mang tới clip “Cùng LU thấu đủ yêu đầu” với lời nhắn nhủ và thông điệp ý nghĩa:
                    “Sự yêu thương và sẻ chia là yếu tố cốt yếu tạo nên Tết”.</p>
                <p> Hãy để bánh quy Lu đồng hành cùng triệu gia đình Việt Nam trong bầu không khí đầm ấm
                    cùng miếng bánh thơm ngon. Từ đó gắn kết với triệu câu chuyện tỉ tê về những thứ đã qua
                    và hàng vạn thứ tốt đẹp sẽ đến trong năm mới.</p>
                <a href="">Xem thêm</a> <br>
                <a href="">>> Cách chọn hộp quà bánh ngày Tết >></a> <br>
                <a href="">>> Cách làm hộp quà bánh ngày Tết đẹp mắt và sang trọng >></a>
                </p>
            </div>
            <div onclick="hide(1);"></div>
        </div>
        <div class="div_3" onclick="hide(1);">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="wrapper_hidden">
        <div class="div_1" onclick="hide(2);">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="div_2">
            <div onclick="hide(2);"></div>
            <div class="hidden" onclick="show(2);">
                <div class="head">CÁCH CHỌN HỘP QUÀ BÁNH NGÀY TẾT</div>
                <p>Các hộp bánh quy đẹp, ngon thích hợp tặng Tết luôn là chủ đề tìm kiếm mỗi khi Tết đến xuân về. Bởi lựa chọn quà biếu Tết tặng gia đình, bạn bè, đồng nghiệp, đối tác,...
                    vừa mang ý nghĩa gửi đi may mắn, bình an, vừa chứa đựng tình cảm người gửi.
                </p>
                <p>
                    <b>1. Nên chú trọng chất lượng hơn số lượng</b>
                <p>Ngày nay hầu như mọi người đều có cuộc sống sung túc nên ngày Tết cũng không cần sắm sửa quá nhiều quà bánh.
                    Vì vậy, tặng hộp quà Tết 2022 cũng không cần chú trọng vào số lượng mà quý ở chất lượng sản phẩm. </p>
                </p>
                <p>Vậy nên hãy chọn một <b>hộp bánh LU</b> mang vóc dáng tròn trĩnh cùng bao bì giỏ quà sang trọng để làm nên sự độc đáo của hộp quà Tết.</p>
                <img src="image/Xu hướng chọn hộp quà bánh ngày Tết.jpg" alt="">
                <p>
                    <b>2. Chú ý đến giá trị cốt lõi của món quà</b>
                <p>Đừng để hộp quà Tết 2022 tuyệt đẹp trở thành món quà thông lệ mà ai ai cũng sẽ đi
                    tặng hoặc được tặng vào dịp Tết cổ truyền. Mà hãy để món quà nói lên giá trị của nó,
                    gửi đi những thông điệp ý nghĩa và sâu sắc nhất cũng như lời chúc mừng năm mới đầy bình an
                    và như ý dành cho người bạn muốn tặng. </p>
                <p>
                    Đến lới bánh quy LU, trong mỗi hộp bánh sẽ được tặng kèm một tấm thiệp mà nhãn hàng <b> bánh quy LU </b>
                    trao đến khách hàng những lời tri ân sâu sắc và lời chúc một năm 2022 thật bình an,
                    hạnh phúc để giữ trọn từng khoảnh khắc bên gia đình.
                </p>
                <img src="image/thiệp.JPG" alt="">
                <p><b>3. Sự trọn vẹn đến từ hình thức món quà</b>
                <p>Đừng để giá trị của món quà Tết bị tụt dốc chỉ vì nó có một vỏ bọc kém chất lượng,
                    hãy gây ấn tượng với người nhận quà bằng chiếc hộp sang trọng, cao cấp và độc đáo bạn nhé!</p>
                </p>
                <img src="image/Lu veritable petit beurre 600g.jpg" alt="">
                <p>Chỉ còn vài tháng nữa là đến Xuân Nhâm Dần và bây giờ bạn có thể tham khảo ngay
                    những mẫu hộp quà Tết 2022 tại (URL) để bắt đầu lên kế hoạch tặng quà Tết vào dịp cuối năm thôi nào!
                </p>
                <a href="">Xem thêm</a> <br>
                <a href="">>> Tết là gì trong suy nghĩ của cánh mày râu >></a> <br>
                <a href="">>> Cách làm hộp quà bánh ngày Tết đẹp mắt và sang trọng >></a>
                </p>
            </div>
            <div onclick="hide(2);"></div>
        </div>
        <div class="div_3" onclick="hide(2);">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <style>
        ul li, ol li {
            list-style-position: inside;
            text-align: left;
        }

        li>ul {
            padding-left: 20px;
        }


    </style>
    <div class="wrapper_hidden">
        <div class="div_1" onclick="hide(3);">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="div_2">
            <div onclick="hide(3);"></div>
            <div class="hidden" onclick="show(3);">
                <div class="head">CÁCH LÀM HỘP QUÀ BÁNH NGÀY TẾT ĐẸP MẮT VÀ SANG TRỌNG</div>
                <p>
                    Ngoài những mẫu giỏ quà tết chúng ta thường thấy thì còn một hình thức tặng quà
                    tết đẹp mắt khác nữa đó là tự tay làm một hộp quà Tết sang trọng và đẹp mắt để thể hiện tấm lòng chân thành nhất.
                </p>
                <p>Và để hỗ trợ các bạn nếu đang có ý tưởng này, LU sẽ hướng dẫn các bạn <b>cách làm hộp quà tết.</b></p>
                <img src="image/hộp bánh.jpg" alt="">
                <p>
                    <b>Làm hộp quà tết có khó và mất thời gian không?</b>
                <p>Hộp quà tết thường đa phần có dạng hình vuông và hình chữ nhật có lắp đậy phía trên,
                    như vậy bạn cũng có thể tưởng tượng ra hộp quà tết cũng gần giống như các hộp quà có dạng hình chữ nhật,
                    hình vuông thông thường. </p>
                </p>
                <p>
                    <b> Cách làm hộp quà tết </b> cũng y hệt như một hộp quà thông thường khác,
                    vô cùng dễ làm và sẽ không làm mất nhiều thời gian của các bạn,
                    chỉ cần khéo tay một chút là bạn đã có một hộp quà tết vừa đẹp, vừa sang trọng và đặc biệt là mang nét riêng độc đáo rồi.
                </p>
                <p>
                    <b>Cách làm hộp quà tết đẹp mắt dành tặng người thân</b>
                <p><b><i>1. Nguyên liệu cần chuẩn bị</i></b></p>
                <p>Để có <b>cách gói hộp quà tết</b> nhanh chóng bạn cần cần chuẩn bị một số nguyên liệu sau:</p>
                <ul>
                    <li>Giấy bìa cứng ( màu sắc đơn giản hay nhiều họa tiết do cách lựa chọn riêng của bạn)</li>
                    <li>Ruy băng, băng dính 2 mặt</li>
                    <li>Các dụng cụ kéo, thước, bút, dao lam</li>
                </ul>
                <p><b><i>2. Tiến hành các thao tác làm hộp quà tết</i></b></p>
                <ul>
                    <li> Bước 1: Tạo các đường kẻ định hình cho hộp quà.
                        <ul>
                            <li>Cách làm hộp quà tết trong bước này bạn dùng thước và bút chì (gáy dao lam) tạo ra
                                một hình chữ nhật hoặc hình vuông, xét theo việc xác định xem <b> hộp quà tết gồm những gì. </b> </li>
                            <li>Tiếp theo bạn lại kẻ tiếp một đường thẳng song song với đường mà bạn vừa kẻ. </li>
                            <li>Khoảng cách giữa đường kẻ trước và đường kẻ này chính là độ dày của hộp quà,
                                sau đó lại tiếp tục kẻ thêm một đường thẳng song song lần thứ ba nữa.</li>
                        </ul>
                    </li>
                    <img src="image/vẽ hộp quà.jpg" alt="">
                    <li>Bước 2: Cắt đường kẻ theo đường kéo dài của cạnh hình đầu tiên mà bạn đã kẻ, và nên nhớ chỉ cắt trên 2 cạnh bìa đối diện.
                        <ul>
                            <li>Sau đó bạn gập phần bìa nằm ở giữa 2 vết cắt lên.</li>
                        </ul>
                    </li>
                    <li>Bước 3: <b>Cách làm hộp quà tết</b> trong bước này sẽ tiến hành làm đáy hộp quà tết.
                        <ul>
                            <li>Ta dán băng dính hai mặt dọc theo 2 cạnh bìa vuông góc với 2 cạnh vừa cắt ở bên trên,
                                sau đó dán gập thành của hộp vào phần băng dính. </li>
                            <li>Tiếp tục gập hai đầu của thành hộp theo đường đã kẻ, dựng thành hộp để sao cho vuông góc với đáy hộp,
                                dán tiếp tục các cạnh còn lại để tạo thành đáy hộp.</li>
                        </ul>
                    </li>
                    <li>Bước 4: Hoàn chỉnh đáy hộp và làm nắp cho hộp quà.
                        <ul>
                            <li>Trong bước này, bạn sử dụng thêm một tấm bìa nữa để tạo một tấm lót dưới đáy hộp</li>
                            <li>Với lắp hộp quà tết bạn làm tương tự như bước trên, nhưng bạn nên tạo lắp hộp rộng hơn 1mm để đóng mở hộp dễ dàng.</li>
                        </ul>
                    </li>
                    <li>Bước 5: Trang trí, tạo hình hoàn chỉnh cho chiếc hộp quà tết.</li>
                    <img src="image/hộp quà bánh.jpg" alt="">
                </ul>
                </p>
                <p>Bạn hãy sử dụng ruy băng trang trí trên thành hộp hoặc trên lắp hộp tùy ý,
                    ngoài ra bạn có thể sáng tạo thêm để hộp quà tết của mình trông lung linh, đẹp mắt hơn. </p>
                <p>
                    Trên đây là những dòng chia sẻ về cách làm hộp quà bánh ngày Tết,
                    nhãn hàng bánh LU hy vọng bạn sẽ thực hiện thành công và có đón một năm 2022 thật tràn đầy ý nghĩa và hạnh phúc.
                </p>
                <a href="">Xem thêm</a> <br>
                <a href="">>> Tết là gì trong suy nghĩ của cánh mày râu >></a> <br>
                <a href="">>> Cách chọn hộp quà bánh ngày Tết >></a>
            </div>
            <div onclick="hide(3);"></div>
        </div>
        <div class="div_3" onclick="hide(3);">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="wrapper_hidden">
        <div class="div_1" onclick="hide(4);">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="div_2">
            <div onclick="hide(4);"></div>
            <div class="hidden" onclick="show(4);">
                <div class="head">ĐÓN TẾT TRỌN VẸN - CÙNG LU, THẤU ĐỦ YÊU ĐẦY</div>
                <p>
                    Tặng quà Tết, một nét đẹp truyền thống từ xa xưa của người Việt Nam.
                    Thức quà tinh tế sẽ thay bạn gửi lời tri ân đến người thương quý.
                </p>
                <img src="image/banner_1.png" alt="">
                <p>
                    Với năm 2021 vừa qua, một năm đáng nhớ đối với mỗi người trong chúng ta,
                    một năm với quá nhiều biến động và dịp Tết sắp tới đây sẽ càng ý nghĩa hơn bao giờ hết
                    để mọi người bày tỏ lòng tri ân đến người mình thương quý.
                </p>
                <p>
                    Đây cũng là dịp để chúng ta càng trân quý hơn những khoảnh khắc,
                    những tình cảm quan tâm, sẻ chia đối với những người thân, người bạn và đối tác quanh mình.
                </p>
                <p>
                    Vậy Tết này, bạn đã tìm được món quà tri ân mang đầy ý nghĩa chưa?
                </p>
                <p>Hãy để <b>LU</b> cùng bạn gửi trọn tấm lòng đến người thương quý nhé!</p>
                <p style="color: red;">
                    Hotline: 028 121 2021
                </p>
                <p>#Tet #CungLuThauDuYeuDay</p>
                <a href="">Xem thêm</a> <br>
                <a href="">>> Thức quà đính kèm tinh tế đến từ Lu >></a> <br>
                <a href="">>> Có hẹn cùng Lu tại Aeon Mall Tân Phú >></a>
            </div>
            <div onclick="hide(4);"></div>
        </div>
        <div class="div_3" onclick="hide(4);">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="wrapper_hidden">
        <div class="div_1" onclick="hide(5);">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="div_2">
            <div onclick="hide(5);"></div>
            <div class="hidden" onclick="show(5);">
                <div class="head">THỨC QUÀ ĐÍNH KÈM TINH TẾ ĐẾN TỪ LU</div>
                <p>
                    Tặng quà Tết, một nét đẹp truyền thống từ xa xưa của người Việt Nam.
                    <b>Thức quà tinh tế đến từ LU</b> sẽ thay bạn gửi lời tri ân đến người thương quý.
                </p>
                <img src="image/thiệp.JPG" alt="">
                <p>
                    Với năm 2021 vừa qua, một năm đáng nhớ đối với mỗi người trong chúng ta,
                    một năm với quá nhiều biến động và dịp Tết sắp tới đây sẽ càng ý nghĩa hơn bao giờ hết
                    để mọi người bày tỏ lòng tri ân đến người mình thương quý.
                </p>
                <p>
                    Đây cũng là dịp để chúng ta càng trân quý hơn những khoảnh khắc,
                    những tình cảm quan tâm, sẻ chia đối với những người thân, người bạn và đối tác quanh mình.
                </p>
                <p>
                    Vậy Tết này, bạn đã tìm được món quà tri ân mang đầy ý nghĩa chưa? Hãy để <b> LU cùng bạn gửi trọn tấm lòng </b> đến người thương quý nhé!
                </p>
                <p>#Tet #CungLuThauDuYeuDay</p>
                <a href="">Xem thêm</a> <br>
                <a href="">>> Có hẹn cùng Lu tại Aeon Mall Tân Phú >></a> <br>
                <a href="">>> Chơi cùng Lu – Rinh quà cực đỉnh >></a>
            </div>
            <div onclick="hide(5);"></div>
        </div>
        <div class="div_3" onclick="hide(5);">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="wrapper_hidden">
        <div class="div_1" onclick="hide(6);">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="div_2">
            <div onclick="hide(6);"></div>
            <div class="hidden" onclick="show(6);">
                <div class="head">CÓ HẸN CÙNG LU TẠI AEON MALL TÂN PHÚ</div>
                <p>
                    Vào 01/01/2022 – 15/02/2022 này, tại AEON MALL TÂN PHÚ sẽ có một lễ hội náo nhiệt do LU tổ chức.
                </p>
                <p>Tại đây, bạn sẽ được thưởng thức những chiếc bánh quy thơm ngon và trải nghiệm không khí sang trọng,
                    đẳng cấp đến từ nhãn hiệu bánh quy bán chạy số 1 nước Pháp.</p>
                <img src="image/POP.jpg" alt="">
                <p>
                    Và nếu bạn vẫn còn băn khoăn về việc chuẩn bị quà tết cho gia đình thân yêu thì khi đến đây bạn cũng sẽ có được sự lựa chọn tuyệt vời đấy!
                </p>
                <p>
                    Đừng quên 01/01/2022 – 15/02/2022 <b>có hẹn cùng LU tại AEON MALL TÂN PHÚ bạn nhé! </b>
                </p>
                <p>
                    Bật mí cho bạn, LU cũng sẽ có những trò chơi thú vị cùng những món quà hấp dẫn trong khoảng thời gian đó, theo dõi LU để không bỏ lỡ nhé!
                </p>
                <p>Để biết thêm chi tiết vui lòng liên hệ:</p>
                <p style="color: red;">
                    Hotline: 028 121 2021
                </p>
                <p>#Tet #CungLuThauDuYeuDay</p>
                <a href="">Xem thêm</a> <br>
                <a href="">>> Có hẹn cùng Lu tại Aeon Mall Tân Phú >></a> <br>
                <a href="">>> Cuộc thi “Chia sẻ khoảnh khắc cùng Lu” >></a>
            </div>
            <div onclick="hide(6);"></div>
        </div>
        <div class="div_3" onclick="hide(6);">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="wrapper_hidden">
        <div class="div_1" onclick="hide(7);">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="div_2">
            <div onclick="hide(7);"></div>
            <div class="hidden" onclick="show(7);">
                <div class="head">CHƠI CÙNG LU – RINH QUÀ CỰC ĐỈNH</div>
                <p>
                    Nhắc tới tết là nhắc đến ăn chơi vậy nên LU đã chuẩn bị sẵn sàng để bạn đến “ăn chơi” rồi.
                </p>
                <p>Đến ngay AEON MALL TÂN PHÚ, ngày 26 – 28/01/2022 để mang về những hộp bánh LU
                    làm món quà thay lời tri ân đến người thân quý và có cơ hội thử độ may với “Vòng quay may mắn”
                    khi tham gia <b>“Chơi cùng LU – Rinh quà cực đỉnh”.</b>
                </p>
                <p>
                    Còn chần chờ gì nữa mà không lên lịch để đến <b>“Chơi cùng LU”</b> vào ngày 26 – 28/01/2022!
                </p>
                <img src="image/lì xì.jpg" alt="">
                <p>
                    <b>1. Thể lệ chương trình</b>
                <ul>
                    <li>Các khách hàng mua sản phẩm của LU trong suốt thời gian diễn ra chương trình sẽ được tham gia vào trò chơi <b>“CHƠI CÙNG LU - RINH QUÀ CỰC ĐỈNH”.</b></li>
                    <li>Khách hàng thực hiện quay vòng quay may mắn và nhận phần quà tương ứng với ô mà mình đã quay.</li>
                    <li>Mỗi khách hàng được chơi 1 lần với mỗi hóa đơn thanh toán có sản phẩm LU trong ngày.</li>
                    <li>Số lượng quà tặng có giới hạn.</li>
                </ul>
                </p>
                <p>
                    <b>2. Phần thưởng bạn có thể nhận</b>
                <ul>
                    <li>1 tour du lịch Phú Quốc dành cho 2 người trị giá 15.000.000đ</li>
                    <li>2 Máy ảnh Instax trị giá 2.000.000đ</li>
                    <li>150 Voucher trị giá 50.000đ khi mua sản phẩm của LU trong lần mua tiếp theo với hóa đơn trên 200.000đ</li>
                    <li>200 Voucher trị giá 20.000đ khi mua sản phẩm của LU trong lần mua tiếp theo với hóa đơn trên 150.000đ</li>
                    <li>500 phần quà Bao lì xì Tết 2022 của LU tương ứng với 2500 cái (5 cái/ phần) với thông điệp <b>“Cùng LU thấu đủ yêu đầy”</b></li>
                </ul>
                </p>
                <p>Để biết thêm chi tiết vui lòng liên hệ:</p>
                <p style="color: red;">
                    Hotline: 028 121 2021
                </p>
                <p>#Tet #CungLuThauDuYeuDay</p>
                <a href="">Xem thêm</a> <br>
                <a href="">>> Cuộc thi “Chia sẻ khoảnh khắc cùng Lu” >></a> <br>
                <a href="">>> Gợi ý đón tết 2022 cùng Lu để Tết thêm trọn vẹn bên gia đình >> </a>
            </div>
            <div onclick="hide(7);"></div>
        </div>
        <div class="div_3" onclick="hide(7);">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="wrapper_hidden">
        <div class="div_1" onclick="hide(8);">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="div_2">
            <div onclick="hide(8);"></div>
            <div class="hidden" onclick="show(8);">
                <div class="head">CUỘC THI “CHIA SẺ KHOẢNH KHẮC CÙNG LU”</div>
                <p>
                    DỊP TẾT NÀY, HÃY CÙNG LU CHIA SẺ KHOẢNH KHẮC BÊN NHỮNG NGƯỜI THƯƠNG QUÝ CỦA BẠN. 
                </p>
                <p>
                    <ul>
                        <li>Bên nhau nhiều hơn, thấu hiểu nhiều hơn, yêu thương nhiều hơn trong năm vừa qua. Gia đình bạn đã cùng nhau lưu giữ lại những khoảnh khắc ấm áp đó chưa? </li>
                        <li>Dịp tết này chính là thời điểm để bạn cùng LU thực hiện điều đó. </li>
                        <li>Hãy thưởng thức những chiếc bánh quy LU ngọt ngào, thơm ngon và tận hưởng sự hạnh phúc trong đôi mắt mỗi người thương quý. <b>Lưu giữ khoảnh khắc ấy và chia sẻ cùng Lu </b> bạn nhé! </li>
                    </ul>
                </p>
                <img src="image/poster.png" alt="">
                <p>
                    <b>THỂ LỆ CUỘC THI : “CHIA SẺ KHOẢNH KHẮC CÙNG LU”</b>
                    <ol>
                        <li>Thời gian tổ chức:</li>
                        <li>Đối tượng tham gia:
                            <ul>
                                <li>Đối tượng: sinh sống trong lãnh thổ Việt Nam.</li>
                                <li>Tài khoản Facebook được xác minh rõ ràng để Ban Tổ Chức (BTC) có thể liên lạc và kiểm tra thông tin liên quan cần thiết đến cuộc thi.</li>
                            </ul>
                        </li>
                        <li>Chi tiết cuộc thi:
                            <ul>
                                <li>Nội dung cuộc thi
                                    <p>
                                        <b>"Chia sẻ khoảnh khắc cùng LU"</b> là cuộc thi ảnh được tổ chức trên Fanpage LU Vietnam 
                                        với mục đích tạo cơ hội để khách hàng cùng gia đình chia sẻ, lưu giữ những khoảnh khắc ý nghĩa 
                                        khi ở cạnh nhau, thêm vào đó có cơ hội thắng phần thưởng đặc biệt từ chương trình.
                                    </p>
                                </li>
                                <li>Cách thức tham gia
                                    <ul>
                                        <li>Bước 1: Đăng ảnh tri ân khoảnh khắc đẹp nhất cùng người thân yêu ở chế độ công khai  và tag người mình muốn tri ân, kèm hashtag #ChiasekhoanhkhaccungLU</li>
                                        <li>Bước 2: Chụp màn hình bài viết, bình luận vào bài thông báo này của LU và tag 3 người bạn để mời tham gia.</li>
                                    </ul>
                                </li>
                                <li>Cơ cấu giải thưởng bao gồm
                                    <p>LU sẽ chọn ra 50 bài dự thi với lời chúc ý nghĩa nhất để gửi đến 50 phần quà hấp dẫn.</p>
                                </li>
                            </ul>
                        </li>
                    </ol>
                </p>
                <p>
                    Mọi thắc mắc về chương trình  vui lòng gửi đến email: lukinhdovietnam@gmail.com
                </p>
                <p
                    >Để biết thêm chi tiết vui lòng liên hệ:
                </p>
                <p style="color: red;">
                    Hotline: 028 121 2021
                </p>
                <p>#Tet #CungLuThauDuYeuDay</p>
                <a href="">Xem thêm</a> <br>
                <a href="">>> Gợi ý đón tết 2022 cùng Lu để Tết thêm trọn vẹn bên gia đình>> </a> <br>
                <a href="">>> Tết trọn vẹn bên những người thương yêu>>  </a>
            </div>
            <div onclick="hide(8);"></div>
        </div>
        <div class="div_3" onclick="hide(8);">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="wrapper_hidden">
        <div class="div_1" onclick="hide(9);">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="div_2">
            <div onclick="hide(9);"></div>
            <div class="hidden" onclick="show(9);">
                <div class="head">GỢI Ý ĐÓN TẾT 2022 CÙNG LU ĐỂ TẾT THÊM TRỌN VẸN BÊN GIA ĐÌNH</div>
                <p>
                    ĐIỂM QUA VÀI GỢI Ý ĐÓN TẾT 2022 CÙNG LU ĐỂ TẾT THÊM TRỌN VẸN BÊN GIA ĐÌNH 
                    <ul>
                        <li>Không khí tết không chỉ là những cành hoa mai đào rực rỡ hay những phong bao lì xì may mắn… </li>
                        <li>Không khí tết trọn vẹn luôn được đóng góp bởi linh hồn của ẩm thực, từ những tinh túy trong những đòn bánh tét của bà đến hương vị béo bùi thịt kho của mẹ và cũng là những chiếc bánh quy ngọt ngào, giòn tan. </li>
                        <li>Luôn muốn bạn có những ngày tết trọn vẹn nhất bên gia đình, <b>LU xin gợi ý cho bạn một vài combo bánh</b> đa dạng, hấp dẫn, thuận tiện cho việc chọn lựa của bạn.</li>
                    </ul>
                </p>
            </div>
            <div onclick="hide(9);"></div>
        </div>
        <div class="div_3" onclick="hide(9);">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="wrapper_hidden">
        <div class="div_1" onclick="hide(10);">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="div_2">
            <div onclick="hide(10);"></div>
            <div class="hidden" onclick="show(10);">
                <div class="head">TẾT TRỌN VẸN BÊN NHỮNG NGƯỜI THƯƠNG YÊU</div>
                <p>
                    TẾT TRỌN VẸN BÊN NHỮNG NGƯỜI THƯƠNG YÊU – CÙNG LU, THẤU ĐỦ YÊU ĐẦY.
                    <ul>
                        <li>Mỗi dịp tết về là gian bếp lại thơm nức hương vị những món ngon, hoa quả tô sắc cho gian nhà thêm rực rỡ,... Tất cả đều được chuẩn bị chu đáo dưới tay người phụ nữ. </li>
                        <li>Một năm với những thăng trầm đã qua, người phụ nữ của chúng ta cũng cần được thấu hiểu và chia sẻ nhiều hơn những bộn bề cuộc sống.</li>
                        <li>Cả gia đình hãy cùng thư giãn và tận hưởng hương vị ngày tết vẹn trọn. Bánh quy LU sẽ giúp bạn thực hiện điều đó!</li>
                    </ul>
                </p>
                <p>Để biết thêm chi tiết vui lòng liên hệ:</p>
                <p style="color: red;">
                    Hotline: 028 121 2021
                </p>
                <p>#Tet #CungLuThauDuYeuDay</p>
                <a href="">Xem thêm</a> <br>
                <a href="">>> Đón Tết trọn vẹn – Cùng Lu, thấu đủ yêu đầy >></a> <br>
                <a href="">>> Thức quà đính kèm tinh tế đến từ Lu >></a>
            </div>
            <div onclick="hide(10);"></div>
        </div>
        <div class="div_3" onclick="hide(10);">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <script>
        /*Code an hien bang jquery*/

        /* var hidden = $('.hidden');    
        var obj1 = $('.obj1');

        obj1.click(function () {
            document.getElementById('hidden').style.display = 'unset';
            return false;
        });

        $(document).click(function () {
            document.getElementById('hidden').style.display = 'none';
        });

        hidden.click(function(e) {
            e.stopPropagation();
        }); */
        var hidden = document.getElementsByClassName('wrapper_hidden');

        function show(x) {
            hidden[x].style.left = '0';
        }

        function hide(x) {
            hidden[x].style.left = '-100%';
        }
    </script>
</body>

</html>