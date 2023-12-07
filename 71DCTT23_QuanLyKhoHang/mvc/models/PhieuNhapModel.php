<?php
    class PhieuNhapModel extends DB {
        public function PhieuNhap_Show(){
            $sql = "SELECT * FROM tblphieunhap";
            $query = mysqli_query($this->con,$sql); 
            return  $query;
        }
        public function PhieuNhap_Ins($mapn,$tenhang,$npp,$manv,$ngaylap,$soluong,$chiphi){
            $sql1 = "INSERT INTO tblphieunhap(Phieunhap_ma,Hanghoa_ma,NPP_ma,Nguoidung_ten,Phieunhap_ngay,Phieunhap_sl,Phieunhap_cost) 
                          VALUES ('$mapn','$tenhang','$npp','$manv','$ngaylap',$soluong,$chiphi)";
            $query1 = mysqli_query($this->con,$sql1);
            return $query1;
        }
        public function ngay_gan_nhat()
        {
            $sql = "SELECT * from tblphieunhap ORDER by Phieunhap_ngay DESC";//Từ khóa desc trong sql để xếp giảm dần theo tên-cột.
            return mysqli_query($this->con,$sql); 
        }
        public function ngay_xa_nhat()
        {
            $sql = "SELECT * from tblphieunhap ORDER by Phieunhap_ngay";  
            return mysqli_query($this->con,$sql); 
        }
        public function PhieuNhap_Upd($mapn,$tenhang,$npp,$manv,$ngaylap,$soluong){
            $sql2 ="UPDATE tblphieunhap SET 
                            Phieunhap_ma='$mapn',
                            Hanghoa_ma = '$tenhang',
                            NPP_ma = '$npp',
                            Nguoidung_ten = '$manv',
                            Phieunhap_ngay = '$ngaylap',
                            Phieunhap_sl = '$soluong'
            WHERE Phieunhap_ma = '$mapn' and Hanghoa_ma= '$tenhang'";
            $query2 = mysqli_query($this->con,$sql2);
            return $query2;
        }
    
        public function PhieuNhap_Del($mapn,$mahang){
            $sql3 = "DELETE FROM tblphieunhap WHERE Phieunhap_ma ='$mapn' and Hanghoa_ma='$mahang'";//mapn,mahang lấy từ bên phiếu nhập controller 
            $query3 = mysqli_query($this->con,$sql3);
            return $query3;
        }

        public function checktrungMapn($mapn){
            $sql="SELECT * FROM tblphieunhap WHERE Phieunhap_ma='$mapn'";
            $dulieu=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($dulieu)>0){
                $kq=true;
            }
            return $kq;
        }

    }
?>