<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Trang chu admin</title>
    <link rel="stylesheet" href="../CSS/style_trangchu.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
</head>
<body style="margin-top:160px ;">
    <div class="container">
        <div class="content">
            <center>
            <h1> Phiếu nhập </h1>

        <form action="http://localhost/71DCTT23_QuanLyKhoHang/PhieuNhap/XuLyThem_PhieuNhap" method="POST">
            <p style='display:inline;'> Nhà phân phối: </p>
         <select name="txtnpp" style="width: 200px; ">
            <?php 
            while($row = mysqli_fetch_array($data["query"]))
                {
            ?>
             <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
            <?php }?>
       </select>

       <p style='display:inline; margin-top: 15px;'>Mã phiếu nhập: </p>
       <input style = 'margin-top: 15px; width: 143px; margin-left: 4px;'' type='text' name='txtphieunhap'/><br>

       <p style='display:inline;'> Mã nhân viên: </p>
         <select name="txtnv" style="width: 200px; margin-left: 8px; ">
            <?php 
            while($row = mysqli_fetch_array($data["query2"]))
                {
            ?>
             <option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>
            <?php }?>

       </select> 

       <p style="display: inline; margin-left: 0px;">Ngày lâp: </p>
       <input style="margin-left: 42px; width: 143px;" type="date" name="txtngay">
       <br>
       <hr style="width: 500px; margin-top: 13px;">

       <p style='display:inline;'> Tên hàng: </p>
         <select name="txttenhang" style="width: 200px; margin-left:35px; ">
            <?php 
            while($row = mysqli_fetch_array($data["query1"]))
                {
            ?>
             <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
            <?php }?>

       </select>

       <p style='display:inline; margin-top: 15px;'>Số lượng: </p>
       <input style = 'margin-top: 15px;margin-left: 40px' type='text' name='txtsl'/>

       <input type="submit" name="btnthem" value="Nhập" style="background-color: rgb(23,115,189); color: white; border-radius: 1px;border: none;padding: 5px 10px;">
    
       <?php
                if (isset($_POST['btnthem'])) 
                {
                    if(isset($data["err1"])){
                        $err1 = $data["err1"];
                        echo "<script>";
                        echo "alert('$err1');";
                        echo "window.location.href ='http://localhost//71DCTT23_QuanLyKhoHang/PhieuNhap'";
                        echo "</script>";
                    } elseif(isset($data["err2"])){
                        $err2 = $data["err2"];
                        echo "<script>";
                        echo "alert('$err2');";
                        echo "window.location.href ='http://localhost//71DCTT23_QuanLyKhoHang/PhieuNhap'";
                        echo "</script>";
                        exit();
                    } else {
                        echo "<script>";
                        echo "alert('Thêm dữ liệu thành công');";
                        echo "window.location.href ='http://localhost//71DCTT23_QuanLyKhoHang/PhieuNhap'";
                        echo "</script>";
                    }
                }
            
        ?>
    
    </form>

             <table border="1" style="background-color: #fff; width:70%;" id="Content_ID" >
                <tr bgcolor="#fff" style="color:#000; font-weight:bold">           
                   
                    <td style="padding-right:20px;">Mã phiếu nhập</td>
                    <td>Mã hàng hoá</td>
                    <td>Mã nhà phân phối</td>
                    <td>Người lập</td>
                    <td>Ngày lập phiếu</td>
                    <td>Số lượng</td>
                    <td>Chi phí</td>
                    <td style="width: 80px;">###</td>
                </tr>
                <?php           
                    while($row = mysqli_fetch_array($data["result"]))
                    { ?>
                         <tr>
                        <td><?php echo $row['Phieunhap_ma'];?></td>
                        <td><?php echo $row['Hanghoa_ma'];?></td>
                        <td><?php echo $row['NPP_ma'];?></td>
                        <td><?php echo $row['Nguoidung_ten'];?></td>
                        <td><?php echo $row['Phieunhap_ngay'];?></td>
                        <td><?php echo $row['Phieunhap_sl'];?></td>
                        <td><?php echo $row['Phieunhap_cost'];?></td>
                        <!--  
                        <td><a class='btn-sua' href='http://localhost//71DCTT23_QuanLyKhoHang/HangHoa/Sua_HangHoa/<?php echo $row["Hanghoa_ma"]; ?>'><i class='fa-solid fa-pen'></i> Sửa </a></td>-->
                        <td><a class='btn-xoa' href='http://localhost/71DCTT23_QuanLyKhoHang/PhieuNhap/Xoa_PhieuNhap/<?php echo $row["Phieunhap_ma"]; ?>/<?php echo $row["Hanghoa_ma"]; ?>' OnClick ="return confirm('Bạn có muốn xoá không')"><i class='fa-solid fa-trash'></i> Xoá </a></td>
                        </tr>
                 <?php   }
                    ?>
                    
                </table >
                <a class="btn-sua" href="http://localhost/71DCTT23_QuanLyKhoHang/PhieuNhap/Filter/1">Ngày gần nhất</a>
                <input class="btn-sua" type="button" style="text-align: center; border: none; cursor:pointer;" onclick="tableToExcel('Content_ID')" value="Xuất ra excel">
                
                <a class="btn-sua" href="http://localhost/71DCTT23_QuanLyKhoHang/PhieuNhap/Filter/2">Ngày xa nhất</a>
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