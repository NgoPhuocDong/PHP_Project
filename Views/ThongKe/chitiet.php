<?php
    include "./Views/Layout/header.php";
    echo "<title>Thống kê</title>";
    include("Controllers/KiemTraQuyen.php");
?>
<?php
    unset($_SESSION['error']);
    unset($_SESSION['success']);
?>
<div class="col-md-12 mt-2 row">
    <span class="h3 m-2">Thống kê</span>
    <hr>
    <div class="card col-ml-25 bg-danger text-white">
        <h4 class="card-item">Sản phẩm</h4>
        <h2><?=$tongsanpham?></h2>
    </div>
    <div class="card col-ml-25 bg-primary text-white">
        <h4 class="card-item">Đơn hàng</h4>
        <h2><?=$tongdonhangban?></h2>
    </div>
    <div class="card col-ml-25 bg-warning text-white">
        <h4 class="card-item">Doanh Thu</h4>
        <?php $result = $this->donhangban->DoanhThuDonHangBan(); 
        $result1= $this->donhangmua->DoanhThuDonHangMua();
        ?>
        <h2><?=$result[0]['SUM(TongTien)']?></h2>
    </div>
    <div class="card col-ml-25 bg-success text-white">
        <h4 class="card-item">Lợi nhuận</h4>
        <h2><?=$test = $result[0]['SUM(TongTien)'] - $result1[0]['SUM(TongTien)']; ?></h2>
        <?php if ($test < 0) { echo "Chốt lỗ";
        } else {
          echo "Chốt lãi";
        } ?> 
    </div>
    <h2>Đồ thị</h2>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = [
  <?php foreach($thongkedonhangban as $row) : extract($row) ?>
    <?= date('"d-m-Y"', strtotime($row['NgayLap']))."," ?>
    <?php endforeach;?>
];
var yValues = [
  <?php foreach($thongkedonhangban as $row) : extract($row) ?>
    <?= $row['TongTien']."," ?>
    <?php endforeach;?>
];
var barColors = ["red", "green","blue","orange","brown","violet"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Thống kê doanh thu"
    }
  }
});
</script>

</div>
<style>
    .col-ml-25{
        width: 23%;
        margin: 10px;
        height: 100px;
        text-align: center;
    }
</style>