
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .err {
            color: #FF0000;
            text-align: center;
            font-size: 14px;
        }
        .main {
            display: flex;
            justify-content: center;
        }
        form {
            padding: 15px;
        }
        input[type="text"] {
            height: 30px;
        }
        input[name="btnthem"]{
            border: none;
            padding: 9px 13px;
            background-color: #1293c3;
            border-radius: 1px;
            color: #f7f9ff;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body style="margin-top:160px ;">

    <form action="http://localhost/71DCTT23_QuanLyKhoHang/HangHoa/XuLyThem_HangHoa" method="POST" >
        <?php
    if (ISSET($_POST['btnthem'])) {
        if (isset($data["check"])) {
            echo "<script>";
            echo "alert('Thêm dữ liệu thành công');";
            echo "window.location.href ='http://localhost//71DCTT23_QuanLyKhoHang/HangHoa'";
            echo "</script>";
        }
    }
    ?>
        <table style="margin: auto ;" >
        <tbody>
            <tr>
                <td>Mã hàng:</td>
                <td>
                <input type="text" name="txtma"
                value="<?php if(isset($data['mh'])) echo $data['mh']?>">
                </td>
            </tr>
            <tr>
                <td>Tên hàng:</td>
                <td>
                <input type="text" name="txtten"
                value="<?php if(isset($data['th'])) echo $data['th']?>">
                </td>
            </tr>
            <tr>
                <td>Đơn vị tính:</td>
                <td>
                <input type="text" name="txtdvt"
                value="<?php if(isset($data['dvt'])) echo $data['dvt']?>">
                </td>
            </tr>
            <tr>
                <td>Đơn giánhập:</td>
                <td>
                <input style="margin-top: 10px;" type="text" name="txtgia"
                value="<?php if(isset($data['gia'])) echo $data['gia']?>">
                </td>
            </tr>
            <tr>
                <td>Đơn giá xuất:</td>
                <td>
                <input style="margin-top: 10px;" type="text" name="txtgiaxuat"
                value="<?php if(isset($data['giaxuat'])) echo $data['giaxuat']?>">
                </td>
            </tr>
            <tr>
                <td>
                <input type="submit" name="btnthem" value="Thêm">
                </td>
                <td>
                <div class="err">
                    <span><?php if(isset($data['err'])){
                        echo $data['err'];
                    }?></span>
                </div>
                </td>
            </tr>
        </tbody>
    </table>
    
    </form>
   

</body>
</html>