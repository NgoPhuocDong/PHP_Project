<?php
    include "./Views/HomeLayout/header.php";
  
?>

  <script>
  window.addEventListener('scroll', function() {
    var header = document.getElementById('main-header');
    var logo = document.getElementById('logo');
    if (window.pageYOffset > 150) {
      header.classList.add('scrolled');
      logo.setAttribute('src', 'https://shopfront-cdn.tekoapis.com/static/phongvu/logo.svg');
      
    } else {
      header.classList.remove('scrolled');
      logo.setAttribute('src', 'https://shopfront-cdn.tekoapis.com/static/phongvu/logo-full.svg');
      
  }
});
const menuButton = document.getElementById('category');

window.addEventListener('scroll', () => {
  if (window.pageYOffset > 150) {
    menuButton.style.display = 'block';
    
  } else {
    menuButton.style.display = 'none';
    
  }
});

var cartClass = {
  Get: function() {
    var sIDSP = [];
    if(localStorage.getItem("cart") !== null ) {
      sIDSP = localStorage.getItem("cart");
    }else {
      localStorage.setItem("cart","[]");
      sIDSP = localStorage.getItem("cart");
    }
    var arr = JSON.parse(sIDSP);
    return arr;
  },
  Set: function(arr) {
    var jsonIDSP = JSON.stringify(arr);
    localStorage.setItem("cart",jsonIDSP);
  },
  AddItem: function(id, name, image, price, quantity, total) {
    var arr = cartClass.Get();
    
    var objIncIndex = arr.findIndex(obj => obj.ID == id);
    if (objIncIndex !== -1) {
      alert('Sản phẩm đã có trong giỏ hàng!');
      return;
    }
    var newID = {
      ID: id,
      Name: name,
      Image: image,
      Price: price,
      Quantity: quantity,
      Total: total
    }
    
    arr.push(newID);
    //set lại
    cartClass.Set(arr);

    alert('Đã thêm sản phẩm vào giỏ hàng !');
  }
}





  </script>

	
 
  <!-- Page content holder -->
