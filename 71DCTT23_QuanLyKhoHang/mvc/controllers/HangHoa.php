<?php
    class HangHoa extends Controller{
        // public $hanghoa;
        // function __construct()
        // {
        //     $this->hanghoa=$this->model('HangHoaModel');
        // }
        function Show(){
            if($this->validation()){
                $hanghoa = $this->model("HangHoaModel");//trỏ đến model hàng hóa

                $this->view("TrangChu",[
                    // Hiện ra from trang chủ và trang chủ line 40 lại gọi ra page HangHoaView
                    "page"=>"HangHoaView",
                    "result"=>$hanghoa->HangHoa_Show()
                ]);
            }
            else{
                $this->invalid();
            }
        }
        
        function TimKiemHangHoa(){
            if($this->validation()){
            $hanghoa = $this->model("HangHoaModel");
            if(isset($_POST['search'])){
                $search=$_POST['search'];
                $kq=$hanghoa->HangHoa_Find($search);
                $this->view('TrangChu',[
                    'page'=>'HangHoaView',
                    'result'=>$hanghoa->HangHoa_Show(),
                    'ketqua'=>$kq
                ]);
            }
            }
            else{
                $this->invalid();
            }
        }

        function Sua_HangHoa($id_mahh){
            if($this->validation()){
            $hanghoa = $this->model("HangHoaModel");
            $this->view("TrangChu",[
                "page"=>"SuaHangHoa",
                "ketqua"=>$hanghoa->HangHoa_Edit($id_mahh)
            ]);
        }
        else{
            $this->invalid();
        }
        }
        function XuLySua_HangHoa() {
            if($this->validation()){
            $hanghoa = $this->model("HangHoaModel");
            if(isset($_POST['btnthem'])){
                $ma = $_POST['txtma'];
                $ten = $_POST['txtten'];
                $dvt = $_POST['txtdvt'];
                $gia = $_POST['txtgia'];
                $xuat = $_POST['txtgiaxuat'];
                $kq=$hanghoa->HangHoa_Upd($ma,$ten,$dvt,$gia,$xuat);
                // if($kq){
                    $this->view("TrangChu",[
                        "page"=>"SuaHangHoa",
                        "check"=>"true"
                    ]);
                // }
            }
        }
        else{
            $this->invalid();
        }
        }

        function Them_HangHoa(){
            if($this->validation()){
            $this->view("TrangChu",[
                "page"=>"ThemHangHoa"
            ]);
        }
        else{
            $this->invalid();
        }
        }
        function XuLyThem_HangHoa() {
            if($this->validation()){
            $hanghoa = $this->model("HangHoaModel");
            if(isset($_POST['btnthem'])){
                $mahang = $_POST['txtma'];
                $tenhang = $_POST['txtten'];
                $dvt = $_POST['txtdvt'];
                $gia = $_POST['txtgia'];
                $xuat = $_POST['txtgiaxuat'];
                $kq=$hanghoa->checktrungMaHh($mahang);
                if(!$mahang  || !$tenhang || !$dvt || !$gia || !$xuat) {
                    $this->view("TrangChu",[
                        "page"=>"ThemHangHoa",
                        "err"=>"*Không được để trống !!!",
                        "mh"=> $mahang,
                        "th"=> $tenhang,
                        "dvt"=> $dvt,
                        "gia"=>$gia,
                        "giaxuat"=>$xuat
                    ]);
                } else if($kq) {
                    $this->view("TrangChu",[
                        "page"=>"ThemHangHoa",
                        "err"=>"*Mã hàng hoá bị trùng !!!",
                        "mh"=> $mahang,
                        "th"=> $tenhang,
                        "dvt"=> $dvt,
                        "gia"=>$gia,
                        "giaxuat"=>$xuat
                    ]); 
                } else {
                    $add = $hanghoa->HangHoa_Ins($mahang,$tenhang,$dvt,$gia,$xuat);
                    if($add) {
                        $this->view("TrangChu",[
                            "page"=>"ThemHangHoa",
                            "mh"=> $mahang,
                            "th"=> $tenhang,
                            "dvt"=> $dvt,
                            "gia"=>$gia,
                            "giaxuat"=>$xuat,
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


        function Xoa_HangHoa($mahang){
            if($this->validation()){
            $hanghoa = $this->model("HangHoaModel");
            $kq = $hanghoa->HangHoa_Del($mahang);
            if($kq){
                $this->view("TrangChu",[
                    "page"=>"HangHoaView",
                    'result'=>$hanghoa->HangHoa_Show()
                ]);
            }  
            else{
                $this->view("TrangChu",[
                    "page"=>"HangHoaView",
                    "err"=>"Không thể xóa do hàng hóa đã được nhập hoặc xuất !!!",
                    'result'=>$hanghoa->HangHoa_Show()
                ]);
            }
            }
            else{
                $this->invalid();
            }
        }

    }
?>