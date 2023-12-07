<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/71DCTT23_QuanLyKhoHang/public/css/TrangChu.css">
</head>
<style type="text/css">
    *, *:before, *:after {
  box-sizing: border-box;
}
.footer {
  display: flex;
  flex-flow: row wrap;
  padding: 30px 30px 20px 30px;
  color: #2f2f2f;
  
  border-top: 1px solid #e5e5e5;
}
a{
  color: white;
}

.footer > * {
  flex:  1 100%;
}

.footer__addr {
  margin-right: 1.25em;
  margin-bottom: 2em;
}

.footer__logo {
  font-family: 'Pacifico', cursive;
  font-weight: 400;
  text-transform: lowercase;
  font-size: 1.5rem;
}

.footer__addr h2 {
  margin-top: 1.3em;
  font-size: 15px;
  font-weight: 400;
}

.nav__title {
  font-weight: 400;
  font-size: 15px;
}

.footer address {
  font-style: normal;
  color: #999;
}

.footer__btn {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 36px;
  max-width: max-content;
  background-color: rgb(33, 33, 33, 0.07);
  border-radius: 100px;
  
  line-height: 0;
  margin: 0.6em 0;
  font-size: 1rem;
  padding: 0 1.3em;
}

.footer ul {
  list-style: none;
  padding-left: 0;
}

.footer li {
  line-height: 2em;
}

.footer a {
  text-decoration: none;
}

.footer__nav {
  display: flex;
	flex-flow: row wrap;
}

.footer__nav > * {
  flex: 1 50%;
  margin-right: 1.25em;
}

.nav__ul a {
  color: white;
}

.nav__ul--extra {
  column-count: 2;
  column-gap: 1.25em;
}

.legal {
  display: flex;
  flex-wrap: wrap;
  color: #999;
}
  
.legal__links {
  display: flex;
  align-items: center;
}

.heart {
  color: #2f2f2f;
}

@media screen and (min-width: 24.375em) {
  .legal .legal__links {
    margin-left: auto;
  }
}

@media screen and (min-width: 40.375em) {
  .footer__nav > * {
    flex: 1;
  }
  
  .nav__item--extra {
    flex-grow: 2;
  }
  
  .footer__addr {
    flex: 1 0px;
  }
  
  .footer__nav {
    flex: 2 0px;
  }
}
</style>
<body>
    <div id="main">
        <!-- Header -->
        <div class="header">
            <div class="top">
                <p><span>QUẢN LÝ KHO HÀNG DOANH NGHIỆP</span></p>
            </div>
            <div class="bottom">
                <div class="nav-bottom">
                    
                    <ul class="bottom-left">
                        <li><a href="http://localhost//71DCTT23_QuanLyKhoHang/Home"><i class="fa-solid fa-eye"></i> Tổng quan</a></li>
                        <li><a href="http://localhost//71DCTT23_QuanLyKhoHang/HangHoa"><i class="fa-solid fa-boxes-stacked"></i> Hàng hoá</a></li>
                        <li><a href="http://localhost//71DCTT23_QuanLyKhoHang/NhaPhanPhoi"><i class="fa-solid fa-industry"></i> Nhà phân phối</a></li>
                        <li><a href="http://localhost//71DCTT23_QuanLyKhoHang/PhieuNhap"><i class="fa-solid fa-file-import"></i> Phiếu Nhập</a></li>
                        <li><a href="http://localhost//71DCTT23_QuanLyKhoHang/PhieuXuat"><i class="fa-solid fa-file-export"></i> Phiếu Xuất</a></li>
                        <?php 
                        if($_SESSION['role']==1){?>
                            <li><a href="http://localhost//71DCTT23_QuanLyKhoHang/NhanVien"><i class="fa-solid fa-user"></i>  Nhân viên</a></li>
                        <?php }
                        ?>
                        <li><a href="http://localhost//71DCTT23_QuanLyKhoHang/ThongKe"><i class="fa-solid fa-chart-simple"></i>  Thống kê</a></li>
                        <li><a href="http://localhost//71DCTT23_QuanLyKhoHang/PhanQuyen/Logout"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div id="content" >
            <!-- Chuyển giữa các page trong controllers -->
        <?php require_once "./mvc/views/pages/".$data["page"].".php"; ?> 
        </div>
        <!-- Footer -->
        <header>
  <!-- Content -->
</header>


<footer  class="footer" style="margin-top:200px; background-color: green; color: white">
  <div class="footer__addr">
    <h1 class="footer__logo">Management</h1>
        
    <h2><a href="tel:0123456789">Contact</a></h2>
    
    <address>
      <a class="footer__btn" href="mailto:abc@gmail.com">Email Us</a>
    </address>
  </div>
  
  <ul class="footer__nav">
 
    
    <li class="nav__item nav__item--extra">
      <h2 class="nav__title">Technology</h2>
      
      <ul class="nav__ul nav__ul--extra">
        <li>
          <a href="#">Php</a>
        </li>
        
        <li>
          <a href="#">MVC</a>
        </li>
        
        <li>
          <a href="#">Html, Css</a>
        </li>
      </ul>
    </li>
    
    <li class="nav__item">
      <h2 class="nav__title">Legal</h2>
      
      <ul class="nav__ul">
        <li>
          <a href="#">Privacy Policy</a>
        </li>
        
        <li>
          <a href="#">Terms of Use</a>
        </li>
        
        <li>
          <a href="#">Sitemap</a>
        </li>
      </ul>
    </li>
  </ul>
  
  <div class="legal">
    <p>&copy; </p>
    
  </div>
</footer>
    </div>
</body>

</html>