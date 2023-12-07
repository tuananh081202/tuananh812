<?php

class ThongKeModel extends DB{
    public function phieu_nhap_thang($month, $year)
    {
        $sql = "SELECT * FROM tblphieunhap WHERE MONTH(Phieunhap_ngay)='$month' and YEAR(Phieunhap_ngay)='$year'";
        return mysqli_query($this->con,$sql);
    }
    public function phieu_xuat_thang($month, $year)
    {
         $sql = "SELECT * FROM tblphieuxuat WHERE MONTH(Phieuxuat_ngay)='$month' and YEAR(Phieuxuat_ngay)='$year'";
        // $sql = "SELECT * FROM tblphieuxuat WHERE MONTH('Phieuxuat_ngay')='10' or  MONTH('Phieuxuat_ngay')='11' or MONTH('Phieuxuat_ngay')='12' and YEAR('Phieuxuat_ngay')='$year'";
        return mysqli_query($this->con,$sql);
    }
    public function quy_1($table,$column,$year)
    {
        $sql = "SELECT * FROM $table WHERE MONTH($column)='1' or  MONTH($column)='2' or MONTH($column)='3' and YEAR($column)='$year";
        return mysqli_query($this->con,$sql);
    }
    public function quy_2($table,$column,$year)
    {
        $sql = "SELECT * FROM $table WHERE MONTH($column)='4' or  MONTH($column)='5' or MONTH($column)='6' and YEAR($column)='$year";
        return mysqli_query($this->con,$sql);
    }
    public function quy_3($table,$column,$year)
    {
        $sql = "SELECT * FROM $table WHERE MONTH($column)='7' or  MONTH($column)='8' or MONTH($column)='9' and YEAR($column)='$year'";
        return mysqli_query($this->con,$sql);
    }
    public function quy_4($table,$column,$year)
    {
        $sql = "SELECT * FROM $table WHERE MONTH($column)='10' or  MONTH($column)='11' or MONTH($column)='12' and YEAR($column)='$year'";
        return mysqli_query($this->con,$sql);
    }
}
?>