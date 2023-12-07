<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Nhân viên </title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/71DCTT23_QuanLyKhoHang/public/css/TrangChu.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container" style="margin-top:10%;">
    <h1> Sửa tài khoản </h1>
    
    <form action="http://localhost/71DCTT23_QuanLyKhoHang/NhanVien/Update" method = "POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Tên đăng nhập</label>
    <?php 
    if(isset($data['result']))
    {
        while($row = mysqli_fetch_array($data['result']))
    {
        $username = $row["Nguoidung_ten"];
        $old = $row["Nguoidung_ten"];
        $password = $row["Nguoidung_mk"];
        $role = $row["Nguoidung_cap"];
    }
    }
        if(isset($data['user']))
        {
            $user = $data['user'];
            echo "<input type='text' class='form-control' name='user' value = '$user' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Tên đăng nhập ....' disabled>";
            echo "<input type='hidden' name='user' value = '$user'>";
        }
        else{
        
            echo "<input type='text' class='form-control' name='user'  value = '$username' required id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Tên đăng nhập ....' disabled>";
            echo "<input type='hidden' name='user' value = '$username'>";
        }
    ?>
    
    <div class="text-danger"><?php
    if(isset($data['err']))
        {
            $err = $data['err'];
            echo "<span class= mt-1'>$err</span>";
        }
        ?></div>
  </div>
  <div class="form-group">
    <?php
        if(isset($data['pass']))
        {
            $pass = $data['pass'];
            echo "<input type='text' class='form-control' value ='$pass' required name='pass' id='exampleInputPassword1' placeholder='*********'>";
        }
        else{
            echo "<input type='text' class='form-control' value ='$password' required name='pass' id='exampleInputPassword1' placeholder='*********'>";
        }
    ?>
  </div>
  <div class="form-group">
    <label for="exampleInputRole">Vai trò</label>
    <select name="role" id="" class="form-control" required>
    <?php

    if(isset($data['role'])|| isset($data['result']))
        {
            if(isset($data['result']))$roleV = $role;
            else $roleV = $data['role'];
            
            if($roleV == 1) 
            {
                echo "<option value='1'>Quản trị viên</option>";
                echo "<option value='2'>Nhân viên</option>";
            }
            else{
                ?>
                    <option value="2">Nhân viên</option>
                    <option value="1">Quản trị viên</option>
               <?php 
               }
        }
        else {
            
                echo "<option value='2'>Nhân viên</option>";
                echo "<option value='1'>Quản trị viên</option>";
        }
       
    ?>
    </select>
  </div>
  <?php
  if(isset($data['old']))
  {
    if(empty($old)) $old = $data['old'];
  }
    
  ?>
  <?php echo "<input type='hidden' name='old' value='$old'>" ?>
  <button type="submit" name = "sua" class="btn btn-primary">Tạo</button>
</form>
    </div>
</body>
</html>