
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
    <title>Cửa hàng laptop</title>
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
</style>

<body>
  <header id="main-header" class="bg-white text-white" style="position: sticky;top: 0;z-index: 9999; box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1); ">
		<div class="container-fluid">
			<div id="row-middle" class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start" style="height: 88px; display:flex; row-gap: 16px;">
        <!-- <div style="padding-left: auto; padding-right: 8px; margin-right: 8px; ">
          <a href="#" id="msbo"><i class="ic fa fa-bars"></i></a>
       </div> -->
	   
	<a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none" style="margin-left: 8px; margin-right: 8px;">
	<img id="logo" src="https://shopfront-cdn.tekoapis.com/static/phongvu/logo-full.svg" loading="lazy" decoding="async" alt="phongvu" style="width: 100%; height: 35px;">
	</a>
	<div class="dropdown">
    <button type="button" id="category" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" style="display:none;">
      Danh mục sản phẩm
    </button>
    <ul class="dropdown-menu">
      <?php if(!empty($loaisanpham)):
        foreach ($loaisanpham as $row) : extract($row)?>
          <li><a class="dropdown-item" href="#">
            <div class="img">
              <i class="fa fa-laptop" aria-hidden="true"> HP</i>
            </div>
          </a></li>
      <?php endforeach; endif; ?>
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
					<button class="btn btn-primary me-2">
            <i class="fa fa-sign-in"></i> Đăng ký
            <div>
            Đăng nhập
            </div>
          </button>
          
          
			</div >
      <div class="cart ms-auto" style="margin-left: 8px;">
        <button class="btn btn-outline-secondary">
          <i class="fas fa-shopping-cart"></i> Giỏ hàng
          <span class="badge bg-danger" id="cartItemCount">0</span>
        </button>
      </div>

		</div>
	</header>