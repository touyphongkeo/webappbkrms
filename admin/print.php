<?php
session_start(); 
include("init.php");
$Dist = $_SESSION['Dist'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>ໃບບີນແຈ້ງຄ່ານ້ຳປະປາ</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
<!--	<link href="//fonts.googleapis.com/css?family=Poppins:100i,200,200i,300,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">-->
	<link href="js/iconic.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/img/pos.png" sizes="32x32">

    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>	
	


</head>

<style type="text/css">
    @import url("LAOS/stylesheet.css");
body,td,th ,h3{
	font-family: LAOS;
}
.hbg{ color:#DFDFDF;}
</style>


<style type="text/css">
#card_font{
	
	font-size:12px;
}
.card_box{
	
	padding:5px;	
	font-family:Helvetica, Arial, sans-serif;
	font-size:12px;
	font-weight:bold;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 4px;
}
#card_photo{
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
}
.box_border{
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 10px;
	padding:3px;
	border:1px solid #666;
	background:#CCC;
}
.text_staff{
	font-size:10px;
	color:#999;
}


td {
  padding-top: 0px;
  padding-bottom: 0px;  
}

</style>


<?php        
$ACCOUNT = array($_GET["ACCOUNT"]);
$stmt = "SELECT BB.ACCOUNT,BB.Tcode,BB.KhetID,BB.PRESDATE,BB.AREACODE,BB.PREVDATE,BB.PREVDATE,BB.BILLNO,BB.NAME,BB.RATRID,BB.PREVREAD,BB.PRESREAD,BB.Consumption,BB.Deviation,BB.waterBill,MRENT.RENT,BB.Sewage,BB.Tax,BB.Surcharge,BB.Total_Bill,BB.TOTALDUE,BB.Detive,BB.Sizecode,BB.CCODE,BB.RATRID,KHET.Khet_NameLao FROM BB 
LEFT JOIN MRENT ON BB.Sizecode=MRENT.SIZECODE 
RIGHT JOIN KHET ON BB.MICODE=KHET.Khet_ID 
WHERE ACCOUNT= ?";   
$query = sqlsrv_query($conn, $stmt, $ACCOUNT);
$result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
?>

<!--<body onLoad="printpage()"-->
<div class="container">
  <body onLoad="javascript:window.print();">
	<div>
  
<tr>

<td class="container" style="display: flex; height: 100px;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <img src="assets/img/pos.png" alt="" id="show_image"  width="80px" height="70px"></td>
</tr><br>


<tr>
<td><td  colspan="3" align="left"><font size="3px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ລັດວີສາຫະກິດນ້ຳປະປາ ແຂວງ ວຽງຈັນ</b></font></td>
</tr><br>

<tr>
<td><td  colspan="3" align="left"><font size="2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>(ໃບບີນແຈ້ງຄ່ານ້ຳປະປາ)</b></font></td>
</tr><br>

<tr>
<td><td  colspan="3" align="left"><font size="1px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>(ເລກທີບີນ/<?php echo $result['BILLNO'];?>)</b></font></td>
</tr><br>
<?php
    $sql = "SELECT ZONECODE,ZONENAME FROM ZONE WHERE ZONECODE='$Dist'";
    $query = sqlsrv_query($conn, $sql );
    while($resu = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
    ?>
    <tr>
    <td><td  colspan="3" align="left"><font size="1px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ເມືອງ:<?php echo $resu['ZONENAME'];?> </font></td>
    </tr>
   
<?php }?>

<tr>
<td><td  colspan="3" align="left"><font size="1px;">&nbsp;ເບີໂທລະສັບ:054-212513</font></td>
</tr>
<?php
$date=$result["PREVDATE"];
?>
<tr>
<td><td  colspan="3" align="left"><font size="1px;">&nbsp;ບີນເດືອນ:<?PHP echo date_format($date,'m/Y');?></font></td>
</tr>
   

