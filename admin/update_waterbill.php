<?php
    session_start();
    include("init.php");
	$date = date('Y-m-d H:i:s');
    $PRESREAD = $_POST['PRESREAD'];
    $PREVREAD = $_POST['PREVREAD'];
    $ACCOUNT = $_POST['ACCOUNT'];
    $Consumption = $_POST['Consumption'];
    $waterBill = $_POST['waterBill'];
    $Total_Bill = $_POST['Total_Bill'];
    $TOTALDUE = $_POST['TOTALDUE'];
    $Tax = $_POST['Tax'];
    $Status_PC = "1";
    $user_id = $_SESSION['Usr_id'];
    $bb = "5";
    $PRESREADS = filter_var($PRESREAD, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $PREVREADS = filter_var($PREVREAD, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $waterBills = filter_var($waterBill, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	$tax = filter_var($Tax, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	$Total_Bills = filter_var($Total_Bill, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	$TOTALDUES = filter_var($TOTALDUE, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	

	if($PRESREADS<$PREVREADS){
        echo "<script>alert('ຕົວເລກຈົດຄັ້ງນີ້ຕ້ອງຫຼາຍກວ່າຄັ້ງກ່ອນ');location.href='search.php';</script>";
    }else if($PRESREADS==$PREVREADS){
        echo "<script>alert('ຕົວເລກຈົດຄັ້ງນີ້ຕ້ອງຫຼາຍກວ່າຄັ້ງກ່ອນ');location.href='search.php';</script>";
    }else{

        if($Consumption<5){
            $sql = "UPDATE  BB SET
            PREVREAD = ?,
            PRESREAD = ?,
            Consumption = ?,
            waterBill = ?,
            Tax = ?,
            Total_Bill = ?,
            TOTALDUE = ?,
            Status_PC = ?,
            Bill_Usr = ?

            WHERE ACCOUNT = ?";
            $touy = array(
            $PREVREADS,
            $PRESREADS,
            $bb,
            $waterBills,
            $tax,
            $Total_Bills,
            $TOTALDUES,
            $Status_PC,
            $user_id,
            $_POST["ACCOUNT"]
            );
               $stmt = sqlsrv_query($conn, $sql, $touy);
               if( $stmt === false ) {
                echo "<script>alert('ຜິດຜາດ');location.href='search.php';</script>";
               }else{
                   echo "<script>alert('ບັນທຶກສຳເລັດ');location.href='print.php?ACCOUNT=$ACCOUNT';</script> ";
               }


        }else{
            $sql = "UPDATE  BB SET
            PREVREAD = ?,
            PRESREAD = ?,
            Consumption = ?,
            waterBill = ?,
            Tax = ?,
            Total_Bill = ?,
            TOTALDUE = ?,
            Status_PC = ?,
            Bill_Usr = ?

            WHERE ACCOUNT = ?";
            $touy = array(
            $PREVREADS,
            $PRESREADS,
            $Consumption,
            $waterBills,
            $tax,
            $Total_Bills,
            $TOTALDUES,
            $Status_PC,
            $user_id,
            $_POST["ACCOUNT"]
            );
            $stmt = sqlsrv_query($conn, $sql, $touy);
            if( $stmt === false ) {
              echo "<script>alert('ຜິດຜາດ');location.href='search.php';</script>";
            }else{
              echo "<script>alert('ບັນທຶກສຳເລັດ');location.href='print.php?ACCOUNT=$ACCOUNT';</script> ";
            }
        }

	
    }
	 sqlsrv_close($conn);
	
?>