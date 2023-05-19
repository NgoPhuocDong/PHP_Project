<?php
// Nhận dữ liệu năm từ yêu cầu Ajax
if (isset($_POST['year'])) {
    $year = $_POST['year'];
    $chartHtml = "<div>Biểu đồ thống kê theo tháng thuộc năm $year</div>";
    $chartHtml .= "<div id='chart'></div>";
    
    // Trả về dữ liệu biểu đồ dưới dạng HTML
    echo $chartHtml;
} 


// Xử lý và truy vấn dữ liệu thống kê từ cơ sở dữ liệu hoặc nguồn dữ liệu khác dựa trên năm

// Ví dụ: Tạo đoạn mã HTML cho biểu đồ

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<canvas id="myChart5" style="margin-top: 20px;width:100%;max-width:600px; "></canvas>

<?php $truycapthang = $this->login->TongTruyCapTheoThang($year);
?>

<script>

var xValues = [
  <?php foreach($truycapthang as $row) : extract($row) ?>
    <?= $row['Thang']."," ?>
    <?php endforeach;?>
];
var yValues = [
  <?php foreach($truycapthang as $row) : extract($row) ?>
    <?= $row['tongphien']."," ?>
    <?php endforeach;?>
];

var zValues = [
  <?php foreach($truycapthang as $row) : extract($row) ?>
    <?= $row['tongnguoi']."," ?>
     <?php endforeach;?>
];


var barColors = ["red", "green","blue","orange","brown","violet"];  

new Chart("myChart5", {
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

