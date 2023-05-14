<?php
    require_once("Assets/mail/sendmail.php");
?>
<?php
    class loginKhachHang{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function TaiKhoanActive($username,$password) {
            $query = "SELECT * FROM taikhoankhachhang as tk,khachhang as kh
            WHERE tk.IDKhachHang=kh.ID  AND
            TenDangNhap='$username' AND MatKhau='$password' AND TrangThai=1  LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }

        public function TaiKhoanNonActive($username,$password) {
            $query = "SELECT * FROM taikhoankhachhang as tk,khachhang as kh
            WHERE tk.IDKhachHang=kh.ID  AND
            TenDangNhap='$username' AND MatKhau='$password' AND TrangThai=0 LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
    
        public function loginAdmin($username,$password,$email){
            $username = mysqli_real_escape_string($this->db->conn, $username);
            $password = (mysqli_real_escape_string($this->db->conn, $password));
            $result = $this->TaiKhoanActive($username,$password);
            $result1 = $this->TaiKhoanNonActive($username, $password);
            if(empty($username) || empty($password)) {
                $alert = "<span style='color: red;'>Không được để trống.</span>";
                return $alert;
            } else {
                if($result) {
                    $query1 = "SELECT * FROM user_privilege INNER JOIN quyen ON user_privilege.privilege_id = quyen.ID WHERE user_privilege.user_id =".$result[0]['ID'];
                    $user_privilege = $this->db->select($query1);
                   
                    if(!empty($user_privilege)) {
                        $result['privileges'] = array();
                        foreach($user_privilege as $privilege) {
                            $result['privileges'][] = $privilege['duongdan'];
                        }
                    }
                    $_SESSION['user'] = $username;
                    $_SESSION['dangnhap1'] = $result; 
                    $_SESSION['dangki'] = $password;
                    $_SESSION['email'] = $email;
                    $_SESSION['avatar'] = $result[0]['AnhDaiDien'];
                    header("Location: ./Index");      
                } else if ($result1) {
                    $alert = "<span style='color: red;'>Tài khoản đã bị khóa.</span>";
                    return $alert;
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
                $query = "SELECT * FROM taikhoankhachhang as tk, khachhang as kh WHERE tk.IDKhachHang = kh.ID AND kh.email='$email' LIMIT 1";
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
<?php 
