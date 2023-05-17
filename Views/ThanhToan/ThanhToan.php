<?php
include "./Views/HomeLayout/header.php";
?>

<form  method="post" id="user-form" enctype="multipart/form-data">
<main class="container mt-5">
    <div class="order-details">
      <div class="left">
        <div class="left-user">
          <h2>Thông tin nhận hàng</h2>
          <div id="customer-info"></div>
          
          
            <div class="mb-3">
              <label for="name" class="form-label">Họ và tên:</label>
              <input type="text" class="form-control" id="name" name="tenkhachhang" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Số điện thoại:</label>
              <input type="text" class="form-control" id="phone" name="sodienthoai" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Email:</label>
              <input type="email" class="form-control" id="phone" name="email" required>
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Địa chỉ:</label>
              <textarea class="form-control" id="address" name="diachi" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3" name="submit" onclick="exportToXLSX()">Xác nhận đơn hàng</button>
        </div>
        
        <div class="left-column">
          <h2>Hình thức vận chuyển</h2>
          <div id="shipping-method">
            <label>
              <input type="radio" name="shipping" value="2h"> Giao hàng 2h
            </label>
            <br>
            <label>
              <input type="radio" name="shipping" value="48h"> Giao hàng 48h
            </label>
          </div>
        </div>
        
     

        <div class="left-column">
        <h2>Phương thức thanh toán</h2>
        <div id="payment-method">
          <label>
            <input type="radio" name="payment" value="cod"> Thanh toán khi nhận hàng
          </label>
          <br>
          <label>
            <input type="radio" name="payment" value="vnpay"> Thanh toán bằng VNPAY
          </label>
        </div>
        </div>
      </div>

      
      <div class="right-column">
        <div class="table-container">
        <h2>Chi tiết đơn hàng</h2>
        <table class="table">
          <thead>
            <tr>
              <th>Sản phẩm</th>
              <th>Giá</th>
              <th>SL</th>
              <th>Thành tiền</th>
            </tr>
          </thead>
          <tbody id="order-items">
            <!-- Đổ dữ liệu từ giỏ hàng vào đây -->
          </tbody>
        </table>
        </div>
        

        
        <div id="total-price"></div>
        <div id="shipping-fee"></div>
        <div id="total-amount"></div>

        
        <input type="submit" class="btn btn-primary mt-3 submitcart" name="submit" value="ĐẶT HÀNG">
      </div>
    </div>
  </main>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
  <script>
    // Lấy thông tin giỏ hàng từ LocalStorage
    var cartData = JSON.parse(localStorage.getItem('cart'));

    // Đổ dữ liệu giỏ hàng vào trang thông tin đơn hàng
    if (cartData && cartData.length > 0) {
      var orderItemsContainer = document.getElementById('order-items');
      var totalPriceContainer = document.getElementById('total-price');
      var shippingFeeContainer = document.getElementById('shipping-fee');
      var totalAmountContainer = document.getElementById('total-amount');

      // Tạo các hàng cho từng sản phẩm trong giỏ hàng
      cartData.forEach(function (product) {
        var row = document.createElement('tr');
        row.innerHTML = `
        <input type='text' class = 'btn-check' name='id' value="${product.ID}">
        <td class="product-column">
        <img src="${product.Image}" alt="Hình ảnh sản phẩm" width="50">
        <span>${product.Name}</span>
        </td>
          <td name="dongia" value="${product.Price}">${product.Price.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</td>
          <td name="soluong" value="${product.Quantity}">${product.Quantity}</td>
          <td name="thanhtien" value="${product.Quantity}">${product.Total.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</td>

                <input type='text' class = 'btn-check' name='idsanpham' value="${product.ID}">
                <input type='text' class = 'btn-check' name='dongia' value="${product.Price}">
                <input type='text' class = 'btn-check' name='soluong' value="${product.Quantity}">
                <input type="date" class = 'btn-check' name="ngaylap" value="<?php echo date('Y-m-d'); ?>">
                <input type="date" class = 'btn-check' name="tongtien" value="${totalAmount}">
          
        `;
        orderItemsContainer.appendChild(row);
      });


      // Tính tổng cộng giá tiền
      var totalPrice = cartData.reduce(function (total, product) {
        return total + parseFloat(product.Total);
      }, 0);
    }
    // Tính phí vận chuyển dựa trên giá trị tổng cộng
    var shippingFee = 0;
    if (totalPrice < 50000000) {
    shippingFee = 20000;
     }
     // Tổng cộng giá tiền và phí vận chuyển
     var totalAmount = totalPrice + shippingFee;

     // Hiển thị giá tiền tạm tính
     totalPriceContainer.innerHTML = `
      <strong id="total">Tạm tính: </strong>
      <span class="total ">${totalPrice.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</span>
      `;
      //Hiển thị phí vận chuyển
      if (shippingFee > 0) {
     shippingFeeContainer.innerHTML = `
      <strong id="total">Phí vận chuyển: </strong>
      <span class="shipfee">${shippingFee.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</span>
      `;
      } else {
        shippingFeeContainer.innerHTML = `
        <strong id="total">Phí vận chuyển: </strong>
        <span class="shipfee">Miễn phí</span> `;
      }

      //Hiển thị tổng cộng
      totalAmountContainer.innerHTML = `
      <strong id="total">Tổng cộng: </strong>
      <strong class="text-danger totalAll" name="tongtien">${totalAmount.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</strong>
      `;


