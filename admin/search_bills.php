
<?php 
session_start(); 
include('init.php');
$Dist = $_SESSION['Dist'];

?>
<!doctype html>
<html lang="en">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>WATERBILL</title>
    <meta name="description" content="Finapp HTML Mobile Template">
    <meta name="keywords"
        content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="assets/img/pos.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
    <script type="text/javascript" src="assets/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <style type="text/css">
        @import url("LAOS/stylesheet.css");
            body,td,th ,h3{
                font-family: LAOS;
            }
    
             @import url("LAOS/stylesheet.css");
            .save{
                font-family: LAOS;
            }

            img {
                border-radius: 50%;
                }
             
    </style>
    <style type="text/css">
            .auto-style1 {
                font-family: LAOS;
            }
        </style>


<script>
	$(function(){
      //  alert('h');
		$('#search').keyup(function(){
			searchs($(this).val());
		});
		function searchs(value){
			$('#book li').each(function(){
				var aa='false';
				$(this).each(function(){
					if($(this).text().toLowerCase().indexOf
						(value.toLowerCase())>=0){
						aa='true';
					}
				});
				if(aa=='true'){
					$(this).show();
				}else{
					$(this).hide();
				}
			});
		}
	});
</script>

<script>
   
  $(function(){
   //alert('hh');
  $('#sd').click(function(){
  var ZONECODE = $('#ZONECODE').val();
  var Khet_ID = $('#Khet_ID').val();
  // alert(Khet_ID);

   $.post('search4.php',{
    ZONECODE:ZONECODE,
    Khet_ID:Khet_ID
   },
   function(output){
   $('#appCapsule').html(output).slideDown();
   });

 });
});

</script>


</head>

<body>

    <!-- loader -->
    <div id="loader" style="background-color: #066DEB;">
        <img src="assets/img/pos.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader" style="background-color: #066DEB;">
        <div class="left">
            <a href="index.php" class="headerButton goBack">
                <font color="white"><ion-icon name="chevron-back-outline"></ion-icon></font>
            </a>
        </div>
        <div class="pageTitle"><font color="white">ໃບບີນຮັບເງີນ/Payment Receipt</font></div>
        <div class="right">
           
        </div>
    </div>

    <div class="extraHeader"> 
              <div class="form-group searchbox">
                <div class="form-group searchbox">
                  <select type="text" class="form-control" id="ZONECODE" name="ZONECODE">
                   <?php
                    $sql = "SELECT ZONECODE,ZONENAME FROM ZONE WHERE ZONECODE='$Dist'";
                    $query = sqlsrv_query($conn, $sql );
                    while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    ?>
                    <option value="<?php echo $result['ZONECODE']; ?>"><?php echo $result['ZONENAME'];?></option>
                    <?php }?>   
                    </select>
                   <i class="input-icon">
                  <ion-icon name="search-outline"></ion-icon>
                </i>
                </div>
              
            
                <div class="form-group searchbox">
                   <select type="text" class="form-control" id="Khet_ID" name="Khet_ID">
                   <?php
                    $sql = "SELECT Khet_ID,Khet_NameLao FROM KHET WHERE  ZONECODE='$Dist'";
                    $query = sqlsrv_query($conn, $sql );
                    while($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    ?>
                   <option value="<?php echo $row['Khet_ID']; ?>"><?php echo $row['Khet_NameLao'];?></option>
                   <?php }?>    
                </select>
                    <i class="input-icon">
                    <ion-icon name="search-outline"></ion-icon>
                </i>
               </div> 
               
               &nbsp;

               <div class="form-group">
                <button type="submit" id="sd" class="btn btn-info"> &nbsp;ຄົ້ນຫາ
                <i class="input-icon">
                    <font color="white"><ion-icon name="search-outline"></ion-icon></font>
                </i>
                
               </div>
            </div>
       
    </div>
  


    <br>

   
      <div id="appCapsule" class="extra-header-active full-height">
        
     
    
      
       
        <div  align="center">
        <img src="assets/img/pos.png" width="300px;">
        </div>
        <div  align="center"><font color="green">
         ບໍມີລາຍການຂໍ້ມູນກະລຸນາຄົ້ນຫາ</font>
        </div>
      
        
    </div>
 

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