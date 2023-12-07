<?php
    class PhieuXuat extends Controller{

        function Show(){
            if($this->validation()){
            $nhaphanphoi = $this->model("NhaPhanPhoiModel");
            $hanghoa = $this->model("HangHoaModel");
            $nguoidung = $this->model("NguoiDungModel");
            $phieuxuat = $this->model("PhieuXuatModel");
            $this->view("TrangChu",[
                "page"=>"PhieuXuatView",
                "result"=>$phieuxuat->PhieuXuat_Show(),
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
                $hanghoa = $this->model("HangHoaModel");
                $nguoidung = $this->model("NguoiDungModel");
                $phieuxuat = $this->model("PhieuXuatModel");
                if($id==1){
                    $this->view("TrangChu",[
                        "page"=>"PhieuXuatView",
                        "result"=>$phieuxuat->ngay_gan_nhat(),
                        "query1"=>$hanghoa->HangHoa_Show(),
                        "query2"=>$nguoidung->NguoiDung_Show()
                    ]);
                }
                else{
                    $this->view("TrangChu",[
                        "page"=>"PhieuXuatView",
                        "result"=>$phieuxuat->ngay_xa_nhat(),
                        "query1"=>$hanghoa->HangHoa_Show(),
                        "query2"=>$nguoidung->NguoiDung_Show()
                    ]);
                }
            }
            else{
                $this->invalid();
            }
        }

        function XuLyThem_PhieuXuat() {
            if($this->validation()){
            $hanghoa = $this->model("HangHoaModel");
            $nguoidung = $this->model("NguoiDungModel");
            $phieuxuat = $this->model("PhieuXuatModel");
            if(isset($_POST['btnthem'])){
                $mapx = $_POST['txtphieunhap'];
                $manv =$_POST['txtnv'];
                $ngaylap = $_POST['txtngay'];
                $tenhang = $_POST['txttenhang'];
                $soluong = $_POST['txtsl'];
                $customer = $_POST['txtcus'];
                $phone   = $_POST['txtnumber'];
                
                $dongia = $hanghoa->Find_cost_xuat($tenhang);
                $doanhthu = $soluong * $dongia[0];
                $profit = (($doanhthu - $soluong * $dongia[1])/($soluong * $dongia[1]))*100;//(doanh thu- so luong * gia nhap)/(so luong * gia nhap)*100%
                $sl_kho = $hanghoa->find_once_product($tenhang);

                $kq=$phieuxuat->checktrungMapx($mapx);
                if(!$ngaylap || !$soluong || !$customer || !$phone) {
                    $this->view("TrangChu",[
                        "page"=>"PhieuXuatView",
                        "err1"=>"*Không được để trống !!!",
                        "result"=>$phieuxuat->PhieuXuat_Show(),
                        "query1"=>$hanghoa->HangHoa_Show(),
                        "query2"=>$nguoidung->NguoiDung_Show()
                    ]);
                } else if(strlen($phone)!=10) { //đếm số nếu k bằng 10 ký tự thì nó sẽ báo phải có 10 số
                    $this->view("TrangChu",[
                        "page"=>"PhieuXuatView",
                        "err2"=>"Số điện thoại phải có 10 số !!",
                        "result"=>$phieuxuat->PhieuXuat_Show(),
                        "query1"=>$hanghoa->HangHoa_Show(),
                        "query2"=>$nguoidung->NguoiDung_Show()
                    ]); 
                }
                else if($sl_kho < $soluong) {
                    $this->view("TrangChu",[
                        "page"=>"PhieuXuatView",
                        "err2"=>"*Số lượng tối đa là ".$sl_kho." !!!",
                        "result"=>$phieuxuat->PhieuXuat_Show(),
                        "query1"=>$hanghoa->HangHoa_Show(),
                        "query2"=>$nguoidung->NguoiDung_Show()
                    ]); 
                }
                else if($kq) {
                    $this->view("TrangChu",[
                        "page"=>"PhieuXuatView",
                        "err2"=>"*Mã phiếu xuất bị trùng !!!",
                        "result"=>$phieuxuat->PhieuXuat_Show(),
                        "query1"=>$hanghoa->HangHoa_Show(),
                        "query2"=>$nguoidung->NguoiDung_Show()
                    ]); 
                } else {
                    $add = $phieuxuat->PhieuXuat_Ins($mapx,$tenhang,$manv,$ngaylap,$soluong,$doanhthu,$customer,$phone,$profit);
                    if($add) {
                        $this->view("TrangChu",[
                            "page"=>"PhieuXuatView",
                            "result"=>$phieuxuat->PhieuXuat_Show(),
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

        function Xoa_PhieuXuat($mapx,$mahang){
            if($this->validation()){
            $nhaphanphoi = $this->model("NhaPhanPhoiModel");
            $hanghoa = $this->model("HangHoaModel");
            $nguoidung = $this->model("NguoiDungModel");
            $phieuxuat = $this->model("PhieuXuatModel");
            $kq = $phieuxuat->PhieuXuat_Del($mapx,$mahang);
                $this->view("TrangChu",[
                    "page"=>"PhieuXuatView",
                    'result'=>$phieuxuat->PhieuXuat_Show(),
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