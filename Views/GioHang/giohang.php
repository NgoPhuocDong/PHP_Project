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
<div class="container bg-light mt-4">
  <h1>Giỏ hàng</h1>
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
          <a class="btn btn-primary btn-checkout" href = '../ThanhToan/ThemMoi'>Tiến hành đặt hàng</a>
        </td>
      </tr>
    </tfoot>
  </table>
</div>

<script>
  // Lấy thông tin giỏ hàng từ Local Storage
  var cartItems = localStorage.getItem("cart");
  cartItems = cartItems ? JSON.parse(cartItems) : [];

  // Hiển thị thông tin giỏ hàng
  var cartItemsContainer = document.getElementById('cart-items');
  var cartTotalElement = document.getElementById('cart-total');
  var cartTotal = 0;

  for (var i = 0; i < cartItems.length; i++) {
    var productID = cartItems[i];

    // Lấy thông tin sản phẩm từ Local Storage hoặc cơ sở dữ liệu
    // Điều chỉnh code dưới đây để lấy thông tin sản phẩm từ nguồn dữ liệu của bạn
    var product = cartItems[i]; // Lấy thông tin sản phẩm từ Local Storage

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

  // Tăng số lượng
  $('.btn-increase').click(function() {
    var quantityElement = $(this).siblings('.product-quantity');
    var quantity = parseInt(quantityElement.text());
    quantityElement.text(quantity + 1);
    updateProductTotal($(this).closest('tr'));
    updateCartTotal();
    updateLocalStorage();
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
      product.Name = $(this).find('.lead').text();
      product.Image = $(this).find('img').attr('src');
      product.Price = parseFloat($(this).find('.product-price').text().replace(/\D/g, ''));
      product.Quantity = parseInt($(this).find('.product-quantity').text());
      product.Total = parseFloat($(this).find('.product-total').text().replace(/\D/g, ''));
      cart.push(product);
    });
    localStorage.setItem('cart', JSON.stringify(cart));
  }
 
// // Khôi phục thông tin giỏ hàng từ localStorage
// function restoreCartFromLocalStorage() {
//   var cart = localStorage.getItem('cart');
//   if (cart) {
//     var products = JSON.parse(cart);
//     for (var i = 0; i < products.length; i++) {
//       var product = products[i];
//       // Chuyển đổi giá sang định dạng VND
//       var priceVND = product.Price.toLocaleString('vi-VN', { style: 'currency', currency: 'VND', minimumFractionDigits: 0 });
//       var priceTotal = product.Total.toLocaleString('vi-VN', { style: 'currency', currency: 'VND', minimumFractionDigits: 0 });
      
//       // Tạo hàng cho sản phẩm và thêm vào giỏ hàng
//       var row = $('<tr></tr>');
//       row.append('<td><button class="btn btn-danger btn-remove">Xóa</button></td>');
//       row.append('<td class="product-id">' + product.ID + '</td>').css('display', 'none');
//       row.append('<td class="product-name">' + product.Name + '</td>');
//       row.append('<td><img src="' + product.Image + '" alt="Hình ảnh sản phẩm" width="50"></td>');
//       row.append('<td class="product-price">' + priceVND + '</td>');
//       row.append('<td><button class="btn btn-secondary btn-decrease">-</button><span class="product-quantity">' + product.Quantity + '</span><button class="btn btn-secondary btn-increase">+</button></td>');
//       row.append('<td class="product-total">' + priceTotal + '</td>');
//       $('.table tbody').append(row);
//     }
//     updateCartTotal();
//   }
 
// }

// // Gọi hàm khôi phục thông tin giỏ hàng khi load lại trang
// $(document).ready(function() {
//   restoreCartFromLocalStorage();
// });

//  // Khôi phục thông tin giỏ hàng từ localStorage (nếu có)
//   function restoreCartFromLocalStorage() {
//     var cart = localStorage.getItem('cart');
//     if (cart) {
//       cart = JSON.parse(cart);
//       $.each(cart, function(index, product) {
//         var row = $('<tr></tr>');
//         row.append('<td><button class="btn btn-danger btn-remove">Xóa</button></td>');
//         row.append('<td class="product-name">' + product.name + '</td>');
//         row.append('<td><img src="' + product.image + '" alt="Hình ảnh sản phẩm" width="50"></td>');
//         row.append('<td class="product-price">$' + product.price + '</td>');
//         row.append('<td><button class="btn btn-secondary btn-decrease">-</button><span class="product-quantity">' + product.quantity + '</span><button class="btn btn-secondary btn-increase">+</button></td>');
//         row.append('<td class="product-total">$' + product.total.toFixed(2) + '</td>');
//         $('.table tbody').append(row);
//   });

//   updateCartTotal();
// }
// }

// // Gọi hàm khôi phục thông tin giỏ hàng từ localStorage khi tải trang
// restoreCartFromLocalStorage();



// Xử lý sự kiện khi nhấp vào nút thanh toán
// $('.btn-checkout').click(function() {
// // Thực hiện xử lý thanh toán tại đây
// window.location.href = '../ThanhToan/ThemMoi';

// $('form').submit(function(event) {
//     event.preventDefault();
//     var row = $('<tr></tr>');
//     var image = $(this).closest('.card').find('img').attr('src');
//     var price = parseFloat($(this).closest('.card').find('.text-primary').text().replace(',', '').replace(' VNĐ', ''));
//     var quantity = 1;
//     var total = price * quantity;
//     row.append('<td><button class="btn btn-danger btn-remove">Xóa</button></td>');
//     row.append('<td><img src="' + image + '" alt="Hình ảnh sản phẩm" width="50"></td>');
//     row.append('<td class="product-price">$' + price.toFixed(2) + '</td>');
//     row.append('<td><button class="btn btn-secondary btn-decrease">-</button><span class="product-quantity">' + quantity + '</span><button class="btn btn-secondary btn-increase">+</button></td>');
//     row.append('<td class="product-total">$' + total.toFixed(2) + '</td>');
//     $('tbody').append(row);

//     updateCartTotal();
//     updateLocalStorage();
//   });
// });
});



  </script> 


</body>
</html>