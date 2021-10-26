<?php
require_once('db/dbhelper.php');
require_once('utils/utilities.php');
$count = 0;
$total = 0;

$cart = [];
if (isset($_COOKIE['cart'])) {
	$json = $_COOKIE['cart'];
	$cart = json_decode($json, true);
}
$idList = [];
foreach ($cart as $item) {
	$idList[] = $item['id'];
}
if (count($idList) > 0) {
	$idList = implode(',', $idList);
	//[2, 5, 6] => 2,5,6

	$sql = "select * from products where id in ($idList)";
	$cartList = executeResult($sql);
} else {
	$cartList = [];
}
?>
<script type="text/javascript">
	function deleteCart(id) {
		$.post('cookie.php', {
			'action': 'delete',
			'id': id
		}, function(data) {
			location.reload()
		})
	}
</script>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="all,follow">

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
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-
    DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-
    Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-latest.pack.js"></script>
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

		.header .div_3 {
			padding-right: 15px;
			padding-left: 10px;
		}

		.header .div_3 nav {
			float: right;
		}

		.header .div_3 nav img {
			width: 35px;
			height: 35px;
		}

		.header .div_3 nav>div {
			border-radius: 5px;
			padding: 0 7px;
			float: left;
		}

		.header .div_3 nav div:hover img {
			width: 40px;
			height: 40px;
		}

		.header .div_3 nav>div:hover {
			padding-left: 2px;
		}

		.header .div_3 nav a {
			color: white;
		}

		.content {
			background-color: #eee;
			width: 100%;
			padding-bottom: calc(100vh - 150px);
		}

		.content>* {
			box-sizing: border-box;
		}

		.content>.wrapper {
			background-color: white;
		}

		.content>.wrapper:first-child {
			height: 40px;
			line-height: 40px;
			background-color: red;
			color: white;
		}

		.heading>div {
			background-image: linear-gradient(to right, red 95%, white);
		}

		.wrapper {
			width: 76%;
			margin: auto;
			display: grid;
			grid-template-columns: 7% 23% 23% 13% 11% 13% 10%;
			border-bottom: 3px solid #eee;
		}

		.wrapper>div {
			height: 180px;
			line-height: 180px;
			text-align: center;
		}

		.wrapper .img {
			line-height: normal;
		}

		.content .wrapper:first-child>div {
			height: 40px;
			line-height: 40px;
		}

		.img {
			width: 100%;
		}

		.img img {
			width: 70%;
			margin: auto;
			height: 180px;
		}

		.script {
			width: 100%;
			text-align: center;
			display: none;
		}

		.thanhTien {
			display: none;
		}

		.delete {
			position: relative;
		}

		.delete>div {
			position: absolute;
			width: 100%;
			height: fit-content;
			top: 0;
			bottom: 0;
			right: 0;
			left: 0;
			margin: auto;
		}

		span {
			color: red;
		}

		button {
			width: 100%;
			font-size: 19px;
			height: 40px;
			margin-top: 5px;
			font-weight: bold;
			background-color: #FFD700;
			color: red;
		}

		.btn {
			background-color: #444444;
			color: white;
		}

		.btn:hover {
			background-color: red;
			color: #FFD700;
		}

		.footer {
			position: fixed;
			bottom: 0;
			left: 12%;
			display: grid;
			grid-template-columns: 32% 68%;
			width: 76%;
			height: 60px;
			line-height: 60px;
			background-color: red;
			color: white
		}

		.footer .left {
			width: 100%;
			text-align: left;
			padding-left: 10px;
			font-size: 20px;
		}

		.footer .right {
			text-align: right;
			width: 100%;
			padding-right: 10px;
		}

		.footer button {
			width: 100px;
			margin-left: 10px;
			font-size: 16px;
			height: 40px;
			line-height: 40px;
			margin-top: 10px;
			border-radius: 10px;
		}

		@media only screen and (max-width: 1080px) {
			.wrapper {
				width: 98%;
				grid-template-columns: 5% 23% 29% 12% 10% 12% 9%;
			}

			.footer {
				width: 98%;
				left: 1%;
				grid-template-columns: 30% 70%;
			}

			.img img {
				height: 150px;
			}
		}

		@media only screen and (max-width: 767.5px) {
			.wrapper {
				width: 100%;
				grid-template-columns: 39% 17.5% 10% 19.5% 14%;
			}

			.footer {
				width: 100%;
				left: 0;
			}

			.wrapper>div {
				height: 165px;
				line-height: 165px;
			}

			.wrapper .img {
				height: fit-content;
			}

			.wrapper .img img {
				height: 130px;
			}

			.num {
				display: none;
			}

			.script {
				display: unset;
			}

			.img img {
				height: 180px;
			}

			.title {
				display: none;
			}

			.header .div_3 {
				padding: 0;
			}

			.header .div_2 input {
				width: calc(100% - 50px);
			}

			.header .div_3 nav img {
				width: 25px;
				height: 25px;
			}

			.header .div_3 nav div:hover img {
				width: 30px;
				height: 30px;
			}

			.header .div_3 {
				height: 25px;
				margin-top: 42.5px;
			}
		}


		@media only screen and (max-width: 575.5px) {
			.wrapper {
				width: 100%;
				grid-template-columns: 40% 45% 15%;
			}

			.footer {
				left: 0;
			}

			.thanhTien {
				width: 100%;
				position: relative;
				display: unset;
				height: fit-content;
			}

			.thanhTien .price_sp {
				position: absolute;
				width: 100%;
				height: fit-content;
				margin: auto;
				top: 0;
				bottom: 0;
				right: 0;
				left: 0;
			}

			table {
				width: fit-content;
				margin: auto;
			}

			.price_sp tr {
				height: 30px;
				line-height: 30px;
			}

			.price_sp tr:last-child {
				border-top: thin solid black;
			}

			.price_sp tr td:first-child {
				width: 90px;
				text-align: left;
				padding-left: 5px;
			}

			.price_sp tr td:last-child {
				width: 95px;
				text-align: right;
				padding-right: 5px;
			}

			.gia,
			.sl,
			.tongTien {
				display: none;
			}

			.header .div_2 {
				display: none;
			}

			.header .div_3 nav img {
				width: 35px;
				height: 35px;
			}

			.header .div_3 nav div:hover img {
				width: 40px;
				height: 40px;
			}

			.header .div_3 {
				height: 35px;
				margin-top: 37.5px;
			}

			.header .div_1 img {
				width: 90px;
				height: 90px;
				margin-top: 10px;
				object-fit: cover;
			}
		}
	</style>
