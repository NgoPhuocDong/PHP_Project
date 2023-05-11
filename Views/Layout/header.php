<?php
include("Controllers/KiemTraQuyen.php");
	$regex = check();
	
	if(!$regex){
		echo "<script> alert('Quyền này không được cấp đối với tài khoản của bạn'); </script>"; 
		exit;
	}		
?>

<?php
	include("Views/Home/TrangChu.php");
?>
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <title>Admin</title> -->
	<link rel="stylesheet" type="text/css" href="../Assets/fonts/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../Assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Assets/CSS/style.css">
	<script src="../Assets/scripts/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/3206410232.js" crossorigin="anonymous"></script>

	<!-- Dùng cho file index -->
	<link rel="stylesheet" type="text/css" href="Assets/fonts/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.min.css">
	<script src="Assets/scripts/bootstrap.bundle.min.js"></script>
</head>
<style>

	.navbar-nav {
		width: 16.667%;
	}

	.container-fluid{
		width: 100%;
	}

	a.btn.btn-dark.dropdown-toggle {
		width: 253px;
		position: relative;
		margin-top: 15px;
	}

	a.btn.btn-dark.dropdown-toggle:hover{
		box-shadow: 1px 1px 6px 0.1px white;
		background: none;
		transition: all .1s linear;
	}
.logout:hover {
    background-color: rgb(186, 182, 182);
	transition: background-color .3s ease-in-out;
	border-radius: 5px;
}
.container-fluid {
	width: 100%;
}
.col-md-2 .border-bottom{
    margin-left: 10px;
    height: auto;
    padding: 20px 0;
}

.collapse > a > li:hover{
	color: #fff;
}


.nav-stacked {
	padding-bottom: 100px;
}

.hihi {
	text-align: left;
	width: 100%;
}

.fa-caret-down:before {
	position: absolute;
	right: 13px;
	/* margin-top: -15px; */
}

.dropdown-toggle:after{
	/* display: none; */
	right: 0;
	
}

.dropdown-toggle:before{
	display: inline-block;
}

.fa-caret-down {
	position: absolute;
	right: 0;
	/* display: inline-block; */
	margin-top: 28px;
}

.ppp {
	display: inline-block;
    background: blue;
    margin-left: 70px;
    padding: 0 10px;
    border-radius: 5px;
	font-size: 15px;
	font-weight: bold;
	position: relative;
}



.aaa {
	display: inline-block;
	width: 20px;
}

.bbb {
	display: inline-block;
	width: 180px;
	text-align: left;
	margin-left: 5px;
}

.collapse > a > li:hover {
    color: #fff;
	/* transition: all .10s linear; */
}
</style>

