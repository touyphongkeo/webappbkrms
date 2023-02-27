<link rel="stylesheet" href="assets/style.css">
<?php 
session_start(); 
include('init.php');
$Dist = $_SESSION['Dist'];

$ZONECODE = $_POST['ZONECODE'];
$Khet_ID = $_POST['Khet_ID'];


if($ZONECODE==""){$a="";}
else{ $a="AND KhetID = N'$ZONECODE'";}
if($Khet_ID==""){$b="";}
else{ $b="AND MICODE = N'$Khet_ID'";}
?>


     
      <?php
        $i=0;
        $sql = "SELECT * FROM BB WHERE 1=1 $a $b and PRESREAD='0'";
       // echo "SELECT * FROM BB WHERE 1=1 $a $b";
        $query = sqlsrv_query($conn, $sql);
        while($bb = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
        $i++;
        ?>
        <div class="section mt-1 mb-2">
          
            <div class="card reds" id="book">
                <ul id="book" class="listview image-listview media transparent flush">
                    <li>
                        <a href="add_waterbill.php?ACCOUNT=<?php echo $bb['ACCOUNT'];?>" class="item">
                            <div class="imageWrapper">
                                <img src="assets/img/pos.png" alt="image" class="imaged w64">
                            </div>
                            <div class="in"> 
                                <div>
                                    <font color="blue"> ເລກບັນຊີ:<?php echo $bb['ACCOUNT'];?><br> <?php echo $bb['Name'];?> </font>
                                    <div class="text-muted">ເລກອ່ານຄັ້ງກອນ: <?php echo $bb['PREVREAD'];?> </div>
                                    <?php
                                    $date=$bb["PREVDATE"];
                                    ?>
                                    <div class="text-muted">ວັນທີຈົດຄັ້ງກອນ: <?PHP echo date_format($date,'d/m/Y');?> </div>
                                    <div class="text-muted">ໜີ້ຄ້າງຈ່າຍ: <?php echo number_format($bb['TOTALDUE'],2);?> </div>
                                </div> 
                            </div>
                        </a>
                    </li>
  
                </ul>
            </div>
        </div> 
      
        <?php }?>

