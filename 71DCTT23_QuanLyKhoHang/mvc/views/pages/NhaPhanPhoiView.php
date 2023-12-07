<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="margin-top:160px ;">
    <div class="container">
        <div class="content">
         <center>
            <h1> Nhà phân phối </h1>
             <form action="http://localhost/71DCTT23_QuanLyKhoHang/NhaPhanPhoi/TimKiemNhaPhanPhoi" method="POST">

            <div style="text-align: center; display: flex; justify-content: space-between; align-items: center; width:700px;">
                <div class="timkiem">
                    <input type="text" name="search" placeholder="Tìm theo tên hoặc mã">
                    <input type="submit" name="search-btn" value="Tìm kiếm">
                </div>
                <div class="btn">
                    <a class="add" href="http://localhost/71DCTT23_QuanLyKhoHang/NhaPhanPhoi/Them_NhaPhanPhoi" style="text-align: center; " ><i class="fa-solid fa-plus"></i> Thêm mới</a>
                </div>
            </div>
         <?php 
                if(isset($_POST["search"]))
                {
                    $search = $_POST["search"];
                    ?>
                    
                    <table border="1" style="background-color: #fff;">
                        <tr bgcolor="#fff" style="color:#000; font-weight:bold;">           
                            <td>Mã nhà phân phối</td>
                            <td>Tên nhà phân phối</td>
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
                        <td><?php echo $row['Npp_ma'];?></td>
                        <td><?php echo $row['Npp_ten'];?></td>
                        <?php 
                        if($_SESSION['role']==1){ ?>
                        <td><a class='btn-sua' href='http://localhost//71DCTT23_QuanLyKhoHang/NhaPhanPhoi/Sua_NhaPhanPhoi/<?php echo $row["Npp_ma"]; ?>'><i class='fa-solid fa-pen'></i> Sửa </a></td>
                        <td><a class='btn-xoa' href='http://localhost/71DCTT23_QuanLyKhoHang/NhaPhanPhoi/Xoa_NhaPhanPhoi/<?php echo $row["Npp_ma"]; ?>' OnClick ="return confirm('Bạn có muốn xoá không')"><i class='fa-solid fa-trash'></i> Xoá </a></td>
                        <?php } ?>
                        </tr>
                      <?php  } 
                           
                            echo "<div style='text-align: center;'>";
                            echo "Tìm thấy ".$count." kết quả với từ khóa <b>$search</b> ";
                            echo "<a href='http://localhost//71DCTT23_QuanLyKhoHang/NhaPhanPhoi' style='color: red' >Home</a>";
                            echo "</div>";

                    }
                    else
                    {
                        echo "<div style='text-align: center;'>";
                        echo "Không tìm thấy kết quả nào với từ khóa <b>$search</b> ";
                        echo "<a href='http://localhost//71DCTT23_QuanLyKhoHang/NhaPhanPhoi' style='color: red' >Home</a>";
                        echo "</div>";
                    }?>

     </table>
              <?php
                }
                else
                {
                    ?>
                    <table border="1" style="background-color: #fff;">
                <tr bgcolor="#fff" style="color:#000; font-weight:bold;">           
                   
                    <td>Mã nhà phân phối</td>
                    <td>Tên nhà phân phối</td>
                    <td>###</td>
                    <td>###</td>
             
                </tr>
                <?php           
                    while($row = mysqli_fetch_array($data["result"]))
                    { ?>
                         <tr>
                        <td><?php echo $row['Npp_ma'];?></td>
                        <td><?php echo $row['Npp_ten'];?></td>
                        <?php 
                        if($_SESSION['role']==1){ ?>
                        <td><a class='btn-sua' href='http://localhost//71DCTT23_QuanLyKhoHang/NhaPhanPhoi/Sua_NhaPhanPhoi/<?php echo $row["Npp_ma"]; ?>'><i class='fa-solid fa-pen'></i> Sửa </a></td>
                        <td><a class='btn-xoa' href='http://localhost/71DCTT23_QuanLyKhoHang/NhaPhanPhoi/Xoa_NhaPhanPhoi/<?php echo $row["Npp_ma"]; ?>' OnClick ="return confirm('Bạn có muốn xoá không')"><i class='fa-solid fa-trash'></i> Xoá </a></td>
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
                   
                    <td>Mã nhà phân phối</td>
                    <td>Tên nhà phân phối</td>
             
                </tr>
                <?php
                
                 $conn=mysqli_connect("localhost","root","","db_quanlykho");
                 $sql12 = "SELECT * FROM tblNhaPhanPhoi";
                 $query12 = mysqli_query($conn,$sql12);       
                    while($row1 = mysqli_fetch_array($query12))
                    {
                        $chuoi1 = "<tr>";
                        $chuoi1 .= "<td>".$row1['Npp_ma']."</td>";
                        $chuoi1 .= "<td>".$row1['Npp_ten']."</td>";
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