<body class="bg-light col-md-12">
	<nav class="navbar navbar-expand-sm bg-white col-md-12 fixed-top">
		<div class="container-fluid">
			<h4><a class="nav-link" href="#">Logo</a></h4>
			<ul class="navbar-nav">
				<li style="margin-left: 90px;" class="nav-item">
					<a class="nav-link" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../TinTuc/DanhSach">News</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Contact</a>
				</li>
			</ul>

			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="#" style="margin-left: 68px;">
					<i class="fa fa-cog" aria-hidden="true"></i>
					Settings</a>
				</li>
				<li class="nav-item logout" style="float: right; left: 20px;">
					<a href="../Home/Logout" class="nav-link active">
					<i class="fa fa-sign-in" aria-hidden="true"></i>
					Logout</a>
				</li>	
			</ul>
		</div>
	</nav>
    <div class="container-fluid" style="padding-top: 56px;">
    	<div class="row">
			<div class="col-md-2"></div>
    		<div class="col-md-2 bg-dark navbar-nav position-fixed" id="accordion" data-bs-spy="scroll" style="height: 1550px; width: 260px;">
		    	<div class="navbar border-bottom text-white-50">
		    		<span class="">
		    			<img src="../Assets/AvatarNhanVien/<?=$_SESSION['avatar'] ?>" class="rounded-circle" alt="" width="50" height="50">
						<span style="font-size: 14px; font-weight: 400;">Welcome, </span> 
						<span style="margin-left: 3px; color: #fff;"><?php
							if (isset($_SESSION['dangnhap']))
							echo $_SESSION['dangnhap'];
						?></span>
		    		</span>
		    	</div>	
		    	<ul  class="nav nav-stacked active">
					<li data-bs-toggle="collapse" data-bs-target="#collapse0">
		    			<a href="#" class="btn btn-dark dropdown-toggle">
		    			<span class="aaa"><i class="fa-regular fa-user" style="color: #ffffff;"></i></span>
		    			<span class="bbb">Profile</span></a>
		    			<ul id="collapse0" class="collapse text-white-50" data-bs-parent="#accordion">
							<a href="../Profile/MyProfile"><li style="margin: 10px 0 0 13px;"><span>My Proflie</span></li></a>
						</ul>
		    		</li>

		    		<li data-bs-toggle="collapse" data-bs-target="#collapse1">
						<?php if(check('../SanPham/DanhSach') || check('../LoaiSanPham/DanhSach')) { ?>
		    			<a href="#" class="btn btn-dark dropdown-toggle">
		    			<span class="aaa"><i class="fa fa-th-large" aria-hidden="true" style="color:white;"></i></span>
		    			<span class="bbb">Sản phẩm</span></a>
						
						<?php } ?>
						<? ?>
		    			<ul id="collapse1" class="collapse text-white-50" data-bs-parent="#accordion">
							<?php if (check('../SanPham/DanhSach')) {?>
								<a href="../SanPham/DanhSach"><li style="margin: 10px 0 0 13px;"><span>Sản phẩm</span></li></a>
							<?php } ?>
							<?php if(check('../LoaiSanPham/DanhSach')) { ?>
						    <a href="../LoaiSanPham/DanhSach"><li style="margin: 10px 0 0 13px;"><span>Danh mục</span></li></a>
						    <!-- <a href="#"><li>Thống kê</li></a> -->
							<?php } ?>
						</ul>
		    		</li>

		    		<li  data-bs-toggle="collapse" data-bs-target="#collapse2">
						<?php if(check('../DonHangMua/DanhSach') || check('../NguonHang/DanhSach')) { ?>
		    			<a href="#" class="btn btn-dark dropdown-toggle">
		    			<span class="aaa"><i class="fa fa-cart-plus" aria-hidden="true" style="color:white;"></i></span>
		    			<span class="bbb">Nhập Hàng</span></a>
						<?php } ?>
		    			<ul id="collapse2" class="collapse text-white-50" data-bs-parent="#accordion">
							<?php if (check('../DonHangMua/DanhSach')) {  ?>
							<a href="../DonHangMua/DanhSach"><li style="margin: 10px 0 0 13px;"><span>Đơn hàng mua</span></li></a>
							<?php } ?>
							<?php if (check('../NguonHang/DanhSach')) {?>
						    <a href="../NguonHang/DanhSach"><li style="margin: 10px 0 0 13px;"><span>Nhà cung cấp</span></li></a>
						    <!-- <li>Thống kê</li> -->
							<?php } ?>
						</ul>
		    		</li>

		    		<li data-bs-toggle="collapse" data-bs-target="#collapse3">
						<?php if(check('../DonHangBan/DanhSach') || check('../KhachHang/DanhSach') || check('../NhanVien/DanhSach')) { ?>
		    			<a href="#" class="btn btn-dark dropdown-toggle">
		    			<span class="aaa"><i class="fa fa-shopping-bag" aria-hidden="true" style="color: white;"></i></span>
		    			<span class="bbb">Bán Hàng<span class="ppp"><?php if(isset($_SESSION['tongdonhangban'])) echo $_SESSION['tongdonhangban'];?></span></span></a> 
						<?php } ?>
		    			<ul id="collapse3" class="collapse text-white-50" data-bs-parent="#accordion">
							<?php if (check('../DonHangBan/DanhSach')) { ?>
							<a href="../DonHangBan/DanhSach"><li style="margin: 10px 0 0 13px;"><span>Đơn hàng bán</span></li></a>
							<?php } ?>
							<?php if (check('../KhachHang/DanhSach')) {?>
							<a href="../KhachHang/DanhSach"><li style="margin: 10px 0 0 13px;"><span>Khách hàng</span></li></a>
							<?php } ?>
							<?php if (check('../NhanVien/DanhSach')) {?>
							<a href="../NhanVien/DanhSach"><li style="margin: 10px 0 0 13px;"><span>Nhân viên</span></li></a>
						    <!-- <li>Thống kê</li> -->
							<?php } ?>
						</ul>
		    		</li>
					<li data-bs-toggle="collapse" data-bs-target="#collapse4">
						<!-- <div class="hihi"> -->
							<?php if(check('../TaiKhoanNhanVien/DanhSach')){ ?>
							<a href="#" class="btn btn-dark dropdown-toggle ">
							<span class="aaa"><i class="fa fa-address-card" aria-hidden="true" style="color: white;"></i></span>
							<span class="bbb">Quản lý tài khoản</span></a> 
							<?php } ?>
						<!-- </div> -->
						
		    			<ul id="collapse4" class="collapse text-white-50" data-bs-parent="#accordion">
							<?php if (check('../TaiKhoanNhanVien/DanhSach')) { ?>
							<a href="../TaiKhoanNhanVien/DanhSach"><li style="margin: 10px 0 0 13px;"><span>Tài Khoản Nhân Viên</span></li></a>
							<?php } ?>
							<!-- <a href="#"><li>Tài khoản Khách hàng</li></a> -->
						</ul>
		    		</li>
					<li data-bs-toggle="collapse" data-bs-target="#collapse5">
						<!-- <div class="hihi"> -->
						<?php if(check('../Quyen/DanhSach') || check('../LoaiQuyen/DanhSach')) { ?>
		    			<a href="#" class="btn btn-dark dropdown-toggle ">
		    			<span class="aaa"><i class="fa-regular fa-people-group" aria-hidden="true" style="color: white;"></i></span>
		    			<span class="bbb">Quản lý quyền</span></a> 
						<?php } ?>
						<!-- </div> -->
		    			<ul id="collapse5" class="collapse text-white-50" data-bs-parent="#accordion">
							<?php if (check('../Quyen/DanhSach')) { ?>
							<a class="lll" href="../Quyen/DanhSach"><li class="" style="margin: 10px 0 0 13px;"><span>Quyền tài Khoản</span></li></a>
							<?php } ?>

							<?php if (check('../LoaiQuyen/DanhSach')) { ?>
							<a href="../LoaiQuyen/DanhSach"><li style="margin: 10px 0 0 13px;"><span>Loại quyền Tài Khoản</span></li></a>
							<?php } ?>
						</ul>
		    		</li>
					<li data-bs-toggle="collapse" data-bs-target="#collapse6">
						<?php if(check('../TinTuc/DanhSach') || check('../LoaiTinTuc/DanhSach')) { ?>
		    			<a href="#" class="btn btn-dark dropdown-toggle">
		    			<span class="aaa"><i class="fa fa-regular fa-newspaper" aria-hidden="true" style="color: white;"></i></span>
		    			<span class="bbb">Quản lý tin tức</span></a>
						<?php } ?>
		    			<ul id="collapse6" class="collapse text-white-50" data-bs-parent="#accordion">
							<?php if (check('../TinTuc/DanhSach')) { ?>
							<a href="../TinTuc/DanhSach"><li style="margin: 10px 0 0 13px;"><span>Tin tức</span></li></a>
							<?php } ?>

							<?php if (check('../LoaiTinTuc/DanhSach')) { ?>
							<a href="../LoaiTinTuc/DanhSach"><li style="margin: 10px 0 0 13px;"><span>Loại tin tức</span></li></a>
							<?php } ?>
						</ul>
		    		</li>
		    	</ul>
		    </div>
			<div class="col-md-10">
			
			<style>
				a{
					text-decoration: none;
				}
				a > li{
					color: gray;
				}
				.collapse > a > li:hover{
					color: white;
				}

				.collapse > a {
					width: 265px;
					display: inline-block;
					margin-left: -45px;
				}

				.collapse > a > li {
					padding: 5px 0;
				}

				.collapse > a > li:hover {
					background: #7b7979;
					transition: all .2s linear;
					border-radius: 5px;
				}

				.collapse > a > li > span {
					/* width: 265px; */
					display: inline-block;
					margin-left: 45px;
				}
			</style>
<!-- <i class="fa-sharp fa-solid fa-caret-down" style="color: #ffffff; width: 18px; display: inline-block;"></i> -->