<div class="page-content" id="content">
  <!-- Toggle button -->
  <!-- <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-3 mb-4"><i class="fa fa-bars mr-1"></i></button>
  <h2 class="display-4 text-white">Bootstrap vertical nav</h2> -->
  
		<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-interval="1000" data-wrap="true">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://lh3.googleusercontent.com/DeuDtvSXQ6vfWsXmcHkut5jy3q499znlciy3442mAjVIub_D_5AO4_DTPGXqCYALnoBIPlN_yh19vkMLFu_f8DsPZVQs-CHd=w1920-rw" class="d-block" alt="..." style="height: 566px; width: 100%; object-fit:cover;">
        </div>
        <div class="carousel-item">
          <img src="https://lh3.googleusercontent.com/zK0EzIVjDqm1rEJ42vvagt5lyaxe6LaUh2mykIYXGebsX9X4mdkIKUGdO6MDH1mF_eJNNYNk8LTRilXFpbEXa7vl7ZBSMvyE=w1920-rw" class="d-block " alt="..." style="height: 566px; width: 100%;object-fit:cover;">
        </div>
        <div class="carousel-item">
          <img src="https://lh3.googleusercontent.com/vkMMX2cvl_1ii0c_vw5TGy4ixhRc-l7OlMWnmx4-oxquqHo_A9aET_lWxDmxbh-GMZTr3O5JS4kGNa0Ka7hcctxo2lj0xoUR=w1920-rw" class="d-block " alt="..." style="height: 566px; width: 100%;object-fit:cover;">
        </div>
        <div class="carousel-item">
          <img src="https://lh3.googleusercontent.com/FXs0Avw0ggc2aVTIpcirJCIcA21CgXg0Y90mtKkftwmy7KRRcQhU7wcmyLw6q1pKDCvBkyQVgwZg7hywsJlN11TCJQB12Oem=w1920-rw" class="d-block " alt="..." style="height: 566px; width: 100%;object-fit:cover;">
        </div>
        <div class="carousel-item">
          <img src="https://lh3.googleusercontent.com/Ym2L-ifBhFUbfp8uuS2APzVmHVoXzR5GsFmZHL7Fenz_zaIurMDPq5CDHDKVZemCZovIadalAvoKHonyvgB3TkTj8J38sHXX=w1920-rw" class="d-block " alt="..." style="height: 566px; width: 100%;object-fit:cover;">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
		<img src="/PHP_Project/Assets/data/Hinhanhsanpham/" alt="">


	<!-- Sản phẩm nổi bật -->
	<section class="py-5 ">
	<div class="container bgproduct" style="border-bottom: 1px solid rgba(255, 255, 255, 0.5);">
		<div style=" height:3.5rem; width:auto; border-bottom: 1px solid rgba(255, 255, 255, 0.5); align-items:center;padding:0;">
		<b style="font-size: 20px; color:white;">Laptop</b>
	</div>



	
	<div class="glide product" style="padding-top:8px">
    <div class="glide__track" data-glide-el="track">
    <ul class="glide__slides">
    
    <?php
      if(!empty($result)):
        if (isset($_GET['page']) && $_GET['page'] == $current || isset($_GET['tensanpham'])) {
     } 
      foreach ($result as $row) : extract($row)?> 
        <li class="glide__slide">
          <div class="card" style="height: 450px; ">
            <div style="height:270px; width: auto; padding: 1rem;">
              <img src="../Assets/data/HinhAnhSanPham/<?= $row['HinhAnh'] ?>"  style="width:auto; height:auto;" alt="<?= $row['TenSanPham'] ?>">
            </div>
            <div class="card-body">
              <h5 class="card-title" style="font-size: 18px; font-weight: normal; height: 54px;" ><?= $row['TenSanPham'] ?></h5>
              <b><small class="text-primary" style="font-weight: bold; font-size: 15px;" > <?= number_format($row['Gia'], 0, ',', '.') ?> VNĐ</small></b>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
              
              <button type="submit" name="add-to-cart" id="addcart"
                class="btn btn-sm btn-outline-secondary add-to-cart" 
                  onclick="cartClass.AddItem(<?= $row['ID'] ?>,'<?= $row['TenSanPham'] ?>','../Assets/data/Hinhanhsanpham/<?= $row['HinhAnh'] ?>',<?= $row['Gia'] ?>,1,' VNĐ')">Thêm vào giỏ hàng</button>
            
                  <button type="button" class="btn btn-sm btn-outline-secondary">Xem chi tiết</button>
                </div>
              </div>
            </div>
          </div>
        </li>
      <?php endforeach; endif; ?>

	</ul>
	</div>
	<!-- Các nút điều khiển -->
	<div class="glide__controls" data-glide-el="controls">
      <div class="glide__control glide__control--left" data-glide-dir="<">
        <i class="fa fa-angle-left"></i>
      </div>
      <div class="glide__control glide__control--right" data-glide-dir=">">
        <i class="fa fa-angle-right"></i>
      </div>
</div>
<div class="glide__view-all">
  <a href="google.vn"><button class="glide__view-all-btn">Xem tất cả sản phẩm</button></a>
</div>
	
	
</div>
	</div>
</section>





