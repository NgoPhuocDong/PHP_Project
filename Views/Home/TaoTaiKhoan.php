<?php
    include("./Views/HomeLayout/header.php");
    echo"<title>Đăng kí tài khoản</title>";
?>
<head>
  
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f7f7f7;
    }

    
    .container {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .section {
      margin-bottom: 20px;
      border-bottom: 1px solid #ccc;
      padding-bottom: 20px;
    }

    .section:last-child {
      border-bottom: none;
      padding-bottom: 0;
    }

    .section-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .form-group {
      margin-bottom: 10px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="text"],
    input[type="password"],
    textarea {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .shipping-options label,
    .payment-options label {
      font-weight: normal;
      margin-bottom: 5px;
      display: block;
    }

    .total {
      font-size: 20px;
      font-weight: bold;
      margin-top: 20px;
      text-align: right;
    }

    button[type="submit"] {
      padding: 10px 20px;
      background-color: #4CAF50;
      border: none;
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      float: right;
    }

    button[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <form action="" method="POST" class="login-form">
      <div class="section">
        <h2 class=" text-center text-primary fw-bolder">Đăng kí tài khoản</h2>
        <hr>
        <div class="form-group">
          <label for="email">Tên khách hàng</label>
          <input type="text" id="text" name="tenkhachhang" required>
        </div>
        <div class="form-group">
          <label for="email">Tên đăng nhập:</label>
          <input type="text" id="email" name="tendangnhap" required>
        </div>
        <div class="input-field">
          <label for="phone">Mật khẩu</label>
          <input type="password" id="password" name="matkhau" placeholder="Password...">
        </div>
        
        <div class="form-group">
          <label for="phone">Nhập lại mật khẩu</label>
          <input type="password" id="password2" name="matkhau2" placeholder="Password...">
        </div>

      </div>
      <div>
        <input type="submit" value="Đăng kí" name="submit" class="btn btn-primary">
      </div>
    </form>
  </div>
