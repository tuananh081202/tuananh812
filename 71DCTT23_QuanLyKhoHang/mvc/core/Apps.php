<!-- LÀ file sẽ gọi controllers, views và models 
    code tập chung trong file Apps
    Apps đại diện cho màn hình sẽ xử lý controllers, action, param
-->
<!-- Nói chung App là để xử lý url -->
<?php
    class App{
        // Hàm __construct() thường được khai báo bên trong lớp, 
        // khi ta tạo một đối tượng từ lớp đó thì hàm __construct() 
        // sẽ tự động được gọi đến
        protected $controllers="Home";
        protected $action="Show";
        protected $params=[];

        function __construct(){
            // Array ( [0] => Home [1] => Show [2] => 1 [3] => 2 [4] => 3 [5] => )
            $arr = $this->UrlHandle();

            // Xử lý Controllers

            // file_exists Ktra file có tồn tại hay ko
            if(isset($arr[0])==null) {$arr[0]="";}
            if(file_exists("./mvc/controllers/".$arr[0].".php")){
                $this->controllers = $arr[0];
                unset($arr[0]);
            }
            require_once "./mvc/controllers/".$this->controllers.".php";
            $this->controllers = new $this->controllers;

            // Xử lý Action
            if(isset($arr[1])){
                // Ktra hàm có tồn tại hay ko
                // Ktra $this->controllers có tồn tại action bên trg hay ko
                if(method_exists($this->controllers , $arr[1])){
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }
            
            // Xử lý params
            // Bên trên dùng unset để huỷ controllers, action đi 
            // để in ra mỗi params ko thôi.
            $this->params = $arr?array_values($arr):[]; 

            // Value1 tên lớp mà hàm đó chạy, Value2 params
            // Tạo ra biến có kiểu control.. và chạy hàm SayHi
            // Nếu dòng dưới bị lỗi thì do chạy XAMPP 8.0 chỉ cần sửa
            // call_user_func_array([$this->controllers, $this->action] , $this->params);
            // Thêm từ khoá 'new'
            call_user_func_array([new $this->controllers, $this->action] , $this->params);

        }

        function UrlHandle(){
            // Home/Show/1/2/3/
            // Hàm filter_var có chức năng kiểm tra sự phù hợp của dữ liệu
            // Hàm explode() chuyển đổi một chuỗi thành một mảng và mỗi phần tử được 
            // tách bởi giá trị đầu tiên như ở bên dưới là dấu /
            if(isset($_GET["url"])){
                return explode("/",filter_var(trim($_GET["url"],"/")));
            }
        }



    }
?>