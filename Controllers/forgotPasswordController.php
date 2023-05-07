<?php
include("Models/forgotPassword.php");

class forgotPasswordController{
    private $model;
    private $db;
    public $title;
    public $content;
    // public $maildh;
    
    public function __construct(){
        $this->model = new changePassword();
        $this->db = new Database();
    }

    public function pageForgot(){
        include("Views/forgotPassword/forgotPassword.php");
    }

    public function pageConfirm() {
        include("Views/forgotPassword/confirm.php");
    }

    public function pageChange() {
        include("Views/forgotPassword/changePassword.php");
    }

    public function Update(){  
        $email = $_SESSION['email'];        
        //lấy dữ liệu cần cập nhật
        
        $update = $this->model->CapNhatMatKhau($email, $_POST['newPassword']);
        if ($update) {
            header('Location: ./changePw');
        }  
    }

    public function forgotPassword() {
        header("Location: ./pageForgot");
       
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if(isset($_POST['submitForgot'])) {
                header("Location: ./pageConfirm");
            }
        }
    }   

    public function linkEmail(){
        header("Location: ./pageConfirm");
        $title = "Đừng chia sẻ mã xác nhận này cho bất kì ai. Mã xác nhận của bạn là: ";
        $content = (rand(100000,999999));
        $_SESSION['Token'] = $content;
        
        $mail = new Mailer();
        $mail->mailToken($title, $content, $_SESSION['email']);
    }

    public function verifyToken() {
        if (isset($_POST['submitToken'])) {
            if (empty($_POST['confirmToken'])) {
                $_SESSION['error'] = "Hãy nhập mã xác nhận.";
                header("Location: ./pageConfirm");          
            } elseif ((int)$_SESSION['Token'] === (int)$_POST['confirmToken']) {
                unset($_SESSION['error']);
                header("Location: ./pageChange");
            } else {
                $_SESSION['error'] = "Sai mã xác nhận.";
                header("Location: ./pageConfirm");          
            }
        }
    }

    public function changePw() {
        header("Location: ./pageChange");
        $password = $_POST['newPassword'];
        $rePassword = $_POST['reNewPassword'];
        if (isset($_POST['submitChangePw'])) {
            if (empty($password) || empty($rePassword)) {
                unset($_SESSION['success']);
                $_SESSION['error'] = "Không được để trống.";
            } elseif ($password === $rePassword) {
                if (strlen(trim($password)) < 8) {
                    unset($_SESSION['success']);
                    $_SESSION['error'] = "Mật khẩu phải từ 8 kí tự trở lên.";
                } else {
                    $this->Update();
                    unset($_SESSION['error']);
                    $_SESSION['success'] = "Đổi mật khẩu thành công.";
                }
            } else {
                unset($_SESSION['success']);
                $_SESSION['error'] = "Đổi mật khẩu không thành công.";
            }
        }

        if (isset($_POST['submitReturn'])) {
            header("Location: ../Home/returnHome");
        }
    }
}
?>
