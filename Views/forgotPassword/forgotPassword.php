<?php
   include("Controllers/loginAdminController.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
</head>
<style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.forgot-password-container { 
  background: url("https://incare.vn/wp-content/uploads/2020/12/kinh-nghiem-mua-laptop-cho-dan-van-phong-4.jpg?fbclid=IwAR1bjP-uBkhXohQAOVfRJx1vClQw8Bob5qZZso5NZQ2T73SXX2P9cWgx3VA");
  background-size: cover;
  background-repeat: no-repeat;
  display: flex;
  min-height: 100vh;
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.forgot-password-card {
  max-width: 500px;
  width: 100%;
  background-color: #3a5063cc;
  padding: 40px;
  border-radius: 10px;
  box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
  animation: slide-up 0.5s ease;
}

.forgot-password-title {
  color: #1d8af5;
  font-size: 2.5rem;
  margin-bottom: 20px;
}

.forgot-password-subtitle {
  color: #fff;
  font-size: 1.2rem;
  margin-bottom: 40px;
}

form {
  display: flex;
  flex-direction: column;
}

.forgot-password-input:focus {
  outline: none;
  border-color: #0080ff;
}

.forgot-password-button {
  padding: 10px 20px;
  font-size: 1.2rem;
  background-color: #21346f;
  color: #fff;
  border: none;
  border-radius: 5px;
  transition: background-color 0.3s ease-in-out;
  margin-bottom: 20px;
  cursor: pointer;
}

/* Hiệu ứng hover cho nút Submit */
.forgot-password-button:hover {
  background-color: #1b2954;
}

/* Phần input email */
.forgot-password-input {
  width: 100%;
  padding: 10px;
  font-size: 1.1rem;
  margin-bottom: 20px;
  border: none;
  border-radius: 5px;
  background: none;
  border-bottom: 2px solid #d8d8d8;
  color: white;
  transition: border-color 0.3s ease-in-out;
}

/* Phần label email */
.forgot-password-label {
  font-size: 1.2rem;
  margin-bottom: 10px;
  color: #fff;
}

.forgot-password-login-link {
  color: #1d8af5;
  font-size: 20px;
  margin-top: 15px;
  font-weight: bold;
  display: block;
  text-decoration: none;
  transition: color 0.3s ease-in-out;
}

.forgot-password-login-link:hover {
  color: #0364c4;
}

::placeholder{
  color: #adaaaa;
}
</style>
<body>
  <div class="forgot-password-container">
    <div class="forgot-password-card">
      <h2 class="forgot-password-title">Quên mật khẩu?</h2>
      <p class="forgot-password-subtitle">Vui lòng nhập email của bạn để khôi phục mật khẩu.</p>
      <form action="" method="POST">
        <label for="email" class="forgot-password-label">Email:</label>
        <input type="email" id="email" name="email1" placeholder="Nhập email của bạn..." class="forgot-password-input">
        <button name="submitForgot" type="submit" class="forgot-password-button">Send email</button>
      </form>
      <p style="text-align: center; font-size: 18px;">
        <?php
          if(isset($login_check1)) {
            echo $login_check1;
          }
        ?>
      </p>
      <div class="links">
        <a href="../Home/login" class="link forgot-password-login-link">Đăng nhập</a>
      </div>
    </div>
  </div>
</body>
</html>
