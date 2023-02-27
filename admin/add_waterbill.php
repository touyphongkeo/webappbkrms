
<?php
session_start();
include("init.php");
?>
<!doctype html>
<html lang="en">

<head>
<?php
require_once 'header.php';
?>
</head>

<body>
    <!-- loader -->
    <div id="loader" style="background-color: #066DEB;">
        <img src="assets/img/pos.png" alt="icon" class="loading-icon">
    </div>
    <?php        
    $ACCOUNT = array($_GET["ACCOUNT"]);
    $stmt = "SELECT BB.ACCOUNT,BB.Tcode,BB.NAME,BB.RATRID,BB.PREVREAD,BB.PRESREAD,BB.Consumption,BB.Deviation,BB.waterBill,MRENT.RENT,BB.Sewage,BB.Tax,BB.Surcharge,BB.Total_Bill,BB.TOTALDUE,BB.Detive,BB.Sizecode,BB.CCODE,BB.RATRID FROM BB LEFT JOIN MRENT ON BB.Sizecode=MRENT.SIZECODE WHERE ACCOUNT= ?";   
    $query = sqlsrv_query($conn, $stmt, $ACCOUNT);
    $result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
    ?>

   <?php        
    $ACCOUNT = array($_GET["ACCOUNT"]);
    $stmt = "SELECT TOTALDUE FROM MASTER WHERE ACCOUNT= ?";
    $query = sqlsrv_query($conn, $stmt, $ACCOUNT);
    $row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
    ?> 

    <!-- App Header -->
    <div class="appHeader" style="background-color: #066DEB;">
          <div class="left">
            <a href="#" class="headerButton goBack">
                <font color="white"><ion-icon name="chevron-back-outline"></ion-icon></font>
            </a>
            </div>
           <div class="pageTitle"><font color="white">ຟອມປ້ອນເລກນ້ຳອ່ານ</font></div>
          <div class="right">
        </div>
    </div>

    <div id="appCapsule">
        <div class="section mt-2 mb-2">
            <div class="card red">
                <div class="card-body">
                    <form action="update_waterbill.php" method="POST">
                     
                         <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="RATRID"><font size="3px;">ເລກບັນຊີ</font></label>
                                <input type="tel" class="form-control" id="RATRID" name="RATRID" value="<?php echo $result['RATRID'];?>" readonly>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                    
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="ACCOUNT"><font size="3px;">ເລກບັນຊີ</font></label>
                                <input type="tel" class="form-control" id="ACCOUNT" name="ACCOUNT" value="<?php echo $result['ACCOUNT'];?>" readonly>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="Tcode"><font size="3px;">ລະຫັດຜູ້ໃຊ້</font></label>
                                <input type="tel" class="form-control" id="Tcode" name="Tcode" value="<?php echo $result['Tcode'];?>" readonly>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="NAME"><font size="3px;">ຊື່ຜູ້ໃຊ້ນ້ຳ</font></label>
                                <input type="tel" class="form-control" id="NAME" name="NAME"  value="<?php echo $result['NAME'];?>" readonly>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="RATRID"><font size="3px;">ປະເພດລູກຄ້າ</font></label>
                                <input type="tel" class="form-control" id="RATRID" name="RATRID" value="<?php echo $result['RATRID'];?>" readonly>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="PREVREAD"><font size="3px;">ເລກອ່ານຄັ້ງກອນ</font></label>
                                <input type="tel" class="form-control" id="PREVREAD" name="PREVREAD" value="<?php echo $result['PREVREAD'];?>" readonly>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="PRESREAD"><font size="3px;">ເລກຄັ້ງນີ້</font></label>
                                <input type="tel" class="form-control" id="PRESREAD" name="PRESREAD" value="<?php echo $result['PRESREAD'];?>" onkeyup="plus_x()">
 
                                <font color="red"><p id="demo"></p></font>
                            </div>
                           
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="Consumption"><font size="3px;">ບໍລີມາດນ້ຳ</font></label>
                                <input type="tel" class="form-control" id="Consumption" name="Consumption" value="<?php echo $result['Consumption'];?>" readonly>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>


                        <?php
                        $sql = "SELECT CCODE,CATNAME,RATE1,SLAB1,RATE2,SLAB2,RATE3,SLAB3,RATE4,SLAB4,RATE5,RTAX,MINCONSUMP,CURCODE,
                        CURNCYTYPE,SURCHARGE,SUR1,SDAY1,SUR2,SDAY2,SUR3,SDAY3,SEWER,SLAB5,VAT,Zone,Call,No,Cnt,DIS,Amt 
                        FROM RATE WHERE CCODE='01' AND Call='1'";
                        $stmt = sqlsrv_query($conn, $sql);
                        if( $stmt === false) {
                            die(print_r(sqlsrv_errors(), true));
                        }
                        while($rows = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
                        
                        @$CCODE = $rows['CCODE'];
                        @$CATNAME = $rows['CATNAME'];
                        @$RATE1 = $rows['RATE1'];
                        @$RATE2 = $rows['RATE2'];
                        @$RATE3 = $rows['RATE3'];
                        @$SLAB1 = $rows['SLAB1'];
                        @$SLAB2 = $rows['SLAB2'];
                        @$MINCONSUMP = $rows['MINCONSUMP'];
                        } 
                        ?>
                         <input type="hidden" class="form-control" id="SLAB2" name="SLAB2" value="<?php echo @$SLAB2;?>" readonly>
                        <input type="hidden" class="form-control" id="SLAB1" name="SLAB1" value="<?php echo @$SLAB1;?>" readonly>
                        <input type="hidden" class="form-control" id="RATE1" name="RATE1" value="<?php echo @$RATE1;?>" readonly>
                        <input type="hidden" class="form-control" id="RATE2" name="RATE2" value="<?php echo @$RATE2;?>"readonly>
                        <input type="hidden" class="form-control" id="RATE3" name="RATE3" value="<?php echo @$RATE3;?>"readonly>
                        <input type="hidden" class="form-control" id="MINCONSUMP" name="MINCONSUMP" value="<?php echo @$MINCONSUMP;?>"readonly>



                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="Deviation"><font size="3px;">ຄ່າຜິດດ່ຽງ</font></label>
                                <input type="text" class="form-control" id="Deviation" name="Deviation" value="<?php echo $result['Deviation'];?>" readonly>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>


                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="waterBill"><font size="3px;">ຄ່ານ້ຳ</font></label>
                                <input type="tel" class="form-control" id="waterBill" name="waterBill" value="<?php echo $result['waterBill'];?>" readonly>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>


                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="Mrent"><font size="3px;">ຄ່າເຊົ້າ</font></label>
                                <input type="tel" class="form-control" id="Mrent" name="Mrent" value="<?php echo $result['RENT'];?>" readonly>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="Sewage"><font size="3px;">ຄ່ານ້ຳເປື້ອນ</font></label>
                                <input type="tel" class="form-control" id="Sewage" name="Sewage" value="<?php echo $result['Sewage'];?>" readonly>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>


                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="Tax"><font size="3px;">ອາກອນ</font></label>
                                <input type="tel" class="form-control" id="Tax" name="Tax" value="<?php echo $result['Tax'];?>" readonly>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="Surcharge"><font size="3px;">ຈ່າຍເພີມ</font></label>
                                <input type="tel" class="form-control" id="Surcharge" name="Surcharge" value="<?php echo $result['Surcharge'];?>" readonly>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="Total_Bill"><font size="3px;">ລວມມູນຄ່າ</font></label>
                                <input type="tel" class="form-control" id="Total_Bill" name="Total_Bill" value="<?php echo $result['Total_Bill'];?>" readonly>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="TOTALDUE1"><font size="3px;">ໜີ້ຄ້າງຈ່າຍ</font></label>
                                <input type="tel" class="form-control" id="TOTALDUE1" name="TOTALDUE1" value="<?php echo $row['TOTALDUE'];?>" readonly>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="TOTALDUE"><font size="3px;">ເງີນຕ້ອງຈ່າຍ</font></label>
                                <input type="tel" class="form-control" id="TOTALDUE" name="TOTALDUE" value="<?php echo $result['TOTALDUE'];?>" readonly>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="Detive"><font size="3px;">ຄ່າສະເລຍ</font></label>
                                <input type="tel" class="form-control" id="Detive" name="Detive" value="<?php echo $result['Detive'];?>" readonly>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                    

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                              <button type="input" class="btn btn-primary btn-block btn-lg">ບັນທືກ</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>




