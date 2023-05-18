<?php
class Database{
    private $host="localhost";
    private $username="root";
    private $password="";
    private $database="quanlymaytinh";
    public $conn;
    private $result;

    //hàm kết nối
    public function __construct(){
        $this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        //kiểm tra đã kết nối thành công chưa
        if (mysqli_connect_error())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }
    
    //lấy dữ liệu
    public function select($sql)
    {
        $data = null;
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    //
    public function selects($sql)
    {
        $result = $this->conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
        return [];
    }
   

    // hàm truy vấn: thêm sửa xóa
    public function execute($sql)
    {
        //$result = $this->conn->query($sql);
        $result = mysqli_query($this->conn,$sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($table,$id){
        $sql = "DELETE FROM $table WHERE id = '$id'";
        $result = $this->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function find($table,$id)
    {
        $sql = "SELECT * FROM $table WHERE ID = '$id'";
        $result = $this->select($sql);
        return $result;
    }

    public function findEmail($table,$email){
        $sql = "SELECT * FROM $table where email = '$email'";
        $result = $this->select($sql);
        return $result;
    }

}
