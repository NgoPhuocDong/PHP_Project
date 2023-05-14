<?php 
$pdf = new tFPDF();

// Thêm một trang mới
$pdf->AddPage();

// Thiết lập các thông số định dạng và kiểu chữ
// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('times','B',20);
$pdf->SetFillColor(193,229,252);
$pdf->Write(10, 'LapTop HP');
$pdf->Ln(25);

$pdf->SetFont('DejaVu','',12);
$pdf->Write(10, 'Địa chỉ nhận hàng');  
$pdf->Ln(10);

$pdf->SetFont('DejaVu','',10);
foreach ($resultKhachHang as $row) : extract($row);
$pdf->Cell(0, 10, 'Tên khách hàng: '.$row['TenKhachHang'], 0, 1);
$pdf->Cell(0, 10, 'Số điện thoại: '.$row['SoDienThoai'], 0, 1);
$pdf->Cell(0, 10, 'Mail: '.$row['Email'], 0, 1);
$pdf->Cell(0, 10, 'Địa chỉ cụ thể: '.$row['DiaChi'], 0, 1);
$pdf->Ln(10);
endforeach;

$pdf->SetXY(400, 45);
foreach ($resultDonHang as $row) : extract($row);

$pdf->Cell(0, 10, 'Mã đơn hàng: #'.$row['ID'], 0, 1, 'R');
$pdf->Cell(0, 10, 'Ngày đặt: '.date('d-m-Y',strtotime($row['NgayLap'])), 0, 1, 'R');

endforeach;
$pdf->Ln(30);


$width_cell = array(18,70,20,30,50);
$pdf->Cell($width_cell[0],10,'STT',1,0,'C',true);
$pdf->Cell($width_cell[1],10,'Tên sản phẩm',1,0,'C',true);
$pdf->Cell($width_cell[2],10,'Số lượng',1,0,'C',true);
$pdf->Cell($width_cell[3],10,'Đơn giá',1,0,'C',true);
$pdf->Cell($width_cell[4],10,'Thành tiền',1,0,'C',true);
$pdf->SetFillColor(235,236,236);
$fill = false;
$pdf->Ln(10);

if(!empty($result)):
    $i = 0;
    foreach ($result as $row) : extract($row);$i++; ?>
    <?php 
    $pdf->Cell($width_cell[0],10,$i,1,0,'C',true);
    $pdf->Cell($width_cell[1],10,$row['TenSanPham'],1,0,'C',true);
    $pdf->Cell($width_cell[2],10,$row['SoLuong'],1,0,'C',true);
    $pdf->Cell($width_cell[3],10,number_format($row['DonGiaApDung'],0,'.', '.'),1,0,'C',true);
    $pdf->Cell($width_cell[4],10,number_format($row['ThanhTien'],0,'.', '.'),1,0,'C',true);
    $fill = !$fill;
    ?>
   
    <?php endforeach; endif; ?>
    <?php 
    $pdf->Ln(10);

    // In các thông tin đơn hàng
//     $posX = $pdf->getPageWidth() - 50; // Vị trí X, tính từ bên trái của trang
// $posY = $pdf->getPageHeight() + 100; // Vị trí Y, tính từ trên cùng của trang
// $width = 50; // Chiều rộng của vùng hiển thị
// $height = 10; // Chiều cao của vùng hiển thị
 ?>
<?php foreach ($resultDonHang as $row) : extract($row);
$pdf->SetXY(500, 125);
$pdf->Cell(0, 10, 'Tổng tiền:                       '.number_format($row['TongTien'],0,'.', '.'), 0, 0, 'R');
endforeach; ?>
<?php
// Xuất file PDF
$pdfName = 'C:/Users/phucn/Downloads/donhangban_' . date('Ymd_His') . '.pdf';
$test = $pdf->Output($pdfName, 'F');
if($test =="") {
    $_SESSION['nn'] = "In đơn hàng thành công.";
    header("Location: ./DanhSach&id=".$_GET['id']);
}
$mail = new Mailer();
$mail->sendPDF('phucn1435@gmail.com',$pdfName);  

?> 


    
   
     