<script src="assets/js/numeral.min.js"></script>
<script language="javascript">
function plus_x(){
var PREVREAD=Number($('#PREVREAD').val().replace(/[^0-9\.-]+/g,""));
$("#PREVREAD").val(numeral(PREVREAD).format('0,000'));

var PRESREAD=Number($('#PRESREAD').val().replace(/[^0-9\.-]+/g,""));
$("#PRESREAD").val(numeral(PRESREAD).format('0,000'));

var Consumption=Number($('#Consumption').val().replace(/[^0-9\.-]+/g,""));
$("#Consumption").val(numeral(Consumption).format('0,000'));

//3180
var RATE1=Number($('#RATE1').val().replace(/[^0-9\.-]+/g,""));
$("#RATE1").val(numeral(RATE1).format('0,000'));

//3600
var RATE2=Number($('#RATE2').val().replace(/[^0-9\.-]+/g,""));
$("#RATE2").val(numeral(RATE2).format('0,000'));
//4300
var RATE3=Number($('#RATE3').val().replace(/[^0-9\.-]+/g,""));
$("#RATE3").val(numeral(RATE3).format('0,000'));


var Mrent=Number($('#Mrent').val().replace(/[^0-9\.-]+/g,""));
$("#Mrent").val(numeral(Mrent).format('0,000'));

var waterBill=Number($('#waterBill').val().replace(/[^0-9\.-]+/g,""));
$("#waterBill").val(numeral(waterBill).format('0,000'));

//7
var SLAB1=Number($('#SLAB1').val().replace(/[^0-9\.-]+/g,""));
$("#SLAB1").val(numeral(SLAB1).format('0,000'));

//15
var SLAB2=Number($('#SLAB2').val().replace(/[^0-9\.-]+/g,""));
$("#SLAB2").val(numeral(SLAB2).format('0,000'));


var MINCONSUMP=Number($('#MINCONSUMP').val().replace(/[^0-9\.-]+/g,""));
$("#MINCONSUMP").val(numeral(MINCONSUMP).format('0,000'));

var Tax=Number($('#Tax').val().replace(/[^0-9\.-]+/g,""));
$("#Tax").val(numeral(Tax).format('0,000'));

var Mrent=Number($('#Mrent').val().replace(/[^0-9\.-]+/g,""));
$("#Mrent").val(numeral(Mrent).format('0,000'));

var Total_Bill=Number($('#Total_Bill').val().replace(/[^0-9\.-]+/g,""));
$("#Total_Bill").val(numeral(Total_Bill).format('0,000'));

var TOTALDUE1=Number($('#TOTALDUE1').val().replace(/[^0-9\.-]+/g,""));
$("#TOTALDUE1").val(numeral(TOTALDUE1).format('0,000'));


var TOTALDUE=Number($('#TOTALDUE').val().replace(/[^0-9\.-]+/g,""));
$("#TOTALDUE").val(numeral(TOTALDUE).format('0,000'));



var a = 5;

//
if (PRESREAD<PREVREAD) {
    document.getElementById("demo").innerHTML = "ຕົວເລກຈົດຄັ້ງນີ້ຕ້ອງຫຼາຍກວ່າຄັ້ງກ່ອນ";
    var sumption=PRESREAD-PREVREAD;
    if(sumption < 5){
        $("#Consumption").val(numeral(a).format('0,000'));
    }else if(sumption > 5){
        $("#Consumption").val(numeral(sumption).format('0,000'));
    }else{
        $("#Consumption").val(numeral(sumption).format('0,000'));
    }
}else if(PRESREAD==PREVREAD){
        $("#Consumption").val(numeral(a).format('0,000'));
}else{
        var sumption=PRESREAD-PREVREAD;
        $("#Consumption").val(numeral(sumption).format('0,000'));
}





//=========
if(sumption<=SLAB1){

    var acc1 = RATE1*sumption;
    $("#waterBill").val(numeral(acc1).format('0,000'));

    var tax1 = acc1+Mrent;
    var t1 = tax1*7/100;
    $("#Tax").val(numeral(t1).format('0,000'));

    var total1 = acc1+t1;
    $("#Total_Bill").val(numeral(total1).format('0,000'));

    var amont = total1+TOTALDUE1
    $("#TOTALDUE").val(numeral(amont).format('0,000'));

   
}else if(sumption<=SLAB2){
    var acc2 = RATE1*SLAB1;
    var acc2s = acc2 + RATE2*(sumption-SLAB1);
    $("#waterBill").val(numeral(acc2s).format('0,000'));


    var tax2 = acc2s+Mrent;
    var t2 = tax2*7/100;
    $("#Tax").val(numeral(t2).format('0,000'));

    var total2 = acc2+t2;
    $("#Total_Bill").val(numeral(total2).format('0,000'));

    var amont1 = total2+TOTALDUE1
    $("#TOTALDUE").val(numeral(amont1).format('0,000'));

    
}else if(sumption>SLAB2){
    var acc3 = RATE1*SLAB1;
    var acc3s = acc3 + RATE2*(SLAB2-SLAB1);
    var acc3ss = acc3s + RATE3*(sumption-SLAB2);
    $("#waterBill").val(numeral(acc3ss).format('0,000'));

    var tax3 = acc3ss+Mrent;
    var t3 = tax3*7/100;
    $("#Tax").val(numeral(t3).format('0,000'));

    var total3 = acc3ss+t3;
    $("#Total_Bill").val(numeral(total3).format('0,000'));


    var amont2 = total3+TOTALDUE1
    $("#TOTALDUE").val(numeral(amont2).format('0,000'));

}


}
</script>






   
    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="assets/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="assets/js/base.js"></script>


    



</body>

</html>