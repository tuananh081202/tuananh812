<?php
// controller là trung gian để lấy ra model và view
class Controller{
    
    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }
// $data hứng dữ liệu mà view đổ về
    public function view($view, $data=[]){
        require_once "./mvc/views/".$view.".php";
    }
    public function validation(){
        if(isset($_SESSION['role'])){
            return true;
        } 
        return false;
    }
    public function invalid()
    {
        $this->view("Login",[
            "page"=>"dangnhap",
            "message"=>"Vui lòng đăng nhập",
            "user"=>"",
            "pass"=>""
        ]);
    }
    public function check_admin_role(){
        if($_SESSION['role'] == 2)return false;
        else return true;
    }
    public function return_home(){
        $hanghoa = $this->model("HangHoaModel");
        $nhaphanphoi = $this->model("NhaPhanPhoiModel");

        $this->view("TrangChu",[
        "page"=>"QuanLyView",
        "result1"=>$hanghoa->HangHoa_Show(),
        "result2"=>$nhaphanphoi->NhaPhanPhoi_Show()
    ]);
    }

}
?>
