<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận mã Token</title>
</head>
<style>

body {
  background: url("https://incare.vn/wp-content/uploads/2020/12/kinh-nghiem-mua-laptop-cho-dan-van-phong-4.jpg?fbclid=IwAR1bjP-uBkhXohQAOVfRJx1vClQw8Bob5qZZso5NZQ2T73SXX2P9cWgx3VA");
  background-size: cover;
  background-repeat: no-repeat;
}

form {
  margin-top: 100px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background-color: #3a5063cc;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  max-width: 500px;
  margin: 250px auto;
  padding: 30px;
  position: relative;
  overflow: hidden;
}

.token-title {
  color: #1d8af5;
  font-size: 2.5rem;
  margin-bottom: 20px;
  font-weight: bold;
}

h2 {
  font-size: 1.8rem;
  font-weight: 400;
  text-align: center;
  margin-bottom: 20px;
  color: #222;
}

label {
  font-size: 1.2rem;
  margin-bottom: 10px;
  color: #666;
}

input {
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

input:focus {
  outline: none;
  border-color: #0080ff;
}

button {
  padding: 10px 20px;
  font-size: 1.2rem;
  background-color: #21346f;
  color: #fff;
  border: none;
  border-radius: 5px;
  transition: background-color 0.3s ease-in-out;
  margin-bottom: 0px;
  margin-top: 10px;
}

button:hover {
  cursor: pointer;
  background-color: #1b2954;
}

::placeholder{
  color: #adaaaa;
}

</style>
<body>
  <form action="./verifyToken" method="POST">
    <label class="token-title" for="token">Mã token</label>
      <input type="text" id="token" name="confirmToken" placeholder="Nhập mã token của bạn...">
      <p style="text-align: center;">
        <span style="color: red; font-size: 18px;">
          <?php 
            if(isset($_SESSION['error'])) {
              echo $_SESSION['error'];
            }
          ?>
        </span>
			</p>
    <button name="submitToken" type="submit">Xác nhận</button>
  </form>
</body>
</html>
