<?php
// extends controller là kế thừa lớp Controller để hiểu đc model bên dưới 
// controllers là trung gian để kết hợp model với view 
// để gọi vào action của Home 
class Home extends Controller{
    // Các hàm là các action

    function Show(){
        if($this->validation()){
            $hanghoa = $this->model("HangHoaModel");
            $nhaphanphoi = $this->model("NhaPhanPhoiModel");

            $this->view("TrangChu",[
            "page"=>"QuanLyView",
            "result1"=>$hanghoa->HangHoa_Show(),
            "result2"=>$nhaphanphoi->NhaPhanPhoi_Show()
        ]);
        }
        else{
            $this->invalid();
        }
        
    }
}
?>


<!-- Lỗi Uncaught TypeError: call_user_func_array(): Argument -->
<!-- Thì thêm static trước function hoặc file app thêm new -->