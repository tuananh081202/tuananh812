<?php
// Model muốn lấy database thì chỉ cần extends DB
class HangHoaModel extends DB{
    public function HangHoa_Show(){
        $sql = "SELECT tblkho.Hanghoa_ma,Hanghoa_ten,Hanghoa_dvt,Hanghoa_gia,Kho_sl,Hanghoa_xuat FROM tblkho INNER JOIN tblhanghoa ON tblkho.Hanghoa_ma = tblhanghoa.Hanghoa_ma";
        $query = mysqli_query($this->con,$sql); 
        return  $query;
    }
    public function HangHoa_Ins($mahang,$tenhang,$dvt,$gia,$xuat){
        $sql1 = "INSERT INTO tblHanghoa(Hanghoa_ma,Hanghoa_ten,Hanghoa_dvt,Hanghoa_gia,Hanghoa_xuat) 
                 VALUES ('$mahang','$tenhang','$dvt','$gia','$xuat')";
        $sql = "UPDATE tblkho SET Kho_sl = '0' WHERE Hanghoa_ma ='$mahang'";
        $query1 = mysqli_query($this->con,$sql1);
        mysqli_query($this->con,$sql);
        return $query1;
    }

    public function HangHoa_Upd($ma,$ten,$dvt,$gia,$xuat){
        $sql2 ="UPDATE tblhanghoa SET Hanghoa_ma='$ma',Hanghoa_ten = '$ten',Hanghoa_dvt = '$dvt',Hanghoa_gia = '$gia',Hanghoa_xuat = '$xuat' WHERE Hanghoa_ma ='$ma'";
        $query2 = mysqli_query($this->con,$sql2);
        return $query2;
    }

    public function HangHoa_Del($mahang){
        $sql3 = "DELETE FROM tblhanghoa WHERE Hanghoa_ma ='$mahang'";
        if(mysqli_query($this->con,$sql3)) return true;
        else return false;
    }

    public function HangHoa_Find($search){
        $sql4 = "SELECT * FROM tblhanghoa WHERE Hanghoa_ma LIKE '%$search%' OR Hanghoa_ten LIKE '%$search%'";
        $query4 = mysqli_query($this->con,$sql4);
        return $query4;
    }
    public function HangHoa_Edit($ma){
        $sql4 = "SELECT * FROM tblhanghoa Where Hanghoa_ma = '$ma'";
        $query4 = mysqli_query($this->con,$sql4);
        return $query4;
    }
    public function Find_cost($ma){
        $sql4 = "SELECT * FROM tblhanghoa Where Hanghoa_ma = '$ma'";
        $query4 = mysqli_query($this->con,$sql4);
        while($row = mysqli_fetch_array($query4)){
            $cost = $row['Hanghoa_gia'];
        }
        return $cost;
    }
    public function Find_cost_xuat($ma){
        $sql4 = "SELECT * FROM tblhanghoa Where Hanghoa_ma = '$ma'";
        $query4 = mysqli_query($this->con,$sql4);
        while($row = mysqli_fetch_array($query4)){
            $cost[0] = $row['Hanghoa_xuat'];//hàng hóa giá xuất
            $cost[1] = $row['Hanghoa_gia'];//hàng hóa giá nhập
        }
        return $cost;
    }
    public function find_once_product($ma)
    {
        $sql4 = "SELECT * FROM tblkho where Hanghoa_ma = '$ma'";
        $query4 = mysqli_query($this->con,$sql4);
        while($row = mysqli_fetch_array($query4)){
            $sl = $row['Kho_sl'];
        }
        return $sl;
    }



    public function checktrungMaHh($mahang){
        $sql="SELECT * FROM tblhanghoa WHERE Hanghoa_ma='$mahang'";
        $dulieu=mysqli_query($this->con,$sql);
        $kq=false;
        if(mysqli_num_rows($dulieu)>0){
            $kq=true;
        }
        return $kq;
    }
}
?>