<!-- Thương hiệu nổi bật -->
<section class="py-5 ">
		<div class="container bgbrand" >
		<div style=" height:3rem; align-items:center;padding:0;">
		<b style="font-size: 20px; color:black;">Thương hiệu nổi bật</b>
	</div>
	<div class="brand" >
	<div class="glide brands" style="overflow:hidden; ">
  <div class="glide__track" data-glide-el="track">
    <ul class="glide__slides" style="border-radius:5px;position: relative;">
      <li class="glide__slide"><img width="271px" src="https://lh3.googleusercontent.com/IqFtu_Hq7dQkOuTjKwVTjKV5Z1qK3FsuX3yX6Ab30i_yXZ2B1dFs8uQwQ9zgTt3UZts3RnuYx-ujvQW0i5Ox2UDhrqxeehI=w400-rw">
	<strong><div class="brandtitle">Asus</div></strong>
	</li>
      <li class="glide__slide"><img width="271px" src="https://lh3.googleusercontent.com/s2A1-31VtturT9H1hX0UccGw7yGufXD2NZFJkiNt-tTCx2xZO80lCt21b8oY3AYWmi3aUuMQIIySp623gbQoN22Wm_YvKvnB=w400-rw">
	  <b><div class="brandtitle">Lenovo</div></b>
	</li>
      <li class="glide__slide"><img width="271px" src="https://lh3.googleusercontent.com/4YXRxEqxqmoY8EPliJtNkbcqQCUe4TPTJyAZ_MIsb8JStdwwf3PInwC0SABKuoZiHJC7dJY6Ex1JqS4bpKo=w400-rw">
	  <b><div class="brandtitle">HP</div></b>
	</li>
	  <li class="glide__slide"><img width="271px" src="https://lh3.googleusercontent.com/Y8Y_q1dMIBq4VaovFtS-eJvQ8oqyVUjIcdxZDKQBKHMBjEP7E2iU6GE10Sjq0AdLPlmTw0NGTBpnq34SlUnkFxCS3X3Nag4=w400-rw">
	  <b><div class="brandtitle">Microsoft</div></b>
	</li>
    </ul>
  </div>
  <div class="glide__controls" data-glide-el="controls">
      <div class="glide__control glide__control--left" data-glide-dir="<">
        <i class="fa fa-angle-left"></i>
      </div>
      <div class="glide__control glide__control--right" data-glide-dir=">">
        <i class="fa fa-angle-right"></i>
      </div>
</div>
  
</div>
	</div>
		</div>
</section>

<div class="page-content" style="padding-top: 70px;" id="content">

</div>
			<!-- Banner quảng cáo -->
<section class="py-5 bg-light">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6">
				<img src="https://cdn.tgdd.vn/2023/04/banner/acer-aspire-desk-2-1200x200.png" class="img-fluid" alt="banner">
			</div>
			<div class="col-md-6">
				<h2 class="fw-light">Giảm giá lớn!</h2>
				<p class="lead">Chỉ trong tuần này, giảm giá đến 50% cho một số sản phẩm.</p>
				<a href="#" class="btn btn-primary btn-lg">Mua ngay</a>
			</div>
		</div>
	</div>
</section>
<!-- Danh mục sản phẩm -->
<section class="py-5 ">
	<div class="container">
		<h2 class="fw-light mb-3">Danh mục sản phẩm</h2>
		<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
			<div class="col">
				<div class="card h-100">
					<img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/04/banner/xu-huong-laptop-gia-re-280x235-1.png" class="card-img-top" alt="category1">
					<div class="card-body">
						<h5 class="card-title">Laptop</h5>
						<p class="card-text">Mua laptop mới với nhiều mức giá khác nhau.</p>
						<a href="#" class="stretched-link"></a>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card h-100">
					<img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/04/banner/xu-huong-laptop-gia-re-280x235-1.png" class="card-img-top" alt="category1">
					<div class="card-body">
						<h5 class="card-title">Laptop</h5>
						<p class="card-text">Mua laptop mới với nhiều mức giá khác nhau.</p>
						<a href="#" class="stretched-link"></a>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card h-100">
					<img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/04/banner/xu-huong-laptop-gia-re-280x235-1.png" class="card-img-top" alt="category1">
					<div class="card-body">
						<h5 class="card-title">Laptop</h5>
						<p class="card-text">Mua laptop mới với nhiều mức giá khác nhau.</p>
						<a href="#" class="stretched-link"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="py-5" >
  <ul class="container">
    <div class="row">
    <?php
      foreach ($result as $row) : extract($row)?> 
        <li class="col-md-3 list-unstyled" style="height: 450px;">
          <div class="card">
            <div class="" style="height:270px; width: auto; padding: 1rem;">
              <img src="../Assets/data/HinhAnhSanPham/<?= $row['HinhAnh'] ?>"  style="width:90%; height:90%;" alt="<?= $row['TenSanPham'] ?>">
            </div>
            <div class="card-body">
              <h5 class="card-title" style="font-size: 18px; font-weight: normal; height: 54px;" ><?= $row['TenSanPham'] ?></h5>
              <b><small class="text-primary" style="font-weight: bold; font-size: 15px;" > <?= number_format($row['Gia'], 0, ',', '.') ?> VNĐ</small></b>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <button type="submit" name="add-to-cart" id="addcart" class="btn btn-sm btn-outline-secondary add-to-cart" onclick="cartClass.AddItem(<?= $row['ID'] ?>,'<?= $row['TenSanPham'] ?>','../Assets/data/Hinhanhsanpham/<?= $row['HinhAnh'] ?>',<?= $row['Gia'] ?>,1,' VNĐ')">Thêm vào giỏ hàng</button>                  
                <a href="../TrangChu/ChiTietSanPham&id=<?=$row['ID']?>" class="btn btn-sm btn-outline-secondary">Xem chi tiết</a>
                  <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Xem chi tiết</button> -->
                </div>
              </div>
            </div>
          </div>
        </li>
    <?php endforeach;?>
    </div>
  </ul>
