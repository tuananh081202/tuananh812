<?php
    class PhieuNhap extends Controller{

        function Show(){
            if($this->validation()){//check xem mình đăng nhập chưa
            $nhaphanphoi = $this->model("NhaPhanPhoiModel");//in ra màn hình nếu if faile nó chạy lại từ màn hình trang chủ
            $hanghoa = $this->model("HangHoaModel");
            $nguoidung = $this->model("NguoiDungModel");
            $phieunhap = $this->model("PhieuNhapModel");
            $this->view("TrangChu",[
                "page"=>"PhieuNhapView",
                "result"=>$phieunhap->PhieuNhap_Show(),
                "query"=>$nhaphanphoi->NhaPhanPhoi_Show(),
                "query1"=>$hanghoa->HangHoa_Show(),
                "query2"=>$nguoidung->NguoiDung_Show()
            ]);
        }
        else{
            $this->invalid();
        }
        }
        function Filter($id)
        {
            if($this->validation()){
                $nhaphanphoi = $this->model("NhaPhanPhoiModel");
                $hanghoa = $this->model("HangHoaModel");
                $nguoidung = $this->model("NguoiDungModel");
                $phieunhap = $this->model("PhieuNhapModel");
                if($id==1){
                    $this->view("TrangChu",[
                        "page"=>"PhieuNhapView",
                        "result"=>$phieunhap->ngay_gan_nhat(),
                        "query"=>$nhaphanphoi->NhaPhanPhoi_Show(),
                        "query1"=>$hanghoa->HangHoa_Show(),
                        "query2"=>$nguoidung->NguoiDung_Show()
                    ]);
                }
                else{
                    $this->view("TrangChu",[
                        "page"=>"PhieuNhapView",
                        "result"=>$phieunhap->ngay_xa_nhat(),
                        "query"=>$nhaphanphoi->NhaPhanPhoi_Show(),
                        "query1"=>$hanghoa->HangHoa_Show(),
                        "query2"=>$nguoidung->NguoiDung_Show()
                    ]);
                }
            }
            else{
                $this->invalid();
            }
        }

        function XuLyThem_PhieuNhap() {
            if($this->validation()){
            $nhaphanphoi = $this->model("NhaPhanPhoiModel");
            $hanghoa = $this->model("HangHoaModel");
            $nguoidung = $this->model("NguoiDungModel");
            $phieunhap = $this->model("PhieuNhapModel");
            if(isset($_POST['btnthem'])){//khi ấn button thêm nó sẽ lấy thông tin của mấy cái dưới
                $npp = $_POST['txtnpp'];
                $mapn = $_POST['txtphieunhap'];
                $manv =$_POST['txtnv'];
                $ngaylap = $_POST['txtngay'];
                $tenhang = $_POST['txttenhang'];
                $soluong = $_POST['txtsl'];
                $dongia = $hanghoa->Find_cost($tenhang);
                $chiphi = $soluong * $dongia;
                $kq=$phieunhap->checktrungMapn($mapn);
                if(!$npp || !$ngaylap || !$soluong) { 
                    $this->view("TrangChu",[
                        "page"=>"PhieuNhapView",
                        "err1"=>"*Không được để trống !!!",
                        "result"=>$phieunhap->PhieuNhap_Show(),
                        "query"=>$nhaphanphoi->NhaPhanPhoi_Show(),
                        "query1"=>$hanghoa->HangHoa_Show(),
                        "query2"=>$nguoidung->NguoiDung_Show()
                    ]);
                } else if($kq) {
                    $this->view("TrangChu",[
                        "page"=>"PhieuNhapView",
                        "err2"=>"*Mã phiếu nhập bị trùng !!!",
                        "result"=>$phieunhap->PhieuNhap_Show(),
                        "query"=>$nhaphanphoi->NhaPhanPhoi_Show(),
                        "query1"=>$hanghoa->HangHoa_Show(),
                        "query2"=>$nguoidung->NguoiDung_Show()
                    ]); 
                } else {
                    $add = $phieunhap->PhieuNhap_Ins($mapn,$tenhang,$npp,$manv,$ngaylap,$soluong,$chiphi);
                    if($add) {
                        $this->view("TrangChu",[
                            "page"=>"PhieuNhapView",
                            "result"=>$phieunhap->PhieuNhap_Show(),
                            "query"=>$nhaphanphoi->NhaPhanPhoi_Show(),
                            "query1"=>$hanghoa->HangHoa_Show(),
                            "query2"=>$nguoidung->NguoiDung_Show()
                        ]);
                    }
                }
            }
        }
        else{
            $this->invalid();
        }
        }

        function Xoa_PhieuNhap($mapn,$mahang){
            if($this->validation()){
            $nhaphanphoi = $this->model("NhaPhanPhoiModel");
            $hanghoa = $this->model("HangHoaModel");
            $nguoidung = $this->model("NguoiDungModel");
            $phieunhap = $this->model("PhieuNhapModel");//trỏ tới phiếu nhập model
            $kq = $phieunhap->PhieuNhap_Del($mapn,$mahang);
                $this->view("TrangChu",[
                    "page"=>"PhieuNhapView",
                    'result'=>$phieunhap->PhieuNhap_Show(),
                    "query"=>$nhaphanphoi->NhaPhanPhoi_Show(),
                    "query1"=>$hanghoa->HangHoa_Show(),
                    "query2"=>$nguoidung->NguoiDung_Show()
                ]);
            }
            else{
                $this->invalid();
            }
        }

    }
?>