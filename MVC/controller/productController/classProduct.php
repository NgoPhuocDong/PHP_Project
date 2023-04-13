<!-- <?php   
    include("../../model/database.php");
    include("../../helpers/format.php");
?> -->
<?php
    class category{
        private $db;
        private $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
    
        public function insert_category($nameCate){
            $nameCate = $this->fm->validation($nameCate);
            $nameCate = mysqli_real_escape_string($this->db->link, $nameCate);
    
            if(empty($nameCate)) {
                $alert = "Can't empty";
                return $alert;
            } else {
                $query = "INSERT INTO loaisanpham(TenLoaiSanPham) VALUES ('$nameCate')";
                $result = $this->db->insert($query);
                if($result) {
                    $alert = "<span style='color: green;'>Success</span>";
                    return $alert;
                } else {
                    $alert = "<span style='color: red;'>Not Success</span>";
                    return $alert;
                }
            }
        }
    }

    
?>