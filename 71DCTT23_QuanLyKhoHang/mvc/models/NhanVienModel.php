<?php

class NhanVienModel extends DB{
    public function nhan_vien_view()
    {
        $sql = "SELECT * from tblnguoidung";
        return  mysqli_query($this->con,$sql);
    }
    public function add_nhan_vien($user, $pass, $role)
    {
        $sql = "INSERT INTO tblnguoidung VALUES ('$user','$pass','$role')";
        return mysqli_query($this->con,$sql);
    }
    public function loc_tai_khoan($role)
    {
        $sql = "SELECT * from tblnguoidung where Nguoidung_cap = $role";
        return mysqli_query($this->con,$sql);
    }
    public function user_valid($user)
    {
        $sql = "SELECT * from tblnguoidung where Nguoidung_ten = '$user'";
        if(mysqli_num_rows(mysqli_query($this->con,$sql)) == 0) return true;
        return false;
    }
    public function delete($user)
    {
        $sql = "DELETE FROM tblnguoidung WHERE Nguoidung_ten = '$user'";
        mysqli_query($this->con,$sql);
        return true;
    }
    public function get_user_by_id($user)
    {
        $sql = "SELECT * from tblnguoidung where Nguoidung_ten ='$user'";
        return mysqli_query($this->con,$sql);
    }
    public function edit($user, $pass, $role,$old)
    {
        $sql = "UPDATE tblnguoidung SET Nguoidung_ten = '$user', Nguoidung_mk='$pass',Nguoidung_cap =$role WHERE Nguoidung_ten = '$old'";
        return mysqli_query($this->con,$sql);
    }
}
?>