<?php
session_start();
// require_once bị bỏ qua nếu tệp bắt buộc 
// đã được thêm bởi bất kỳ câu lệnh nào trong bốn câu lệnh include
require_once "./mvc/bridge.php";
// Gọi new .. hàm __construct() sẽ chạy
$myApp = new App();
?> 