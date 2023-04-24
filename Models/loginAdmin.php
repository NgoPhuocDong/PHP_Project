<?php
    require_once("Assets/mail/sendmail.php");
?>
<?php
    class loginAdmin1{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }
    
        public function loginAdmin($username,$password,$email){
            $username = mysqli_real_escape_string($this->db->conn, $username);
            $password = md5(mysqli_real_escape_string($this->db->conn, $password));
            if(empty($username) || empty($password)) {
                $alert = "<span style='color: red;'>Không được để trống.</span>";
                return $alert;
            } else {
                $query = "SELECT * FROM taikhoanadmin WHERE username='$username' AND password='$password' LIMIT 1";
                $result = $this->db->select($query);
                if($result) {
                    $_SESSION['dangnhap'] = $username;
                    $_SESSION['dangki'] = $password;
                    $_SESSION['email'] = $email;
                    header("Location: ./Trangchu");
                } else {
                    $alert = "<span style='color: red;'>Đăng nhập thất bại.</span>";
                    return $alert;
                }
            }
        }

        public function forgotAdmin($email) {
            $email = mysqli_real_escape_string($this->db->conn, $email);
            if(empty($email)) {
                $alert = "<span style='color: red;'>Không được để trống.</span>";
                return $alert;
            } else {
                $query = "SELECT * FROM taikhoanadmin WHERE email='$email' LIMIT 1";
                $result = $this->db->select($query);
                if($result) {
                    header("Location: ./linkEmail");
                } else {
                    $alert = "<span style='color: red;'>Email này không tìm thấy.</span>";
                    return $alert;
                }
            }
        }
    }  
?>