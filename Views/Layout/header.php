<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <title>Admin</title> -->
	<link rel="stylesheet" type="text/css" href="../Assets/fonts/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../Assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap.min.css">
	<script src="../Assets/scripts/bootstrap.bundle.min.js"></script>

	<!-- Dùng cho file index -->
	<link rel="stylesheet" type="text/css" href="Assets/fonts/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.min.css">
	<script src="Assets/scripts/bootstrap.bundle.min.js"></script>
    

</head>
<body class="bg-light col-md-12">
	<nav class="navbar navbar-expand-sm bg-white col-md-12">
		<div class="container-fluid">
			<h4><a class="nav-link" href="#">Logo</a></h4>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">News</a>
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
					<a class="nav-link" href="#">
					<i class="fa fa-cog" aria-hidden="true"></i>
					Settings</a>
				</li>
				<li class="nav-item" style="float: right;">
					<a href="#" class="nav-link active">
					<i class="fa fa-sign-in" aria-hidden="true"></i>
					Login</a>
				</li>
			</ul>
		</div>
	</nav>
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-2 bg-dark navbar-nav" id="accordion" data-bs-spy="scroll" style="height: 500px;">
		    	<div class="navbar border-bottom text-white-50">
		    		<span class="">
		    			<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThXxkVUHWG0N3-vMhcIbCU9eS-6TqNFvcQ4aB0Yzk&s" class="rounded-circle" alt="" width="40" height="40">
		    		User Name
		    		</span>
		    	</div>
		    	<ul class="nav nav-stacked active">
		    		<li data-bs-toggle="collapse" data-bs-target="#collapse1">
		    			<a href="#" class="btn btn-dark dropdown-toggle">
		    			<i class="fa fa-th-large" aria-hidden="true" style="color:white;"></i>
		    			Sản phẩm</a>
		    			<ul id="collapse1" class="collapse text-white-50" data-bs-parent="#accordion">
							<a href="../SanPham/DanhSach"><li>Sản phẩm</li></a>
						    <a href="../LoaiSanPham/DanhSach"><li>Danh mục</li></a>
						    <a href="#"><li>Thống kê</li></a>
						</ul>
		    		</li>

		    		<li data-bs-toggle="collapse" data-bs-target="#collapse2">
		    			<a href="#" class="btn btn-dark dropdown-toggle">
		    			<i class="fa fa-cart-plus" aria-hidden="true" style="color:white;"></i>
		    			Nhập Hàng</a>
		    			<ul id="collapse2" class="collapse text-white-50" data-bs-parent="#accordion">
							<a href="../DonHangMua/DanhSach"><li>Đơn hàng mua</li></a>
						    <a href="../NguonHang/DanhSach"><li>Nhà cung cấp</li></a>
						    <li>Thống kê</li>
						</ul>
		    		</li>

		    		<li data-bs-toggle="collapse" data-bs-target="#collapse3">
		    			<a href="#" class="btn btn-dark dropdown-toggle">
		    			<i class="fa fa-shopping-bag" aria-hidden="true" style="color: white;"></i>
		    			Bán Hàng</a>
		    			<ul id="collapse3" class="collapse text-white-50" data-bs-parent="#accordion">
							<a href="../DonHangBan/DanhSach"><li>Đơn hàng bán</li></a>
							<a href="../KhachHang/DanhSach"><li>Khách hàng</li></a>
							<a href="../NhanVien/DanhSach"><li>Nhân viên</li></a>
						    <li>Thống kê</li>
						</ul>
		    		</li>
					<li data-bs-toggle="collapse" data-bs-target="#collapse4">
		    			<a href="#" class="btn btn-dark dropdown-toggle">
		    			<i class="fa fa-address-card" aria-hidden="true" style="color: white;"></i>
		    			Quản lý tài khoản</a>
		    			<ul id="collapse4" class="collapse text-white-50" data-bs-parent="#accordion">
							<a href="../TaiKhoanNhanVien/DanhSach"><li>Tài Khoản Nhân Viên</li></a>
							<a href="#"><li>Tài khoản Khách hàng</li></a>
						</ul>
		    		</li>
		    	</ul>
		    </div>
			<div class="col-md-10">
			
			<style>
				.collapse > a{
					text-decoration: none;
				}
				.collapse > a > li{
					color: #ffffff;
				}
				.collapse > a > li:hover{
					color: gray;
				}
			</style>
