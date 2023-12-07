<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Hàng Hoá </title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/71DCTT23_QuanLyKhoHang/public/css/TrangChu.css">
</head>
<body style="margin-top:160px ;">
    <div class="container">
        <div class="content">
         <center>
            <h1> Hàng hoá </h1>
             <form action="http://localhost/71DCTT23_QuanLyKhoHang/HangHoa/TimKiemHangHoa" method="POST">

            <div style="text-align: center; display: flex; justify-content: space-between; align-items: center; width:700px;">
                <div class="timkiem">
                    <input type="text" name="search" placeholder="Tìm theo tên hoặc mã">
                    <input type="submit" name="search-btn" value="Tìm kiếm">
                </div>
                <div class="btn">
                    <a class="add" href="http://localhost/71DCTT23_QuanLyKhoHang/HangHoa/Them_HangHoa" style="text-align: center; " ><i class="fa-solid fa-plus"></i> Thêm mới</a>
                </div>
            </div>
         <?php 
                if(isset($_POST["search"]))
                {
                    $search = $_POST["search"];
                    ?>
                    
                    <table border="1" style="background-color: #fff;">
                        <tr bgcolor="#fff" style="color:#000; font-weight:bold;">           
                            <td>Mã hàng</td>
                            <td>Tên hàng</td>
                            <td>Đơn vị tính</td>
                            <td>Đơn giá nhập</td>
                            <td>Đơn giá xuất</td>
                            <td>###</td>
                            <td>###</td>
                        </tr>
                <?php
                    $count = mysqli_num_rows($data["ketqua"]);
                    if($count > 0)
                    {
                        while($row = mysqli_fetch_assoc($data["ketqua"]))
                        { 
                            ?>
                        <tr>
                        <td><?php echo $row['Hanghoa_ma'];?></td>
                        <td><?php echo $row['Hanghoa_ten'];?></td>
                        <td><?php echo $row['Hanghoa_dvt'];?></td>
                        <td><?php echo $row['Hanghoa_gia'];?></td>
                        <td><?php echo $row['Hanghoa_xuat'];?></td>
                        <?php 
                        if($_SESSION['role']==1){ ?>
                        <td><a class='btn-sua' href='http://localhost//71DCTT23_QuanLyKhoHang/HangHoa/Sua_HangHoa/<?php echo $row["Hanghoa_ma"]; ?>'><i class='fa-solid fa-pen'></i> Sửa </a></td>
                        <td><a class='btn-xoa' href='http://localhost/71DCTT23_QuanLyKhoHang/HangHoa/Xoa_HangHoa/<?php echo $row["Hanghoa_ma"]; ?>' OnClick ="return confirm('Bạn có muốn xoá không')"><i class='fa-solid fa-trash'></i> Xoá </a></td>
                        <?php } ?>
                        </tr>
                      <?php  } 
                           
                            echo "<div style='text-align: center;'>";
                            echo "Tìm thấy ".$count." kết quả với từ khóa <b>$search</b> ";
                            echo "<a href='http://localhost//71DCTT23_QuanLyKhoHang/HangHoa' style='color: red' >Home</a>";
                            echo "</div>";

                    }
                    else
                    {
                        echo "<div style='text-align: center;'>";
                        echo "Không tìm thấy kết quả nào với từ khóa <b>$search</b> ";
                        echo "<a href='http://localhost//71DCTT23_QuanLyKhoHang/HangHoa' style='color: red' >Home</a>";
                        echo "</div>";
                    }?>

     </table>
              <?php
                }
                else
                {
                    ?>
                    <span style="color:red;"><?php if(isset($data["err"])) echo $data["err"];?></span>
                    <table border="1" style="background-color: #fff;">
                <tr bgcolor="#fff" style="color:#000; font-weight:bold;">           
                   
                    <td>Mã hàng</td>
                    <td>Tên hàng</td>
                    <td>Đơn vị tính</td>
                    <td>Đơn giá nhập</td>
                    <td>Đơn giá xuất</td>
                    <td>###</td>
                    <td>###</td>
             
                </tr>
                <?php           
                    while($row = mysqli_fetch_array($data["result"]))
                    { ?>
                        <tr>
                        <td><?php echo $row['Hanghoa_ma'];?></td>
                        <td><?php echo $row['Hanghoa_ten'];?></td>
                        <td><?php echo $row['Hanghoa_dvt'];?></td>
                        <td><?php echo $row['Hanghoa_gia'];?></td>
                        <td><?php echo $row['Hanghoa_xuat'];?></td>
                        <?php 
                        if($_SESSION['role']==1){ ?>
                        <td><a class='btn-sua' href='http://localhost//71DCTT23_QuanLyKhoHang/HangHoa/Sua_HangHoa/<?php echo $row["Hanghoa_ma"]; ?>'><i class='fa-solid fa-pen'></i> Sửa </a></td>
                        <td><a class='btn-xoa' href='http://localhost/71DCTT23_QuanLyKhoHang/HangHoa/Xoa_HangHoa/<?php echo $row["Hanghoa_ma"]; ?>' OnClick ="return confirm('Bạn có muốn xoá không')"><i class='fa-solid fa-trash'></i> Xoá </a></td>
                        <?php } ?>
                        </tr>
                  <?php  }
                ?>
            </table>
            <?php    }
           ?>
           </form>
            

           <table hidden="hidden" id="Content_ID">
                <tr bgcolor="#fff" style="color:#000; font-weight:bold">           
                   
                    <td>Mã hàng</td>
                    <td>Tên hàng</td>
                    <td>Đơn vị tính</td>
                    <td>Đơn giá nhập</td>
                    <td>Đơn giá xuất</td>
             
                </tr>
                <?php
                // Phân này là để export excel nên phải chèn sql vào
                 $conn=mysqli_connect("localhost","root","","db_quanlykho");
                 $sql12 = "SELECT * FROM tblhanghoa";
                 $query12 = mysqli_query($conn,$sql12);       
                    while($row1 = mysqli_fetch_array($query12))
                    {
                        $chuoi1 = "<tr>";
                        $chuoi1 .= "<td>".$row1['Hanghoa_ma']."</td>";
                        $chuoi1 .= "<td>".$row1['Hanghoa_ten']."</td>";
                        $chuoi1 .= "<td>".$row1['Hanghoa_dvt']."</td>";
                        $chuoi1 .= "<td>".$row1['Hanghoa_gia']."</td>";
                        $chuoi1 .= "<td>".$row1['Hanghoa_xuat']."</td>";
                        $chuoi1 .= "</tr>";
                        echo $chuoi1;
                    }
                ?>
            </table>


           <input class="add" type="button" style="text-align: center; border: none; " onclick="tableToExcel('Content_ID')" value="Xuất ra excel">
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