</section>

<!-- Tin tức mới nhất -->
<section class="" style="margin-top:50px;">
	<div class="container">
		<h2 class="fw-light mb-3">Tin tức mới nhất</h2>
		<div class="row row-cols-1 row-cols-md-3 g-3">
      <div class="col">
				<div class="card shadow-sm">
					<img src="https://phongvu.vn/cong-nghe/wp-content/uploads/2023/04/game-sinh-ton-Badlanders-300x300.jpg" class="card-img-top" alt="news1">
					<div class="card-body">
						<h5 class="card-title">Phá đảo Badlanders: Game sinh tồn thế hệ mới do Viettel Media phát hành</h5>
						<p class="card-text"><?php echo substr("Trong làn sóng thoái trào của những tựa game bắn súng sinh tồn tại Việt Nam thì Badlanders lại nổi lên như một tựa game sinh tồn mobile",0,90) . "..." ?></p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-outline-secondary">Xem chi tiết</button>
							</div>
							<small class="text-muted">Ngày đăng: 28/04/2023</small>
						</div>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card shadow-sm">
					<img src="https://phongvu.vn/cong-nghe/wp-content/uploads/2023/04/apple-wwdc-2023-1-300x300.jpg" class="card-img-top" alt="news2">
					<div class="card-body">
						<h5 class="card-title">Dự đoán sự kiện WWDC 2023: Sẽ có MacBook và iMac mới?</h5>
						<p class="card-text"><?php echo substr("Apple mới đây đã có thông cáo báo chí về thời gian chính thức mà hãng sẽ tổ chức hội nghị các nhà phát triển gọi tắt là WWDC 2023 vào tháng 6 tới đây",0,90). "..." ?></p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-outline-secondary">Xem chi tiết</button>
							</div>
							<small class="text-muted">Ngày đăng: 26/04/2023</small>
						</div>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card shadow-sm">
					<img src="https://phongvu.vn/cong-nghe/wp-content/uploads/2023/04/asus-rog-strix-g18-300x300.jpg" class="card-img-top" alt="news3">
					<div class="card-body">
						<h5 class="card-title">Đánh giá siêu phẩm ASUS ROG Strix G18: Đắt nhưng xắt ra miếng</h5>
						<p class="card-text"> <?php echo substr("ASUS ROG Strix G18, chiếc laptop gaming đến từ nhà ASUS đã chiếm trọn mọi spotlight trong thời gian vừa qua của thế giới công nghệ hiện đã có mặt tại Phong Vũ với ưu đãi cực kỳ lớn.",0,90) . "..." ?></p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-outline-secondary">Xem chi tiết</button>
							</div>
							<small class="text-muted">Ngày đăng: 24/04/2023</small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
			<!-- Footer -->
      <div style="margin-top: 30px;">
        <?php
          include"Views/HomeLayout/footer.php";
        ?>
      </div>

<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
<script>
 new Glide('.brands', {
  type: 'carousel',
  perView: 4,
  autoplay: 2000,
  hoverpause: true,
  breakpoints: {
    992: {
      perView: 2
    },
    768: {
      perView: 1
    }
  }
}).mount();

new Glide('.product', {
  type: 'carousel',
  perView: 4,
  autoplay: 2000,
  
  hoverpause: true,
  breakpoints: {
    992: {
      perView: 2
    },
    768: {
      perView: 1
    }
  }
}).mount();


</script>
</body>
</html>