// Xử lý sự kiện khi người dùng nhấn nút Xác nhận đơn hàng
function handleOrderConfirmation(event) {
    event.preventDefault();

    // Lấy thông tin từ các trường nhập
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var address = document.getElementById('address').value;

    // Tạo mã HTML để hiển thị thông tin khách hàng
    var customerInfoHTML = `
      <p><strong>Họ và tên:</strong> ${name}</p>
      <p><strong>Email:</strong> ${email}</p>
      <p><strong>Địa chỉ:</strong> ${address}</p>
    `;

    // Hiển thị thông tin khách hàng trong phần tử có id là "customer-info"
    var customerInfoContainer = document.getElementById('customer-info');
    customerInfoContainer.innerHTML = customerInfoHTML;

    // Ẩn phần form
    var orderForm = document.getElementById('order-form');
    orderForm.style.display = 'none';
  }

  // Lắng nghe sự kiện submit của form
  var orderForm = document.getElementById('order-form');
  orderForm.addEventListener('submit', handleOrderConfirmation);

  function exportToXLSX() {
  // Lấy thông tin giỏ hàng từ LocalStorage
  var cartData = JSON.parse(localStorage.getItem('cart'));

  // Tạo một workbook mới
  var workbook = XLSX.utils.book_new();

  // Tạo một worksheet mới
  var worksheet = XLSX.utils.json_to_sheet(cartData);

  // Thêm worksheet vào workbook
  XLSX.utils.book_append_sheet(workbook, worksheet, 'Đơn hàng');

  // Xuất file XLSX
  XLSX.writeFile(workbook, 'don_hang.xlsx');
}

  </script>
</body>
<style>
  body {
    background-color: #E7EBEE;
    padding-bottom: 100px;
  }
  .table td {
  text-align: left;
  vertical-align: middle;
}

.order-details {
  display: flex;
  

}
.left {
  flex: 1;
  display: flex;
  flex-direction: column;
  margin-right: 20px;

}
.left-column {
  flex-direction: column;
  padding: 20px;
  margin-top: 20px;
  
  background-color: #ffffff;
  box-shadow: 0 1px 5px 0 rgba(0,0,0,0.49);
}

.left-user {

  background-color: #ffffff;
  box-shadow: 0 1px 5px 0 rgba(0,0,0,0.49);
  padding: 20px;

}

.right-column {
  flex:1;
  background-color: #ffffff;
  box-shadow: 0 1px 5px 0 rgba(0,0,0,0.49);
  padding: 20px;

}

.table td.product-column {
  display: flex;
  align-items: center;
  gap: 10px;
}

.table td.product-column img {
  max-width: 50px;
}

.table td.product-column span {
  flex-grow: 1;
}

.total,
.shipfee,
.totalAll{
  float:right;
}

#total-price{
  margin-bottom: 10px;
}

#shipping-fee{
  margin-bottom: 10px;
}
#total-amount{
  padding-top: 10px;
  border-top: 1px solid #ccc;
  font-size: 20px;
}

.submitcart {
  padding: 10px 20px;
    font-size: 25px;
    width: 620px;
    margin-top:200px;
}
#order-form {
    margin-top: 160px;
  }

</style>



