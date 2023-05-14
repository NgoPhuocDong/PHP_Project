
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="..\Assets\css\styleTrangChu.css"> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- JS Bootstrap 5 và jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../Assets/scripts/JavaScript.js"></script>
	
	<!-- Required Core stylesheet --> 
    <link rel="stylesheet" href="../Assets/css/glide.core.min.css">

    <!-- Optional Theme stylesheet -->
    <link rel="stylesheet" href="../Assets/css/glide.theme.min.css">
    
</head>
<style>
 .product-list {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-auto-rows: 1fr;
  grid-gap: 20px;
  
}

.product-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}

.product-item img {
  width: 100%;
  height: auto;
  object-fit: cover;
}

@media screen and (max-width: 768px) {
  .product-list {
    grid-template-columns: repeat(2, 1fr);
  }
}
.badge {
  background-color: red;
  color: white;
  padding: 4px 8px;
  border-radius: 50%;
}
img:hover {
  transform: scale(1.05);
  transition: transform .1s ease-in-out;
}

</style>
<script>
  function redirectToLoginPage() {
    window.location.href = "../Views/Log/loginKH.php";
}


   
  
</script>

<body>
  <header id="main-header" class="bg-white text-white" style="position: sticky;top: 0;z-index: 9999; box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1); ">
		<div class="container-fluid">
			<div id="row-middle" class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start" style="height: 88px; display:flex; row-gap: 16px;">
        <!-- <div style="padding-left: auto; padding-right: 8px; margin-right: 8px; ">
          <a href="#" id="msbo"><i class="ic fa fa-bars"></i></a>
       </div> -->
	   
	<a href="../TrangChu/Index" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none" style="margin-left: 8px; margin-right: 8px;">
	<img id="logo" src="https://shopfront-cdn.tekoapis.com/static/phongvu/logo-full.svg" loading="lazy" decoding="async" alt="phongvu" style="width: 100%; height: 35px;">
	</a>
	<div class="dropdown">
    <button type="button" id="category" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" style="display:none;">
      Danh mục sản phẩm
    </button>
    <ul class="dropdown-menu">
      
    <?php $result1 = ($this->loaisanpham->DanhSach1()); ?>
        <?php for ($i = 0; $i < count($result1); $i++) { ?>
          <li><a class="dropdown-item" href="./DanhSachSanPham&loaisp=<?=$result1[$i]['ID']?>">
            <div class="img">
             <i class="fa fa-laptop" aria-hidden="true"><?=$result1[$i]['TenLoaiSanPham']?></i>
            </div>
          </a></li>
          
     <?php } ?>
    </ul>
</div>
		<div class="search-container" style="margin-left: 8px; margin-right: 20px;">
          <form action="/search">
            <div class="input-group">
              <input type="text" placeholder="Tìm kiếm sản phẩm..." class="form-control" style="width: 400px;">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>



				<div style="margin-left: 8px; margin-right: 8px;">
          <?php if (isset($_SESSION['user'])){?>
            <button href="#" class="btn btn-primary me-2" data-bs-toggle="dropdown">
              <i class="far fa-user-circle" aria-hidden="true"></i> 
              <span style="margin-left: 3px; color: #fff;">
                  <?= $_SESSION['user'];?>
              </span>
            </button>
            <ul class="dropdown-menu fs-6">
              <li><a class="dropdown-item " href="../TrangChu/ThongTinTaiKhoan">
                <i class="fa fa-user-circle me-2" aria-hidden="true"></i>
                Thông tin</a>
              </li>
              <hr>
              <li><a class="dropdown-item" href="../TrangChu/DangXuat"  aria-hidden="true">
                <i class="fa fa-sign-out me-2" aria-hidden="true"></i>
                Đăng xuất</a>
              </li>
              
            </ul>
          <?php }else{?>
            <a href="../TrangChu/DangNhap" class="btn btn-primary me-2">
              <i class="far fa-user-circle" aria-hidden="true"></i> 
              <span style="margin-left: 3px; color: #fff;">
                Đăng nhập
              </span>
            </a>
          <?php }?>

 
			</div >
      <div class="cart ms-auto" style="margin-left: 8px;">
        <button class="btn btn-outline-secondary">
          <i class="fas fa-shopping-cart"></i> Giỏ hàng
          <span class="badge bg-danger" id="cartItemCount"></span>
        </button>
      </div>

      <script>
  $(document).ready(function() {
  $('.cart button').click(function() {
    window.location.href = '../TrangChu/GioHang';
  });
});

function updateCartItemCount() {
// Lấy dữ liệu giỏ hàng từ Local Storage
var cartData = JSON.parse(localStorage.getItem('cart'));
// Kiểm tra nếu cartData tồn tại và có các sản phẩm trong giỏ hàng
if (cartData && cartData.length > 0) {
  var cartItemCountElement = document.getElementById('cartItemCount');
  // Lấy số lượng sản phẩm từ giỏ hàng
  var cartItemCount = cartData.reduce(function(total, product) {
    return total + product.Quantity;
  }, 0);
  
  // Cập nhật số lượng vào thẻ span
  cartItemCountElement.innerText = cartItemCount;
} else {
  // Nếu không có sản phẩm trong giỏ hàng, ẩn thẻ span
  cartItemCountElement.innerText = 0;
}
}
updateCartItemCount();
var addToCartButton = document.getElementById("addcart");
addToCartButton.addEventListener("click", function() {
  updateCartItemCount();
});
</script> 
  
    </div>
    </div>
	</header>
 