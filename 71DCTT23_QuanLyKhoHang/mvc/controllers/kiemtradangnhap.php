<?php
if(!isset($_SESSION["username"]))
	{   //hiển thị hộp cảnh báo
		echo "<script type='text/javascript' >";
                echo "{";
                echo "alert('Bạn chưa đăng nhập. Vui lòng đăng nhập để sử dụng');";//echo "cảnh báo('$tin nhắn')";
                echo "}";
            echo "</script>";
            header('Location: ../index/dangnhap.php');
		
	}
?>