<table width="300px;">
<thead>
     <tr> 
	    	<td><font size="1">ຊື່ຜູ້ນຳໃຊ້: </font></td>
            <td><font size="1"><?php echo $result['NAME'];?></font></td>
    		<td><font size="1">ປະເພດຜູ້ນຳໃຊ້</font></td>
    		<td align="right"><font size="1"><?php echo $result['KhetID'];?></font></td>
    		
     </tr>
     <tr> 
	    	<td><font size="1">ທີ່ຢູ່:</font></td>
            <td><font size="1">ບ.<?php echo $result['Khet_NameLao'];?></font></td>
           
    		<td><font size="1">ວັນທີຈົດຄັ້ງກ່ອນ</font></td>
            <?php
            $dates=$result["PREVDATE"];
            ?>
    		<td align="right"><font size="1"><?PHP echo date_format($dates,'d/m/Y');?></font></td>
    		
     </tr>
     <tr> 
	    	<td><font size="1">ອານຸເຂດ:</font></td>
            <td><font size="1"><?php echo $result['AREACODE'];?></font></td>
    		<td><font size="1">ວັນທີຈົດຄັ້ງນີ້</font></td>
            <?php
            $date=$result["PRESDATE"];
            ?>
    		<td align="right"><font size="1"><?PHP echo date_format($date,'d/m/Y');?></font></td>
    		
     </tr>

     <tr> 
	    	<td><font size="1">ເລກບັນຊີ:</font></td>
            <td><font size="1"><?php echo $result['ACCOUNT'];?></font></td>
    		<td><font size="1">ເລກອ່ານຄັ້ງກ່ອນ</font></td>
    		<td align="right"><font size="1"><?php echo $result['PREVREAD'];?></font></td>
    		
     </tr>

     <tr> 
	    	<td><font size="1">ເລກຜູ້ໃຊ້ນ້ຳ:</font></td>
            <td><font size="1"><?php echo $result['Tcode'];?></font></td>
    		<td><font size="1">ເລກອ່ານຄັ້ງນີ້</font></td>
    		<td align="right"><font size="1"><?php echo $result['PRESREAD'];?></font></td>
    		
     </tr>

     <tr> 
	    	<td><font size="1">ເລກແທກນ້ຳ:</font></td>
            <td><font size="1">0.00</font></td>
    		<td><font size="1">ບໍລີມາດນ້ຳໃຊ້:</font></td>
    		<td align="right"><font size="1"><?php echo $result['Consumption'];?> ມ³</font></td>
    		
     </tr>
    
    </thead>


     
        <td colspan="4"><b><hr></b></td>

        <tr>
          <td><font size="1"><b>ລາຍລະອຽດ</b></font></td>
          <td><font size="1"><b>ບໍລີມາດ</b></font></td>
          <td><font size="1"><b>ລາຄາ</b></font></td>
          <td align="right"><font size="1"><b>ເງີນຄ່ານ້ຳ</b></font></td>
         </tr>

         <tr>
          <td><font size="1">0-10 ມ³</font></td>
          <td><font size="1">10</font></td>
          <td><font size="1">1379</font></td>
          <td align="right"><font size="1">13.790</font></td>
         </tr>

         <tr>
          <td><font size="1">1l-30 ມ³</font></td>
          <td><font size="1">20</font></td>
          <td><font size="1">1910</font></td>
          <td align="right"><font size="1">38,200</font></td>
         </tr>

         <tr>
          <td><font size="1">3l-50 ມ³</font></td>
          <td><font size="1">20</font></td>
          <td><font size="1">2440</font></td>
          <td align="right"><font size="1">48,800</font></td>
         </tr>

         <tr>
          <td><font size="1">>50 ມ³</font></td>
          <td><font size="1">50</font></td>
          <td><font size="1">2971</font></td>
         
          <td align="right"><font size="1">148,550</font></td>
         </tr>
        
        
         <td colspan="4"><hr></td>
        
         <tr>
          <td><font size="1">ຄັ້ງທີ I</font></td>
          <?php $moth = date("m");
          $moths = $moth-2;
         
          ?>

          <?php $mothd = date("m");
          $moths1 = $mothd-1;
         
          ?>

         <?php $mot = date("m");
         
         
          ?>

        <?php $year = date("Y");
           
          ?>

          <td><font size="1">ແຕ່ເດືອນ</font></td>
          <td><font size="1"><?php echo $moths;?>/<?php echo $year;?> - <?php echo $moths1;?>/<?php echo $year;?></font></td>
          <td align="right"><font size="1">0.00</font></td>
         </tr>

         <tr>
          <td><font size="1">ຄັ້ງທີ II</font></td>
          <td><font size="1">ແຕ່ເດືອນ</font></td>
          <td><font size="1"><?php echo $moths1;?>/<?php echo $year;?> - <?php echo $mot;?>/<?php echo $year;?></font></td>
          <td align="right"><font size="1"><?php echo number_format($result['waterBill'],2);?></font></td>
         </tr>

         <tr>
          <td><font size="1"></font></td>
          <td><font size="1">ຄ່າເຊົາ</font></td>
          <td><font size="1"></font></td>
          <td align="right"><font size="1"><?php echo number_format($result['RENT'],2);?></font></td>
         </tr>

         <tr>
          <td><font size="1"></font></td>
          <td><font size="1">ດຳນ້າເປືອນ</font></td>
          <td><font size="1"></font></td>
          <td align="right"><font size="1"><?php echo number_format($result['Sewage'],2);?></font></td>
         </tr>

         <tr>
          <td><font size="1"></font></td>
          <td><font size="1">ອາກອນ 7%</font></td>
          <td><font size="1"></font></td>
          <td align="right"><font size="1"><?php echo number_format($result['Tax'],2);?></font></td>
         </tr>

         <tr>
          <td><font size="1"></font></td>
          <td><font size="1">ລວມເງີນໃນເດືອນ</font></td>
          <td><font size="1"></font></td>
          <td align="right"><font size="1"><?php echo number_format($result['Total_Bill'],2);?></font></td>
         </tr>
         <?php        
            $ACCOUNT = array($_GET["ACCOUNT"]);
            $stmt = "SELECT TOTALDUE FROM MASTER WHERE ACCOUNT= ?";
            $query = sqlsrv_query($conn, $stmt, $ACCOUNT);
            $row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
            ?>
         <tr>
          <td><font size="1"></font></td>
          <td><font size="1">ໜື້ຄ້າງຈ່າຍ:</font></td>
          <td><font size="1"></font></td>
          <td align="right"><font size="1"><?php echo number_format($row['TOTALDUE'],2);?></font></td>
         </tr>

         <tr>
         <td><font size="1"></font></td>
          <td><font size="1">ລວມເງີນທີ່ຕ້ອງຈ່າຍ:</font></td>
          <td><font size="1"></font></td>
          <td align="right"><font size="1"><?php echo number_format($result['TOTALDUE'],2);?></font></td>
         </tr>

         <tr>
         <td><font size="1"></font></td>
          <td><font size="1">&nbsp;<?php echo $result['ACCOUNT'];?></font></td>
          <td><font size="1"></font></td>
          <td align="right"><font size="1"></font></td>
         </tr>


         <tr>
          <td><font size="1"></font></td>
          <td><img src="assets/img/cod.jpg" alt="" id="show_image"  width="50px" height="20px"></td>
          <td><font size="1"></font></td>
          <td></td>
         </tr>

         <tr>
         <td colspan="4"><font size="1">ຄຳເຕືອນ: ກະລຸນາຈ່າຍກ່ອນ 30/<?php echo $mot;?>/<?php echo $year; ?></font></td>
        
         </tr>

         <tr>
          <td  colspan="4"><font size="1">ໜາຍເຫດ: ໃບບີນຄ່ານ້ຳປະປ່າສາມາດໃຊ້ແທນໃບທວງໜີໄດ້</font></td>
         </tr>
         <tr>
          <td   colspan="4"><font size="1">ນ້ຳມີຄຸນຄ່າ ພວກເຮົາ ຄວນຊ່ວຍກັນປົກປັກຮັກສາ</font></td>
         </tr>

         <td colspan="4"><hr></td>
         <tr>
          <td align="right" colspan="4"><font size="1">ພັດທະນາໂດຍ : ບໍລິສັດ ເອພີໄອເອັສ ຈຳກັດ</font></td>
         </tr>

       



</table>

        
</div>
<br>
</div>



</div>
<!-- 
<?php
		echo "<meta http-equiv='refresh' content='0; url=search.php'>";	
?> -->

<script src="jss/jquery.js"></script>
<script src="jss/jquery.dataTables.min.js.js"></script>
<script src="jss/dataTables.bootstrap.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
<script src="jss/bootstrap.min.js"></script>
<script>
		$(document).ready( function () {
		$('#example').DataTable();
	} );
	</script>
</table>
</body>
</html>


 



