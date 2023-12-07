<?php
// Model muốn lấy database thì chỉ cần extends DB
class NhaPhanPhoiModel extends DB{
    public function NhaPhanPhoi_Show(){
        $sql = "SELECT * FROM tblNhaPhanPhoi";
        $kq = mysqli_query($this->con,$sql);
        return $kq;
    }
    public function NhaPhanPhoi_Ins($manpp,$tennpp){
        $sql1 = "INSERT INTO tblNhaPhanPhoi(Npp_ma,Npp_ten) 
        VALUES ('$manpp','$tennpp')";
        $query1 = mysqli_query($this->con,$sql1);
        return $query1;
    }
    public function NhaPhanPhoi_Upd($manpp,$tennpp){
        $sql2 ="UPDATE tblNhaPhanPhoi SET 
        Npp_ma='$manpp',
        Npp_ten = '$tennpp'
            WHERE Npp_ma='$manpp'";
        $query2 = mysqli_query($this->con,$sql2);
        return $query2;
    }
    public function NhaPhanPhoi_Del($manpp){
        $sql3 = "DELETE FROM tblNhaPhanPhoi WHERE Npp_ma ='$manpp'";
        $query3 = mysqli_query($this->con,$sql3);
        return $query3;
    }
    public function NhaPhanPhoi_Find($search){
        $sql4 = "SELECT * FROM tblNhaPhanPhoi WHERE Npp_ma LIKE '%$search%' OR Npp_ten LIKE '%$search%'";
        $query4 = mysqli_query($this->con,$sql4);
        return $query4;
    }
    public function checktrungManpp($tennpp){
        $sql="SELECT * FROM tblNhaPhanPhoi WHERE Npp_ten='$tennpp'";
        $dulieu=mysqli_query($this->con,$sql);
        $kq=false;
        if(mysqli_num_rows($dulieu)>0){
            $kq=true;
        }
        return $kq;
    }
}
?>