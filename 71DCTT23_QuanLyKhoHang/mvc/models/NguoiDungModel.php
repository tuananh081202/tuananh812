<?php
    class NguoiDungModel extends DB {
        public function NguoiDung_Show(){
            $sql = "SELECT * FROM tblnguoidung";
            $query = mysqli_query($this->con,$sql); 
            return  $query;
        }
        public function check_account($user,$pass)
        {
            $sql = "SELECT * from tblnguoidung WHere Nguoidung_ten = '$user' and Nguoidung_mk = '$pass'";
            if(mysqli_num_rows(mysqli_query($this->con,$sql)) == 0) return '0';
            return mysqli_query($this->con,$sql);
        }
    }
?>