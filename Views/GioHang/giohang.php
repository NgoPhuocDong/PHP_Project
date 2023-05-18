<?php
include "./Views/HomeLayout/header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giỏ hàng</title>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container bg-white mt-4">
  <h1 id="cart-title">Giỏ hàng</h1>
  <table class="table align-middle text-center">
    <thead>
      <tr>
        <th scope="col">Xóa sản phẩm</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Hình ảnh </th>
        <th scope="col">Giá tiền</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Thành tiền</th>
      </tr>
    </thead>
    <tbody id="cart-items">
      <!-- Đây là nơi các phần tử của giỏ hàng sẽ được thêm vào -->
    </tbody>
    <tfoot>
      <tr>
        <th colspan="5" class="text-end">Tổng cộng:</th>
        <th id="cart-total">0 VNĐ</th>
      </tr>
      <tr>
        <td colspan="6" class="text-end">
          <a class="btn btn-dh btn-primary" href="../TrangChu/ThanhToan">Tiến hành đặt hàng</a>
        </td>
      </tr>
    </tfoot>
  </table>
  
  <div id="bgcart" style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh;">
  <img src="https://hasaki.vn/images/graphics/img_lb_empty.gif" alt="" id="img-empty" style=" margin-bottom: 20px;">
  <div id="empty-cart" style="text-align: center;"></div>
  <a class="btn btn-primary" id="button-back" href="../TrangChu/Index">Tiếp tục mua sắm</a>
  </div>
</div>

<script>
  // Lấy thông tin giỏ hàng từ Local Storage
  var cartItems = localStorage.getItem("cart");
  cartItems = cartItems ? JSON.parse(cartItems) : [];

  var cartTable = document.querySelector('.table');
  // Hiển thị thông tin giỏ hàng
  var cartItemsContainer = document.getElementById('cart-items');
  var cartTotalElement = document.getElementById('cart-total');
  var emptyCartContainer = document.getElementById('empty-cart');
  var imgEmptyContainer = document.getElementById('img-empty');
  var cartTitleElement = document.getElementById("cart-title");
  var buttonBackElement = document.getElementById("button-back");
  var bgCartElement = document.getElementById("bgcart");
  
  var cartTotal = 0;

  if (cartItems && cartItems.length > 0) {
  for (var i = 0; i < cartItems.length; i++) {
    var productID = cartItems[i];

    var cartItemCount = cartItems.reduce(function(total, product) {
    return total + product.Quantity;
  }, 0);
    // Lấy thông tin sản phẩm từ Local Storage hoặc cơ sở dữ liệu
    // Điều chỉnh code dưới đây để lấy thông tin sản phẩm từ nguồn dữ liệu của bạn
    var product = cartItems[i]; // Lấy thông tin sản phẩm từ Local Storage

    cartTitleElement.textContent = "Giỏ hàng (" + cartItemCount + " sản phẩm)";

    // Tạo các phần tử HTML cho sản phẩm
    var row = document.createElement('tr');
    cartItemsContainer.appendChild(row);
    
    var removeCell = document.createElement('td');
    var removeButton = document.createElement('button');
    removeButton.className = 'btn btn-danger btn-remove';
    removeButton.textContent = 'Xóa';
    removeCell.appendChild(removeButton);
    row.appendChild(removeCell);

    var nameCell =document.createElement('td');
    nameCell.className = 'lead';
    nameCell.textContent = product.Name;
    row.appendChild(nameCell);

    var hiddenCell = document.createElement('td');
    hiddenCell.style.display = 'none';
    hiddenCell.className = 'product-id';
    hiddenCell.textContent = product.ID;
    row.appendChild(hiddenCell);

    var hiddenCell = document.createElement('td');
    hiddenCell.style.display = 'none';
    hiddenCell.className = 'product-quantityleft';
    hiddenCell.textContent = product.QuantityLeft;
    row.appendChild(hiddenCell);


    var imageCell = document.createElement('td');
    var imageElement = document.createElement('img');
    imageElement.src = product.Image;
    imageElement.alt = 'Hình ảnh sản phẩm';
    imageElement.width = 50;
    imageCell.appendChild(imageElement);
    row.appendChild(imageCell);

    var priceCell = document.createElement('td');
    priceCell.className = 'product-price';
    priceCell.textContent = product.Price.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' , minimumFractionDigits: 0});;
    row.appendChild(priceCell);


    //---------------------------------------nút tăng giảm số lưọng-------------------------
    var quantityCell = document.createElement('td');
      quantityCell.style.display = 'flex';
      quantityCell.style.padding = '24px';
      quantityCell.style.fontSize = '15px';

      var decreaseButton = document.createElement('button');
      decreaseButton.className = 'rounded-start btn-outline-primary border-end-0 border-1 ms-5 btn-decrease';
      decreaseButton.innerHTML = '<i class="fas fa-minus"></i>';
      
      quantityCell.appendChild(decreaseButton);

      var quantityElement = document.createElement('span');
      quantityElement.className = 'product-quantity border border-1 border-primary p-1 px-3';
      quantityElement.textContent = product.Quantity;
      quantityCell.appendChild(quantityElement);

      var increaseButton = document.createElement('button');
      increaseButton.className = 'rounded-end btn-outline-primary border-start-0 border-1 btn-increase';
      increaseButton.innerHTML = '<i class="fas fa-plus"></i>';
      quantityCell.appendChild(increaseButton);

    row.appendChild(quantityCell);
//---------------------------------------nút tăng giảm số lưọng-------------------------



    /////////////////////////////////
    var totalCell = document.createElement('td');
    totalCell.className = 'product-total' ;
    var total = product.Price * product.Quantity;
    
    totalCell.textContent = total.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' , minimumFractionDigits: 0});;;
    row.appendChild(totalCell);
    cartTotal += total;
  }

  cartTotal = cartTotal.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' , minimumFractionDigits: 0});;
  cartTotalElement.textContent = cartTotal;
  imgEmptyContainer.style.visibility = "hidden";
  cartTable.style.visibility = "visible";
  buttonBackElement.style.visibility = "hidden";
  bgCartElement.style.visibility = "hidden";
} else {
  // Không có sản phẩm trong giỏ hàng
  emptyCartContainer.innerHTML = '<p>Không có sản phẩm nào trong giỏ hàng.</p>';
  cartTable.style.display = 'none'; // Ẩn bảng
  imgEmptyContainer.style.visibility = "visible";
  buttonBackElement.style.visibility = "visible";
  bgCartElement.style.visibility = "visible";
}
 
