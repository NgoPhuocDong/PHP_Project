<?php 
$selectedYear = $_POST['year1'];
$selectedMonth = $_POST['month'];

// Thực hiện truy vấn SQL để lấy dữ liệu thống kê theo ngày thuộc năm và tháng
// Sử dụng $selectedYear và $selectedMonth trong truy vấn

// Xử lý dữ liệu và tạo biểu đồ
// Trả về mã HTML hoặc JavaScript để hiển thị biểu đồ

// Ví dụ đơn giản: Trả về một đoạn mã HTML đại diện cho biểu đồ
echo '<div id="chart">Biểu đồ thống kê theo ngày thuộc năm '.$selectedYear.' và tháng '.$selectedMonth.'</div>';
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<canvas id="myChart6" style="margin-top: 20px;width:100%;max-width:600px; "></canvas>

<?php $donhanghuy = $this->donhangban->TongDonHangBanHuyTheoNgay($selectedMonth,$selectedYear);
$donhangtc = $this->donhangban->TongDonHangBanThanhCongTheoNgay($selectedMonth,$selectedYear);
  ?>

<script>

var xValues = [
  <?php foreach($donhanghuy as $row) : extract($row) ?>
    <?= $row['ngay']."," ?>
    <?php endforeach;?>
];
var yValues = [
  <?php foreach($donhanghuy as $row) : extract($row) ?>
    <?= $row['tongdonhuy']."," ?>
    <?php endforeach;?>
];

var zValues = [
  <?php foreach($donhangtc as $row) : extract($row) ?>
    <?= $row['tongdontc']."," ?>
    <?php endforeach;?>
];

var barColors = ["red", "green","blue","orange","brown","violet"];  

new Chart("myChart6", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: yValues,
      borderColor: "red",
      fill: false
    }, 
    { 
      data: zValues,
      borderColor: "green",
      fill: false
    }, 
  ]
  },
  options: {
    legend: {display: false}
  }
});
</script>