</head>
<!-- body -->
<div class="header">
	<div class="container">
		<div class="row">
			<div class="col-xl-2 col-md-2 col-sm-3 col-5 div_1">
				<a href="welcome.php"><img src="image/LU/Logo Bánh Lu.png" alt=""></a>
			</div>
			<div class="col-xl-7 col-md-6 col-sm-5 div_2">
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
			<div class="col-xl-3 col-md-4 col-sm-4 col-7 div_3">
				<nav>
					<div><a href="cart.php"><img src="image/icons8-facebook-48.png" alt=""></a></div>
					<div><a href="cart.php"><img src="image/icons8-youtube-48.png" alt=""></a></div>
					<div><a href="cart.php"><img src="image/icons8-zalo-100.png" alt=""></a></div>
					<div><a href="cart.php"><img src="image/icons8-twitter-48.png" alt=""></a></div>
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="content">
	<div class="wrapper heading">
		<div class="num">No</div>
		<div class="img">Sản phẩm</div>
		<div class="title">Mô tả</div>
		<div class="gia">Đơn giá</div>
		<div class="sl">SL</div>
		<div class="tongTien">Tổng tiền</div>
		<div class="thanhTien">Thành tiền</div>
		<div class="delete">Xóa</div>
	</div>
	<?php
	if (count($cartList) != 0) {
		foreach ($cartList as $item) {
			$num = 0;
			foreach ($cart as $value) {
				if ($value['id'] == $item['id']) {
					$num += $value['num'];
					break;
				}
			}
			$total += $num * $item['price'];
			echo 	'<div class="wrapper">
						<div class="num">' . ++$count . '</div>
						<div class="img">
							<div><img src="' . $item['thumbnail'] . '"/></div>
							<div class="script">' . $item['title'] . '</div>
						</div>
						<div class="title">' . $item['title'] . '</div>
						<div class="gia"><span>' . number_format($item['price'], 0, ',', '.') . ' đ</span></div>
						<div class="sl">' . $num . '</div>
						<div class="tongTien"><span>' . number_format($num * $item['price'], 0, ',', '.') . ' đ</span></div>
						<div class="thanhTien">
							<div class="price_sp">
								<table>
									<tr>
										<td>Đơn giá</td>
										<td><span>' . number_format($item['price'], 0, ',', '.') . ' đ</span></td>
									</tr>
									<tr>
										<td>Số lượng</td>
										<td>' . $num . '</td>
									</tr>
									<tr>
										<td>Thành tiền</td>
										<td><span>' . number_format($num * $item['price'], 0, ',', '.') . ' đ</span></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="delete">
							<div><button class="btn">Xóa</button></div>
						</div>
					</div>';
		}
	}
	?>
	<div class="footer">
		<div class="left">Tổng tiền</div>
		<div class="right">
			<span style="color: white;"><i><?= number_format($total, 0, ',', '.') ?> đ</i></span>
			<button>Thanh toán</button>
		</div>
	</div>
</div>