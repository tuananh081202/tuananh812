<?php
    class NhaPhanPhoi extends Controller{
        
        function Show(){
            if($this->validation()){
            $nhaphanphoi = $this->model("NhaPhanPhoiModel");
            $this->view("TrangChu",[
                
                "page"=>"NhaPhanPhoiView",
                "result"=>$nhaphanphoi->NhaPhanPhoi_Show()
            ]);
        }
        else{
            $this->invalid();
        }
        }   
        
        
        function TimKiemNhaPhanPhoi(){
            if($this->validation()){
            $nhaphanphoi = $this->model("NhaPhanPhoiModel");
            if(isset($_POST['search'])){
                
                $search=$_POST['search'];
                $kq=$nhaphanphoi->NhaPhanPhoi_Find($search);
                $this->view('TrangChu',[
                    'page'=>'NhaPhanPhoiView',
                    'result'=>$nhaphanphoi->NhaPhanPhoi_Show(),
                    'ketqua'=>$kq
                ]);
            }
        }
        else{
            $this->invalid();
        }
        }

        function Sua_NhaPhanPhoi($id_manpp){
            if($this->validation()){
            $nhaphanphoi = $this->model("NhaPhanPhoiModel");
            $this->view("TrangChu",[
                "page"=>"SuaNhaPhanPhoi",
                "ketqua"=>$nhaphanphoi->NhaPhanPhoi_Find($id_manpp)
            ]);
        }
        else{
            $this->invalid();
        }
        }
        function XuLySua_NhaPhanPhoi() {
            if($this->validation()){
            $nhaphanphoi = $this->model("NhaPhanPhoiModel");
            if(isset($_POST['btnthem'])){ //khởi tạo button
                $manpp = $_POST['txtma'];
                $tennpp = $_POST['txtten'];
                $kq=$nhaphanphoi->NhaPhanPhoi_Upd($manpp,$tennpp);
                if($kq){
                    $this->view("TrangChu",[
                        "page"=>"SuaNhaPhanPhoi",
                        "check"=>"true"
                    ]);
                }
            }
        }
        else{
            $this->invalid();
        }
        }

        function Them_NhaPhanPhoi(){
            if($this->validation()){
            $this->view("TrangChu",[
                "page"=>"ThemNhaPhanPhoi"
            ]);
        }
        else{
            $this->invalid();
        }
        }
        function XuLyThem_NhaPhanPhoi() {
            if($this->validation()){
            $nhaphanphoi = $this->model("NhaPhanPhoiModel");
            if(isset($_POST['btnthem'])){
                $manpp = $_POST['txtma'];
                $tennpp = $_POST['txtten'];
                $kq=$nhaphanphoi->checktrungManpp($manpp);
                if(!$manpp  || !$tennpp) {
                    $this->view("TrangChu",[
                        "page"=>"ThemNhaPhanPhoi",
                        "err"=>"*Không được để trống !!!",
                        "manpp"=> $manpp,
                        "tennpp"=> $tennpp
                    ]);
                } else if($kq) {
                    $this->view("TrangChu",[
                        "page"=>"ThemNhaPhanPhoi",
                        "err"=>"*Mã nhà phân phối bị trùng !!!",
                        "manpp"=> $manpp,
                        "tennpp"=> $tennpp
                    ]); 
                } else {
                    $add = $nhaphanphoi->NhaPhanPhoi_Ins($manpp,$tennpp);
                    if($add) {
                        $this->view("TrangChu",[
                            "page"=>"ThemNhaPhanPhoi",
                            "manpp"=> $manpp,
                            "tennpp"=> $tennpp,
                            "check"=>"true"
                        ]);
                    }
                }
            }
        }
        else{
            $this->invalid();
        }
        }

        function Xoa_NhaPhanPhoi($manpp){
            if($this->validation()){
            $nhaphanphoi = $this->model("NhaPhanPhoiModel");
            $kq = $nhaphanphoi->NhaPhanPhoi_Del($manpp);
                $this->view("TrangChu",[
                    "page"=>"NhaPhanPhoiView",
                    'result'=>$nhaphanphoi->NhaPhanPhoi_Show()
                ]);
            }
            else{
                $this->invalid();
            }
        }
    
    }
?>