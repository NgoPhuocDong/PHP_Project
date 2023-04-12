<?php
class Database{
    private $host="localhost";
    private $username="root";
    private $password="";
    private $database="quanlymaytinh";
    private $conn = NULL;
    private $result = NULL;

    //hàm kết nối
    public function connect(){
        $this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        //kiểm tra đã kết nối thành công chưa
        if (mysqli_connect_error())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }
    //hàm truy vấn
    public function execute($sql){
        $this->result = mysqli_query($sql,"SET NAMES 'utf8'");
        //$this->result = $this->conn->query($sql);
        return $this->result;
    }
    //hàm lấy dữ liệu
    public function getData(){
        if($this->result){
            $data = mysqli_fetch_array($this->result);
        }
        else{
            $data = 0;
        }
        return $data;
    }
    //hàm lấy toàn bộ dữ liệu (Danh sách)
    public function getAllData(){
        if(!$this->result){
            $data = 0;
        }
        else{
            while($datas = $this->getData()){
                $data[] = $datas;
            }  
        }
        return $data;
    }
    //hàm thêm dữ liệu
    public function insert($tenloaisanpham){
        $sql = "INSERT INTO loaisanpham(ID,TenLoaiSanPham) VALUES (null,'$tenloaisanpham')";
        return $this->execute($sql);
    }
    //hàm sữa dữ liệu
    public function update($table,$values,$id){
        $sql = "UPDATE $table SET $values() WHERE id = '$id'";
        return $this->execute($sql);
    }
    public function delete($id){
        $sql = "DELETE FROM thanhvien WHERE id = '$id'";
        return $this->execute($sql);
    }
}
