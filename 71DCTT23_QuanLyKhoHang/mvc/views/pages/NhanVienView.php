<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Nhân viên </title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    
    <link rel="stylesheet" href="http://localhost/71DCTT23_QuanLyKhoHang/public/css/TrangChu.css">
</head>
<body style="margin-top:160px ;">
    <div class="container">
        <div class="content">
         <center>
            <h1> Nhân viên </h1>
            <div class="text-danger"><?php
            if(isset($data['message']))
        {
            $mess = $data['message'];
            echo "<span class= mt-1'>$mess</span>";
        }
        ?></div>
            <div style="text-align: center; display: flex; justify-content: space-between; align-items: center; width:700px;">
                <div class="timkiem" style="margin-top: 10px;">
                    <form action="http://localhost/71DCTT23_QuanLyKhoHang/NhanVien/Filter" method = "POST">
                    <input type="radio"  name="role" value="0" checked> Mặc định
                    <input type="radio"  name="role" value="1">Quản trị viên
                    <input type="radio"  name="role" value="2">Nhân viên
                    <input type="submit" name="loc" value="Áp dụng" style="padding: 10px; cursor: pointer;">
                    </form>
                </div>
                <div class="btn">
                    <a class="add" href="http://localhost/71DCTT23_QuanLyKhoHang/NhanVien/Create" style="text-align: center; " ><i class="fa-solid fa-plus"></i> Thêm mới</a>
                </div>
            </div>
         <?php 
                if(isset($_POST["role"]))
                {
                    if ($_POST["role"] == 0) $search = "Tất cả";
                    elseif ($_POST["role"] == 1) $search = "Quản trị viên";
                    elseif ($_POST["role"] == 2) $search = "Nhân viên";
                    ?>
                    
                    <table border="1" style="background-color: #fff;">
                        <tr bgcolor="#fff" style="color:#000; font-weight:bold;">           
                            <td>Tên đăng nhập</td>
                            <td>Mật khẩu</td>
                            <td>Vai trò</td>
                            <td>###</td>
                            <td>###</td>
                        </tr>
                        
                <?php
                if(isset($data["ketqua"]))
                {
                    $count = mysqli_num_rows($data["ketqua"]);
                    if($count > 0)
                    {
                        while($row = mysqli_fetch_assoc($data["ketqua"]))
                        { 
                            echo"<td>".$row['Nguoidung_ten']."</td>";
                            echo "<td>".$row['Nguoidung_mk']."</td>";
                            if($row['Nguoidung_cap'] == 1) $role = "Quản trị viên";
                            else $role = "Nhân viên";
                            echo "<td>".$role."</td>";
                            echo "<td><a class='btn-sua' href='http://localhost//71DCTT23_QuanLyKhoHang/NhanVien/Edit/$row[Nguoidung_ten]'><i class='fa-solid fa-pen'></i> Sửa </a></td>";
                        if($row['Nguoidung_cap'] != 1) 
                        { ?>
                            <td><a class='btn-sua' href='http://localhost//71DCTT23_QuanLyKhoHang/NhanVien/Delete/<?php echo $row['Nguoidung_ten']; ?>' OnClick ="return confirm('Bạn có muốn xoá không')"><i class='fa-solid fa-pen'></i> Xóa </a></td>
                        <?php }
                            else echo "<td></td>";
                            echo "</tr>";
                    
                        } 
                            echo "<div style='text-align: center;'>";
                            echo "Tìm thấy ".$count." kết quả theo lọc <b>$search</b> ";
                            echo "</div>";
                    }
                    else
                    {
                        echo "<div style='text-align: center;'>";
                        echo "Không tìm thấy kết quả nào theo lọc <b>$search</b> nào ";
                        echo "</div>";
                    }
                }
            
                ?>
                
     </table>
              <?php
                }
                else
                {
                    ?>
                    <table border="1" style="background-color: #fff;">
                <tr bgcolor="#fff" style="color:#000; font-weight:bold;">           
                    <td>Tên đăng nhập</td>
                    <td>Mật khẩu</td>
                    <td>Vai trò</td>
                    <td>###</td>
                    <td>###</td>
                        
                </tr>
                <?php           
                    while($row = mysqli_fetch_array($data["result"]))
                    {
                        echo "<tr> <input type='hidden' name = 'user' value = '$row[Nguoidung_ten]'>";
                        echo "<td>".$row['Nguoidung_ten']."</td>";
                        echo "<td>".$row['Nguoidung_mk']."</td>";
                        if($row['Nguoidung_cap'] == 1) $role = "Quản trị viên";
                        else $role = "Nhân viên";
                        echo "<td>".$role."</td>";
                        echo "<td><a class='btn-sua' href='http://localhost//71DCTT23_QuanLyKhoHang/NhanVien/Edit/$row[Nguoidung_ten]'><i class='fa-solid fa-pen'></i> Sửa </a></td>";
                        if($row['Nguoidung_cap'] != 1) 
                        { ?>
                            <td><a class='btn-sua' href='http://localhost//71DCTT23_QuanLyKhoHang/NhanVien/Delete/<?php echo $row['Nguoidung_ten']; ?>' OnClick ="return confirm('Bạn có muốn xoá không')"><i class='fa-solid fa-pen'></i> Xóa </a></td>
                        <?php }
                        else echo "<td></td>";
                        echo"</tr>";
                    }
                ?>
            </table>
            <?php    }
           ?>
         </center> 
        
     <script type="text/javascript">
    var tableToExcel = (function() {
          var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http:www.w3.org/TR/REC-html40"><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
            , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
            , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
          return function(table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
            window.location.href = uri + base64(format(template, ctx))
          }
        })()
</script> 
    <script src="https:ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
</script>
</body>
</html>