function ExportXLSX(fileName){
        if(confirm('Xác nhận xuất file Excel !')){
                /* Tạo trang tính từ HTML DOM TABLE */
                let wb = XLSX.utils.table_to_book(document.getElementById("TableToExport"));
                /* Xuất ra tệp (bắt đầu tải xuống) */
                XLSX.writeFile(wb, fileName+".xlsx", { bookType: 'xlsx' });
        }
        else{
                return false;
        }
}
