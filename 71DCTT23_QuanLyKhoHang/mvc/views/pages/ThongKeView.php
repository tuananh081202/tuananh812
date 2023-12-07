<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Hàng Hoá </title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    
    <link rel="stylesheet" href="http://localhost/71DCTT23_QuanLyKhoHang/public/css/TrangChu.css">
    <style type="text/css">
    .hidden{
            display:none;
        }
    </style>
</head>
<body style="margin-top:160px ;">
<div class = "container">
<div class="content">
         <center>
            <h1>Thống kê  </h1>
            <form action="http://localhost//71DCTT23_QuanLyKhoHang/ThongKe/Filter" method="POST">
                                <select class="col-12 mt-3 ml-3 text-dark" id="thongke" name="tk">
                                    <option value="tblphieunhap">Phiếu nhập</option>
                                    <option value="tblphieuxuat">Phiếu xuất</option>
                                </select> 
                                    <span class="col-12 ml-3 text-dark">Khoảng thời gian:</span>  
                                <select class="col-12 text-dark ml-3" id="gender" name="tg" required>
                                        <option value="" >Chọn</option>
                                        <option value="Thang">Tháng</option>
                                        <option value="Quy">Quý</option>
                                </select>  
                                <select class="col-12 text-dark ml-3 mt-3" id="name" class="hidden" name="tq" required>
                                        <option value="">Chọn</option>
                                        <option value="1" data-type="Thang">Tháng 1</option>
                                        <option value="2" data-type="Thang">Tháng 2</option>
                                        <option value="3" data-type="Thang">Tháng 3</option>
                                        <option value="4" data-type="Thang">Tháng 4</option>
                                        <option value="5" data-type="Thang">Tháng 5</option>
                                        <option value="6" data-type="Thang">Tháng 6</option>
                                        <option value="7" data-type="Thang">Tháng 7</option>
                                        <option value="8" data-type="Thang">Tháng 8</option>
                                        <option value="9" data-type="Thang">Tháng 9</option>
                                        <option value="10" data-type="Thang">Tháng 10</option>
                                        <option value="11" data-type="Thang">Tháng 11</option>
                                        <option value="12" data-type="Thang">Tháng 12</option>
                                        <option value="Quy1" data-type="Quy">Quý 1</option>
                                        <option value="Quy2" data-type="Quy">Quý 2</option>
                                        <option value="Quy3" data-type="Quy">Quý 3</option>
                                        <option value="Quy4" data-type="Quy">Quý 4</option>
                                </select>
                                <span class="">Năm: </span>  <input class="" type="text" name="nam" required>
                                <input class="" style="border:white; padding: 10px; cursor: pointer; font-weight:bold;" type="submit" name="btnthongke" value="Áp dụng">
                            </form>
                            <table  id="Content_ID" style="width:80%;">
                            <?php 
                            if(isset($data["result"])){
                                if (mysqli_num_rows($data["result"]) > 0 ) 
                                {
                                    $sum = 0;
                                    $no = 0;
                                    $sl = 0;
                                    if($data['phieunhap'])
                                    {
                                        echo "<tr><th colspan='8'>$data[type]";?>
                                    <tr>
                                    <th>Mã phiếu nhập</th>
                                    <th>Mã hàng</th>
                                    <th>Mã nhà phân phối</th>
                                    <th>Người lập</th>
                                    <th>Ngày lập</th>
                                    <th>Số lượng</th>
                                    <th>Chi phí</th>
                                    <th>Tổng chi phí</th>
                                    </tr>
                                    <?php
                                     while($row = mysqli_fetch_array($data["result"]))
                                    {
                                        $sum = $sum + $row['Phieunhap_cost'];
                                        $no = $no + 1;
                                        $chuoi = "<tr>";
                                        $chuoi .= "<td>".$row['Phieunhap_ma']."</td>";
                                        $chuoi .= "<td>".$row['Hanghoa_ma']."</td>";
                                        $chuoi .= "<td>".$row['NPP_ma']."</td>";
                                        $chuoi .= "<td>".$row['Nguoidung_ten']."</td>";
                                        $chuoi .= "<td>".$row['Phieunhap_ngay']."</td>";
                                        $chuoi .= "<td>".$row['Phieunhap_sl']."</td>";
                                        $chuoi .= "<td>".$row['Phieunhap_cost']."</td>";
                                        if($no == mysqli_num_rows($data["result"]))
                                        {
                                            $chuoi .= "<td>".$sum."</td>";
                                        }
                                        else{
                                            $chuoi .= "<td></td>";
                                        }
                                        $chuoi .= "</tr>";
                                        echo $chuoi;
                                    }
                                    }
                                    else{
                                        echo "<tr><th  colspan='11'>$data[type]</th></tr>";
                                        echo "<tr><th> Mã phiếu xuất";
                                        echo "</th>";
                                        echo "<th> Mã hàng";
                                        echo "</th>";
                                        echo "<th> Người lập";
                                        echo "</th>";
                                        echo "<th> Ngày lập";
                                        echo "</th>";
                                        echo "<th> Số lượng";
                                        echo "</th>";
                                        echo "<th> Giá xuất";
                                        echo "</th>";
                                        echo "<th> Khách hàng";
                                        echo "</th>";
                                        echo "<th> Số điện thoại";
                                        echo "</th>";
                                        echo "<th> Lãi";
                                        echo "</th>";
                                        echo "<th> Tổng số lượng";
                                        echo "</th>";
                                        echo "<th>Tổng doanh thu";
                                        echo "</th></tr>";
                                        while($row = mysqli_fetch_array($data["result"]))
                                        {
                                            $sum = $sum + $row['Phieuxuat_cost'];
                                            $no = $no + 1;
                                            $sl = $sl + $row['Phieuxuat_sl'];
                                            $chuoi = "<tr>";
                                            $chuoi .= "<td>".$row['Phieuxuat_ma']."</td>";
                                            $chuoi .= "<td>".$row['Hanghoa_ma']."</td>";
                                            $chuoi .= "<td>".$row['Nguoidung_ten']."</td>";
                                            $chuoi .= "<td>".$row['Phieuxuat_ngay']."</td>";
                                            $chuoi .= "<td>".$row['Phieuxuat_sl']."</td>";
                                            $chuoi .= "<td>".$row['Phieuxuat_cost']."</td>";
                                            $chuoi .= "<td>".$row['Phieuxuat_customer']."</td>";
                                            $chuoi .= "<td>".$row['Phieuxuat_sdt']."</td>";
                                            $chuoi .= "<td>".$row['Profit']."%</td>";
                                            
                                            if($no == mysqli_num_rows($data["result"]))
                                        {
                                            $chuoi .= "<td>".$sl."</td>";
                                            $chuoi .= "<td>".$sum."</td>";
                                        }
                                        else{
                                            $chuoi .= "<td></td>";
                                            $chuoi .= "<td></td>";
                                        }
                                            $chuoi .= "</tr>";
                                            echo $chuoi;
                                        }
                                    }
                                    
                                }
                                else
                                {
                                    echo "Không có kết quả";
                                }
                            }
                                
                            ?>
                            </table><input class="add" type="button" style="text-align: center; border: none; cursor:pointer;" onclick="tableToExcel('Content_ID')" value="Xuất ra excel"></center></div></div>
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
<script>
        $(function(){
    $("#gender").on("change", function(){
        var $target = $("#name").val(""),
            gender = $(this).val();
        
        $target
            .toggleClass("hidden", gender === "")
            .find("option:gt(0)").addClass("hidden")
            .siblings().filter("[data-type="+gender+"]").removeClass("hidden"); 
    });
});
</script>
</body>
</html>