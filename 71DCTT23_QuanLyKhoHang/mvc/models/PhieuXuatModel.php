<?php
    class PhieuXuatModel extends DB {
        public function PhieuXuat_Show(){
            $sql = "SELECT * FROM tblphieuxuat";
            $query = mysqli_query($this->con,$sql); 
            return  $query;
        }
        public function PhieuXuat_Ins($mapx,$tenhang,$manv,$ngaylap,$soluong,$chiphi,$cus,$phone,$profit){
            $sql1 = "INSERT INTO tblphieuxuat(Phieuxuat_ma,Hanghoa_ma,Nguoidung_ten,Phieuxuat_ngay,Phieuxuat_sl,Phieuxuat_cost,Phieuxuat_customer,Phieuxuat_sdt,Profit) 
                          VALUES ('$mapx','$tenhang','$manv','$ngaylap',$soluong,$chiphi,'$cus','$phone',$profit)";
            $query1 = mysqli_query($this->con,$sql1);
            return $query1;
        }
        public function ngay_gan_nhat()
        {
            $sql = "SELECT * from tblphieuxuat ORDER by Phieuxuat_ngay DESC";  
            return mysqli_query($this->con,$sql); 
        }
        public function ngay_xa_nhat()
        {
            $sql = "SELECT * from tblphieuxuat ORDER by Phieuxuat_ngay";  
            return mysqli_query($this->con,$sql); 
        }
    
        public function PhieuXuat_Upd($mapx,$tenhang,$npp,$manv,$ngaylap,$soluong){
            $sql2 ="UPDATE tblphieuxuat SET 
                            Phieuxuat_ma='$mapx',
                            Hanghoa_ma = '$tenhang',
                            NPP_ma = '$npp',
                            Nguoidung_ten = '$manv',
                            Phieuxuat_ngay = '$ngaylap',
                            Phieuxuat_sl = '$soluong'
            WHERE Phieuxuat_ma = '$mapx' and Hanghoa_ma= '$tenhang'";
            $query2 = mysqli_query($this->con,$sql2);
            return $query2;
        }
    
        public function PhieuXuat_Del($mapx,$mahang){
            $sql3 = "DELETE FROM tblphieuxuat WHERE Phieuxuat_ma ='$mapx' and Hanghoa_ma='$mahang'";
            $query3 = mysqli_query($this->con,$sql3);
            return $query3;
        }

        public function checktrungMapx($mapx){
            $sql="SELECT * FROM tblphieuxuat WHERE Phieuxuat_ma='$mapx'";
            $dulieu=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($dulieu)>0){
                $kq=true;
            }
            return $kq;
        }

    }
?>