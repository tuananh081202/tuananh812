<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/71DCTT23_QuanLyKhoHang/public/css/TrangChu.css">
    <title>Tổng quan</title>
</head>
<body style="margin-top:160px ;">
    <center>
            <h1> Hàng hoá </h1>
             <table border="1" style="background-color: #fff;">
                <tr bgcolor="#fff" style="color:#000; font-weight:bold;">           
                   
                    <td>Mã hàng</td>
                    <td>Tên hàng</td>
                    <td>Đơn vị tính</td>
                    <td>Đơn giá</td>
                    <td>Số lượng</td>
             
                </tr>
                <?php           
                    while($row = mysqli_fetch_array($data["result1"]))
                    {
                        $chuoi = "<tr>";
                        $chuoi .= "<td>".$row['Hanghoa_ma']."</td>";
                        $chuoi .= "<td>".$row['Hanghoa_ten']."</td>";
                        $chuoi .= "<td>".$row['Hanghoa_dvt']."</td>";
                        $chuoi .= "<td>".$row['Hanghoa_gia']."</td>";
                        $chuoi .= "<td>".$row['Kho_sl']."</td>";
                        $chuoi .= "</tr>";
                        echo $chuoi;
                    }
                ?>
            </table>

            <h1> Nhà phân phối </h1>
             <table border="1" style="background-color: #fff;">
                <tr bgcolor="#fff" style="color:#000; font-weight:bold">           
                   
                    <td>Mã nhà phân phối</td>
                    <td>Tên nhà phân phối</td>
             
                </tr>
                <?php           
                    while($row = mysqli_fetch_array($data["result2"]))
                    {
                        $chuoi = "<tr>";
                        $chuoi .= "<td>".$row['Npp_ma']."</td>";
                        $chuoi .= "<td>".$row['Npp_ten']."</td>";
                        $chuoi .= "</tr>";
                        echo $chuoi;
                    }
                    ?>
                </table>

    </center>
</body>
</html>