</script>

<!-- Nạp các tệp JavaScript Bootstrap và jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
   <script>
    $(document).ready(function() {

  // Xóa sản phẩm
  $('.btn-remove').click(function() {
    $(this).closest('tr').remove();
    updateCartTotal();
    updateLocalStorage();
  });

  $('.btn-dh').click(function() {
    updateProductTotal($(this).closest('tr'));
    updateCartTotal();
    updateLocalStorage();
  });

  

  // Tăng số lượng
  $('.btn-increase').click(function() {
    var quantityElement = $(this).siblings('.product-quantity');
    var quantity = parseInt(quantityElement.text());
    var maxQuantity = parseInt($(this).closest('tr').find('.product-quantityleft').text());  //lấy số lượng còn trong kho

    if (quantity < maxQuantity) {
    quantityElement.text(quantity + 1);
    updateProductTotal($(this).closest('tr'));
    updateCartTotal();
    updateLocalStorage();
    }else{
      alert("Số lượng trong kho chỉ còn lại "+maxQuantity+" sản phẩm \n Xin lỗi quý khách vì sự số bất tiện này!");
    }
  });

  // Giảm số lượng
  $('.btn-decrease').click(function() {
    var quantityElement = $(this).siblings('.product-quantity');
    var quantity = parseInt(quantityElement.text());
    if (quantity > 1) {
      quantityElement.text(quantity - 1);
      updateProductTotal($(this).closest('tr'));
      updateCartTotal();
      updateLocalStorage();
    }
  });

  // Cập nhật tổng cộng của sản phẩm
  function updateProductTotal(row) {
    var price = parseFloat(row.find('.product-price').text().replace(/\D/g, ''));
    var quantity = parseInt(row.find('.product-quantity').text());
    var total = price * quantity;
    total = total.toLocaleString('vi-VN', { style: 'currency', currency: 'VND', minimumFractionDigits: 0 });;
    row.find('.product-total').text(total);
  }

  // Cập nhật tổng cộng của giỏ hàng
  function updateCartTotal() {
    var total = 0;
    $('.product-total').each(function() {
      var price = parseFloat($(this).text().replace(/\D/g, ''));
      total += price;
    });
    total=total.toLocaleString('vi-VN', { style: 'currency', currency: 'VND', minimumFractionDigits: 0 });;
    $('#cart-total').text(total);
  }

  // Cập nhật thông tin giỏ hàng trong localStorage
  function updateLocalStorage() {
    var cartData = JSON.parse(localStorage.getItem('cart'));
    var cart = [];

    $('.table tbody tr').each(function() {
      var product = {};
      product.ID = $(this).find('.product-id').text();
      product.Name = $(this).find('.lead').text();
      product.Image = $(this).find('img').attr('src');
      product.QuantityLeft = $(this).find('.product-quantityleft').text();
      product.Price = parseFloat($(this).find('.product-price').text().replace(/\D/g, ''));
      product.Quantity = parseInt($(this).find('.product-quantity').text());
      product.Total = parseFloat($(this).find('.product-total').text().replace(/\D/g, ''));
      cart.push(product);
    });
    localStorage.setItem('cart', JSON.stringify(cart));
  }
 

});
</script> 
