<?php
session_start(); 
include("init.php");
$Dist = $_SESSION['Dist'];
$user_id = $_SESSION['Usr_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>ໃບບີນຮັບເງີນ/Payment Receipt)</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/img/pos.png" sizes="32x32">

    <link href="js/iconic.css" rel="stylesheet">
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
<td><td  colspan="3" align="left"><font size="2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>(ໃບບີນຮັບເງີນ/Payment Receipt)</b></font></td>
</tr><br>
<?php
    $sql = "SELECT ZONECODE,ZONENAME FROM ZONE WHERE ZONECODE='$Dist'";
    $query = sqlsrv_query($conn, $sql );
    while($resu = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
    ?>
<tr>
<td><td  colspan="3" align="left"><font size="1px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ເມືອງ:<?php echo $resu['ZONENAME'];?></b></font></td>
</tr>
<?php }?>
<tr>
<td><td  colspan="3" align="left"><font size="1px;">&nbsp;<b>ເບີໂທລະສັບ:054-212513</b></font></td>
</tr>

   
<table width="300px;">
<thead>
     <tr> 
	    	<td><font size="1"><b>ຊື່ຜູ້ນຳໃຊ້:</b></font></td>
            <td><font size="1"><b><?php echo $result['NAME'];?></b></font></td>
    		<td><font size="1"><b>ທີ່ຢູ່</b></font></td>
    		<td align="right"><font size="1"><b><?php echo $result['Khet_NameLao'];?></b></font></td>
    		
     </tr>
     <tr> 
	    	<td><font size="1"><b>ເລກບັນຊີ:</b></font></td>
            <td><font size="1"><b><?php echo $result['ACCOUNT'];?></b></font></td>
    		<td><font size="1">ເລກຜູ້ໃຊ້ນ້ຳ</font></td>
    		<td align="right"><font size="1"><b><?php echo $result['Tcode'];?></b></font></td>
    		
     </tr>
     <tr> 
	    	<td><font size="1"><b>ລະຫັດໃບບີນ:</b></font></td>
            <td><font size="1"><b><?php echo $result['BILLNO'];?></b></font></td>
    		<td><font size="1"><b>ເລກໝໍ້ແທກນ້ຳ</b></font></td>
    		<td align="right"><font size="1"><b>0.00</b></font></td>
    		
     </tr>

     <tr> 
	    	<td><font size="1"><b>ຜູ້ຮັບເງີນ:</b></font></td>
            <td><font size="1"><b><?php echo $user_id;?></b></font></td>
    		<td><font size="1"></font></td>
    		<td align="right"><font size="1"></font></td>
    		
     </tr>

    

    
    
    </thead>


     
        <td colspan="4"><hr></td>
        <tr>
          <td><font size="1"><b>ວັນທີຊຳລະ</b></font></td>
          <td><font size="1"></font></td>
          <td><font size="1"><b>ການຊຳລະ</b></font></td>
          <td align="right"><font size="1"><b>ຈຳນວນເງີນ</b></font></td>
         
         
         
         </tr>
         <tr>
         <?php $date = date("d/m/Y");
          
         
          ?>
          <td><font size="1"><b><?php echo $date;?></b></font></td>
          <td><font size="1"></font></td>
          <td><font size="1"><b>ເງີນສົດ</b></font></td>
          <td align="right"><font size="1"><b><?php echo number_format($result['TOTALDUE'],2);?></b></font></td>
         </tr>

         <tr>
          <td><font size="1"><b>ລວມທັງໜົດ</b></font></td>
          <td><font size="1"></font></td>
          <td><font size="1"></font></td>
          <td align="right"><font size="1"><b><?php echo number_format($result['TOTALDUE'],2);?></b></font></td>
         </tr>

        

    
        
         <td colspan="4"><hr></td>
        
         <tr>
          <td><font size="1"></font></td>
          <td><font size="1"><b>ລາຍເຊັ້ນຜູ້ຈ່າຍ</b></font></td>
          <td><font size="1"></font></td>
          <td align="right"><font size="1"><b>ລາຍເຊັ້ນຜູ້ຮັບ</b></font></td>
         </tr> 

       
        <tr>
        <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
        <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
        <td colspan="4">&nbsp;</td>
        </tr>

       
         <tr>
          <td   colspan="4"><font size="1"><b>ນ້ຳມີຄຸນຄ່າ ພວກເຮົາ ຄວນຊ່ວຍກັນປົກປັກຮັກສາ</b></font></td>
         </tr>

         <td colspan="4"><hr></td>
         <tr>
          <td align="right" colspan="4"><font size="1"><b>ພັດທະນາໂດຍ : ບໍລິສັດ ເອພີໄອເອັສ ຈຳກັດ</b></font></td>
         </tr>

</table>

        
</div>
<br>
</div>


</div>
<script src="jss/jquery.js"></script>
<script src="jss/jquery.dataTables.min.js.js"></script>
<script src="jss/dataTables.bootstrap.min.js"></script>
<script src="jss/bootstrap.min.js"></script>
<script>
		$(document).ready( function () {
		$('#example').DataTable();
} );
</script>
</table>
</body>
</html>


 



