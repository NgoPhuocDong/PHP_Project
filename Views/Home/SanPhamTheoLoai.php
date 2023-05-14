<?php
    include "./Views/HomeLayout/header.php";
    echo "<title>Danh sách sản phẩm theo loại sản phẩm</title>";
?>
<script>
  
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
<!DOCTYPE html>
<html>
<head>
  <!-- Thêm các đường dẫn tới tệp CSS và JavaScript cần thiết -->
  <link rel="stylesheet" href="path/to/bootstrap.css">
  <script src="path/to/bootstrap.js"></script>
</head>
<body>
<section class="py-5">
  <ul class="container">
    <div class="row">
    <?php
      $result = $this->DanhSachSanPham();
      if (is_array($result) || is_object($result)) {
        foreach ($result as $row) {
          ?>
          <li class="col-md-3 list-unstyled" style="height: 450px;">
            <div class="card">
            <div class="" style="height:270px; width: auto; padding: 1rem;">
                <img src="../Assets/data/HinhAnhSanPham/<?= $row['HinhAnh'] ?>"  style="width:90%; height:90%;" alt="<?= $row['TenSanPham'] ?>">
              </div>
              <div class="card-body">
                <h5 class="card-title" style="font-size: 18px; font-weight: normal; height: 54px;"><?= $row['TenSanPham'] ?></h5>
                <b><small class="text-primary" style="font-weight: bold; font-size: 15px;"><?= number_format($row['Gia'], 0, ',', '.') ?> VNĐ</small></b>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="submit" name="add-to-cart" id="addcart" class="btn btn-sm btn-outline-secondary add-to-cart" onclick="cartClass.AddItem(<?= $row['ID'] ?>,'<?= $row['TenSanPham'] ?>','../Assets/data/Hinhanhsanpham/<?= $row['HinhAnh'] ?>',<?= $row['Gia'] ?>,1,' VNĐ')">Thêm vào giỏ hàng</button>                  
                    <a href="../TrangChu/ChiTietSanPham&id=<?=$row['ID']?>" class="btn btn-sm btn-outline-secondary">Xem chi tiết</a>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <?php
        }
      }
    ?>
    </div>
  </ul>
</section>
</body>
</html>
<?php
    include "./Views/Layout/footer.php";
?>