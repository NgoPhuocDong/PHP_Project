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

.login-form {
    background-color: #3a5063cc;
    padding: 50px 60px;
    border-radius: 10px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    width: 35%;

    
}

h1 {
    text-align: center;
    font-weight: bold;
    font-size: 36px;
    color: #1d8af5;
    margin-bottom: 40px;
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

.btn {
    display: block;
    width: 100%;
    margin: 40px 0;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #21346f;
    color: #ffffff;
    font-size: 18px;
    font-weight: bold;
    transition: background-color 0.3s ease;
    /* border: 2px solid #3e8e41; */
}

.btn:hover {
    background-color: #1b2954;
    /* background-image: linear-gradient(to bottom, #2f6f32, #3e8e41); */
    /* border: 2px solid #2f6f32; */
    color: #fff;

}

input[type="text"]:focus, input[type="password"]:focus {
    border-color: #1b2954;
    /* color: #3e8e41; */
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

.show_hide {
    position: absolute;
    width: 10%;
    bottom: 20px;
    right: -3px;
    cursor: pointer;
    color: #21346f;
}

.show_hide:hover {
    font-size: 18px;
    color: #1b2954;
    transition: all .3s ease-in-out;
}
</style>
<body>
<div class="container">
        <form class="login-form" method="POST" action="">
            <h1>Đăng nhập</h1>
            <div class="input-field">
                <input type="text" id="username" name="username" placeholder="Username...">
                <label for="username">Tên đăng nhập</label>
            </div>
            <div class="input-field">
                <input type="password" id="password" name="password" placeholder="Password...">
                <label for="password">Mật khẩu</label>
                <i class="fa fa-eye show_hide text-light" onclick="togglePassword()"></i>
            </div>
           <p style="text-align: center;">
            <span>
                    <?php
                        if(isset($login_check)) {
                            echo $login_check;
                        }
                    ?>
                </span>
           </p>
            
            <div class="input-field">
                <input class="form-check-input" type="checkbox" id="check1" name="remember"><span class="labelCheck" style="color: #fff; font-size: 15px;">Ghi nhớ tài khoản?</span>
            </div>
                
            <button type="submit" class="btn" name="submitValue">Đăng nhập</button>
            
            <div class="forgot-password">
                <a href="../forgotPassword/forgotPassword">Quên mật khẩu?</a>
            </div>
        </form>
    </div>
</html>

<?php
    echo "
    <script>
		function togglePassword() {
            var iElement = document.querySelector('i');
			var passwordInput = document.getElementById('password');
			if (passwordInput.type === 'password') {
                iElement.classList.remove('fa-eye');
                iElement.classList.add('fa-eye-slash');
                
				passwordInput.type = 'text';
			} else {
                iElement.classList.remove('fa-eye-slash');
                iElement.classList.add('fa-eye');
				passwordInput.type = 'password';
			}
		}
    </script>";
?>  
