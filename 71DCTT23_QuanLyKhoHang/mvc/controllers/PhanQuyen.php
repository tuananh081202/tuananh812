<?php
    class PhanQuyen extends Controller{
        private $user;
        function __construct(){
             $this->user = $this->model("NguoidungModel");
        } 
        function Show()
        {
            $this->view("Login",[
                "page"=>"dangnhap"
            ]);
        }
        function Logout()
        {   //session là phiên làm việc
            session_unset();//cho tất cả các biến về rỗng
            session_destroy();//xóa tất cả các biến đc tạo bằng session-> trở về màn hình ban đầu
            $this->view("Login",[
                "page"=>"dangnhap"
            ]);
        }
        function Login_process()
        {
            if(isset($_POST['dangnhap']) && isset($_POST['user']) && isset($_POST['pass']))
            {
                $username = $_POST['user'];
                $pass = $_POST['pass'];
                $account = $this->user->check_account($username,$pass);
                if ($account==='0'){
                    $this->view("Login",[
                        "page"=>"dangnhap",
                        "user"=>$username,
                        "pass"=>$pass,
                        "message"=>"Tên đăng nhập hoặc mật khẩu không đúng !!!"
                    ]);
                }
                else{
                    while($row = mysqli_fetch_array($account)) {
                        $_SESSION['role'] = $row['Nguoidung_cap'];
                    }
                    $hanghoa = $this->model("HangHoaModel");
                    $nhaphanphoi = $this->model("NhaPhanPhoiModel");
                    $this->view("TrangChu",[
                        "page"=>"QuanLyView",
                        "result1"=>$hanghoa->HangHoa_Show(),
                        "result2"=>$nhaphanphoi->NhaPhanPhoi_Show()
                    ]);
                }
                
            }
            else{
                $this->view("Login",[
                    "page"=>"dangnhap",
                    "user"=>"",
                    "pass"=>"",
                    "message"=>"Tên đăng nhập hoặc mật khẩu không đúng !!!"
                ]);
            }
            
            
        }
    }
?>