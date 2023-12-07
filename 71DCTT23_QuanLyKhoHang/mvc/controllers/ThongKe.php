<?php
    class ThongKe extends Controller{
        private $list;
        function __construct(){
            $this->list = $this->model("ThongKeModel");
        } 
        function Show(){
            if($this->validation()){
            $this->view("TrangChu",[
                "page"=>"ThongKeView"
            ]);
        }
        else{
            $this->invalid();
        }
        }
        function Filter()//filter là lọc
        {
            if($this->validation()){
            $tk = $_POST["tk"];
            $tg = $_POST["tg"];
            $tq = $_POST["tq"];
            $nam = $_POST["nam"];
            if ($tk === "tblphieunhap") 
            {
                $nhap = true;
                $pn = "Phiếu nhập ";
                $column = 'Phieunhap_ngay';
                if ($tg === "Thang")
                 {
                    $pn .= "tháng '$tq' năm '$nam'";
                    $rs = $this->list->phieu_nhap_thang($tq,$nam);//rs là result lấy ra kết quả của phiếu nhập theo tháng
                 }
                 elseif($tg === "Quy") 
                 {
                     if($tq === "Quy1")
                     {
                        $rs = $this->list->quy_1($tk,$column,$nam);
                        $pn.= "Quý 1 năm '$nam'";
                     }
                     elseif ($tq === "Quy2") 
                     {
                        $rs = $this->list->quy_2($tk,$column,$nam);
                        $pn.= "Quý 2 năm '$nam'";
                    }
                    elseif ($tq === "Quy3") 
                    {
                        $rs = $this->list->quy_3($tk,$column,$nam);
                        $pn.= "Quý 3 năm '$nam'";
                    }
                    elseif ($tq === "Quy4") 
                    {
                        $rs = $this->list->quy_4($tk,$column,$nam);
                        $pn.= "Quý 4 năm '$nam'";
                    }
                 }   
            }
            elseif ($tk === "tblphieuxuat")
             {
                $nhap = false;
                $pn = "Phiếu xuất ";
                $column = 'Phieuxuat_ngay';
                if ($tg === "Thang")
                 {
                    $pn .= "tháng '$tq' năm '$nam'";
                    $rs = $this->list->phieu_xuat_thang($tq,$nam);
                 }
                 elseif($tg === "Quy") 
                 {
                     if($tq === "Quy1")
                     {
                        $rs = $this->list->quy_1($tk,$column,$nam);
                        $pn.= "Quý 1 năm '$nam'";
                     }
                     elseif ($tq === "Quy2") 
                     {
                        $rs = $this->list->quy_2($tk,$column,$nam);
                        $pn.= "Quý 2 năm '$nam'";
                    }
                    elseif ($tq === "Quy3") 
                    {
                        $rs = $this->list->quy_3($tk,$column,$nam);
                        $pn.= "Quý 3 năm '$nam'";
                    }
                    elseif ($tq === "Quy4") 
                    {
                        $rs = $this->list->quy_4($tk,$column,$nam);
                        $pn.= "Quý 4 năm '$nam'";
                    }
                 }   
                  
                 
            }
            $this->view("TrangChu",[
                "page"=>"ThongKeView",
                "result"=>$rs,
                "type"=>$pn,
                "phieunhap"=>$nhap
            ]);
        }
        else{
            $this->invalid();
        }
        }
}
?>