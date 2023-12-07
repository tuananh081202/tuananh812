
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Dang nhap </title>
      <link rel="stylesheet" href="http://localhost/71DCTT23_QuanLyKhoHang/public/css/style_dangnhap.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
    <body>
        <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark pt-3">Đăng nhập</h2>
        <div class="text-center mb-5 text-dark">Quản lý kho hàng</div>
        <div class="card my-5">

          <form class="card-body cardbody-color p-lg-5" action='http://localhost//71DCTT23_QuanLyKhoHang/PhanQuyen/Login_process' method='POST'>

            <div class="text-center">
              <img src="https://img.pikbest.com/png-images/qiantu/hand-drawn-cartoon-cute-courier-parcel-warehousing-inventory-scene-elements_2560271.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <?php 
              if(isset($data['user'])){?>
                <input type="text" class="form-control" id="Username" name="user" value="<?php echo $data['user']?>" required aria-describedby="emailHelp"
                placeholder="Tên người dùng">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" name= "pass" id="pass" value="<?php echo $data['pass']?>" placeholder="Mật khẩu" required>
              <div class="text-danger"><?php echo $data['message']?></div>
              <?php }
              else{
                ?>
                    <input type="text" class="form-control" id="Username" name="user" required aria-describedby="emailHelp"
                placeholder="Tên người dùng">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="pass" placeholder="Mật khẩu" name="pass" required>
                <?php
              }
              ?>
              
            </div>
            
            <div class="text-center"><button type="submit" name="dangnhap" class="btn btn-dark px-5 mb-5 w-100">Đăng nhập</button></div>
          </form>
        </div>

      </div>
    </div>
  </div>
    </body>
</html>