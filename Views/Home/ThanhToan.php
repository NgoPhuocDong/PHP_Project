<?php
    include("./Views/HomeLayout/header.php");
?>
<head>
  <title>Thanh Toán</title>
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
    input[type="email"],
    input[type="tel"],
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
  <form action="" method="POST">
    <div class="section">
      <h3 class="section-title">Thông tin nhận hàng</h3>
      <div class="form-group">
        <label for="email">Tên khách hàng</label>
        <input type="text" id="text" name="tenkhachhang" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="phone">Số điện thoại:</label>
        <input type="tel" id="phone" name="sodienthoai" required>
      </div>
      <!-- <div class="form-group">
        <label for="province">Tỉnh thành:</label>
        <input type="text" id="province" name="province" required>
      </div>
      <div class="form-group">
        <label for="district">Quận huyện:</label>
        <input type="text" id="district" name="district" required>
      </div>
      <div class="form-group">
        <label for="ward">Phường xã:</label>
        <input type="text" id="ward" name="ward" required>
      </div> -->
      <div class="form-group">
        <label for="address">Địa chỉ:</label>
        <textarea id="address" name="diachi" required></textarea>
      </div>
      <!-- <div class="form-group">
        <label for="note">Ghi chú:</label>
        <textarea id="note" name="note"></textarea>
      </div> -->
    </div>

    <!-- <div class="section">
      <h3 class="section-title">Vận chuyển</h3>
      <div class="form-group">
        <label><input type="radio" name="shipping" value="fast"> Giao hàng nhanh</label>
      </div>
      <div class="form-group">
        <label><input type="radio" name="shipping" value="standard"> Giao hàng thường</label>
      </div>
    </div> -->

    <!-- <div class="section">
      <h3 class="section-title">Thanh toán</h3>
      <div class="form-group">
        <label><input type="radio" name="payment" value="cod"> Thanh toán khi nhận hàng (COD)</label>
      </div>
      <div class="form-group">
        <label><input type="radio" name="payment" value="card"> Visa/Master Card</label>
      </div>
    </div> -->

    <div class="">
    <input type="submit" value="Submit" name="submit" class="btn btn-primary">
    </div>
    </form>
  </div>
