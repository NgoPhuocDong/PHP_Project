<?php
    include("Controllers/loginAdminController.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/CSS/bootstrap.css">
    <link rel="stylesheet" href="../Assets/fonts/font-awesome.min.css">
    <title>Login</title>
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: url("https://incare.vn/wp-content/uploads/2020/12/kinh-nghiem-mua-laptop-cho-dan-van-phong-4.jpg?fbclid=IwAR1bjP-uBkhXohQAOVfRJx1vClQw8Bob5qZZso5NZQ2T73SXX2P9cWgx3VA");
    background-size: cover;
    background-repeat: no-repeat;
    font-family: 'Roboto', sans-serif;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.change-form {
    background-color: #3a5063cc;
    padding: 50px 45px;
    border-radius: 10px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    width: 35%;    
}

h1 {
    text-align: center;
    font-weight: bold;
    font-size: 36px;
    color: #1d8af5;
    margin-bottom: 50px;
}

.input-field {
    position: relative;
    margin-bottom: 40px;
}

input {
    width: 100%;
    padding: 10px 0;
    border: none;
    border-bottom: 2px solid #d8d8d8;
    background-color: transparent;
    color: #4e4e4e;
    font-size: 16px;
}

input:focus, input:valid {
    outline: none;
}

label {
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    color: #fff;
    pointer-events: none;
    transition: all 0.3s ease;
}

.input-field input:focus ~ label, .input-field input:valid ~ label {
    top: -10px;
    font-size: 16px;
    color: #fff;
    font-weight: bold;  
}

.container-button {
	display: flex;
	justify-content: space-between;
	
}

.btn {
    display: block;
    width: 40%;
    margin: 0px 0;
    padding: 10px 22px;
    border: none;
    border-radius: 5px;
    background-color: #21346f;
    color: #ffffff;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #1b2954;
    color: #fff;

}

input[type="text"]:focus, input[type="password"]:focus {
    border-color: #1b2954;
    color: #fff;
    transform: scale(1.05);
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 5px #ccc;
    transition: transform 0.3s ease-in-out;
    color: #fff;
}

.labelCheck {
    margin-left: 10px;
   margin-top: 5px;
    display: inline-block;
}


::placeholder{
  color: #adaaaa;
}
</style>
<body>
	<div class="container">
		<form class="change-form" method="POST" action="./changePw">
			<h1>Đổi mật khẩu</h1>
			<div class="input-field">
				<input type="text" id="new-password" name="newPassword" placeholder="Password...">
				<label for="new-password">Nhập mật khẩu mới</label>
			</div>
			<div class="input-field">
				<input type="text" id="renew-password" name="reNewPassword" placeholder="Repeat Password...">
				<label for="renew-password">Nhập lại mật khẩu mới</label>
			</div>
			<p style="text-align: center;">
				<span style="color: green; font-size: 18px;">
					<?php
						if(isset($_SESSION['success'])) {
							echo $_SESSION['success'];
						}
					?>
				</span>
				<span style="color: red; font-size: 18px;">
					<?php 
						if(isset($_SESSION['error'])) {
							echo $_SESSION['error'];
						}
					?>
				</span>
			</p>
			<div class="container-button">
				<button type="submit" class="btn" name="submitChangePw">Đổi mật khẩu</button>
				<button type="submit" class="btn" name="submitReturn">Quay về</button>
			</div> 
		</form>
	</div>
</body>
</html>


