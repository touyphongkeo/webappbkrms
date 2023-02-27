
<?php 
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	include("dbconfig.php");
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$pass=mysqli_real_escape_string($con,$_POST['pass']);
		$select=mysqli_query($con,"select * from tbuser where userid='$name' and userpass='$pass' ");
            // echo "select * from tbuser where userid='$name' and userpass='$pass'";

             
		$check=mysqli_num_rows($select);
		if($check==1){
		  $x=mysqli_fetch_array($select);
		  if($x['userstatus']=="Admin"){
			  $_SESSION['userid']=$x[1];
			  $_SESSION['username']=$x[2];
			  $_SESSION['userpass']=$x[3];
			  $_SESSION['userstatus']=$x[4];
			  $_SESSION['adminlogin']=1;
			  
			  $_SESSION['fsale']=$x[6];
			  $_SESSION['ftbl']=$x[7];
			  $_SESSION['freport']=$x[8];
			  $_SESSION['fstock']=$x[9];
			  $_SESSION['fsetup']=$x[10];
			  $_SESSION['fusers']=$x[11];
			  $_SESSION['fedit']=$x[12];
			  
			echo "<script>location='admin/index.php';</script>";
			}elseif($x['userstatus']=="User"){
			  $_SESSION['userid']=$x[1];
			  $_SESSION['username']=$x[2];
			  $_SESSION['userpass']=$x[3];
			  $_SESSION['userstatus']=$x[4];
			  
			 $_SESSION['fsale']=$x[6];
			  $_SESSION['ftbl']=$x[7];
			  $_SESSION['freport']=$x[8];
			  $_SESSION['fstock']=$x[9];
			  $_SESSION['fsetup']=$x[10];
			  $_SESSION['fusers']=$x[11];
			  $_SESSION['fedit']=$x[12];
			  
			  $_SESSION['adminlogin']=1;
			  
		
			  
				echo "<script>location='admin/index.php';</script>";
			}
		}else{
			echo "<script>alert('ຂໍອະໄພ ! ຊື່ ແລະ ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ');location='index.php';</script>";
		}
?>