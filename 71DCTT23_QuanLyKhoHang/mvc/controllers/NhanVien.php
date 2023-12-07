<?php
    class NhanVien extends Controller{
        private $nv;
        function __construct(){
            $this->nv = $this->model("NhanVienModel");
        } 
        function Show(){
            if($this->validation()){
                if($this->check_admin_role())//check quyền của nhân viên hoặc admin nếu role=2 là nhân viên ,role=1 là quản trị viên
                {
                    $this->view("TrangChu",[
                        "page"=>"NhanVienView",
                        "result"=>$this->nv->nhan_vien_view()//nó sẽ sổ ra trang chủ nhân viên
                    ]);
                }
                else $this->return_home();
            }
        else{
            $this->invalid();
        }
        }
        function Create()
        {
            if($this->validation()){
                if($this->check_admin_role())
                {
                $this->view("TrangChu",[
                "page"=>"AddNhanVienView"
                ]);
            }
        else $this->return_home();

        }
        else{
            $this->invalid();
        }
        }
        function New(){
            if($this->validation()){
                if($this->check_admin_role())
                {
            if(isset($_POST['btnthem'])){
                $user = $_POST['user'];
                $pass= $_POST['pass'];
                $role = $_POST['role'];
                $valid = $this->nv->user_valid($user);
                if($valid){
                    $this->nv->add_nhan_vien($user,$pass,$role);
                    $this->view("TrangChu",[
                        "page"=>"NhanVienView",
                        "message"=>"Thêm thành công !!!",
                        "result"=>$this->nv->nhan_vien_view()
                    ]); 
                }
                else{
                    $this->view("TrangChu",[
                        "page"=>"AddNhanVienView",
                        "err"=>"Tên đăng nhập đã tồn tại !!!",
                        "user"=> $user,
                        "pass"=> $pass,
                        "role"=> $role,
                    ]); 
                }
                
            }
        }
        else $this->return_home();
        }
        else{
            $this->invalid();
        }
        }
        
        function Update()
        {
            if($this->check_admin_role())
                {
            if($this->validation()){
            if(isset($_POST['sua'])){
                $user = $_POST['user'];
                $pass= $_POST['pass'];
                $role = $_POST['role'];
                if(strcmp($_POST['old'],$user) != 0){//strcmp là hàm để so sánh 2 chuỗi phân biệt chữ hoa hay thường
                    $valid = $this->nv->user_valid($user);
                }
                else $valid = true;
                if($valid){
                    $old = $_POST['old'];
                    $this->nv->edit($user,$pass,$role,$old);
                    $this->view("TrangChu",[
                        "page"=>"NhanVienView",
                        "message"=>"Sửa thành công !!!",
                        "result"=>$this->nv->nhan_vien_view()
                    ]); 
                }
                else{
                    $this->view("TrangChu",[
                        "page"=>"EditNhanVienView",
                        "err"=>"Tên đăng nhập đã tồn tại !!!",
                        "user"=> $user,
                        "pass"=> $pass,
                        "role"=> $role,
                        "old"=>$_POST['old']
                    ]); 
                }    
            }
        }
        else $this->return_home();
        }
        else{
            $this->invalid();
        }
        }
        function Delete($user)
        {
            if($this->check_admin_role())
                {
            if($this->validation()){
            $this->nv->delete($user);
                $this->view("TrangChu",[
                "page"=>"NhanVienView",
                "message"=>"Xóa thành công !!!",
                "result"=>$this->nv->nhan_vien_view()
            ]); 
        }
        else $this->return_home();
        }
            else{
                $this->invalid();
            }
        }
        function Edit($user)
        {
            if($this->check_admin_role())
                {
            if($this->validation()){
            $this->view("TrangChu",[
                "page"=>"EditNhanVienView",
                "result"=>$this->nv->get_user_by_id($user)
            ]); 
        }
        else $this->return_home();
        }
        else{
            $this->invalid();
        }
        }
        function Filter()
        {
            if($this->check_admin_role())
                {
            if($this->validation()){
            if(isset($_POST['role']) && $_POST['role'] != 0)//isset nó kiểm tra xem biến có tồn tại hay không
            {
                $this->view("TrangChu",[
                    "page"=>"NhanVienView",
                    "ketqua"=>$this->nv->loc_tai_khoan($_POST['role'])
                ]);
            }
            else{
                $this->view("TrangChu",[
                    "page"=>"NhanVienView",
                    "ketqua"=>$this->nv->nhan_vien_view()
                ]);
            }
        }
        else $this->return_home();
        }
        else{
            $this->invalid();
        }
        }
    }
?>