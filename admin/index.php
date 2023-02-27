<?php
session_start(); 
include 'init.php';
$userid = $_SESSION['userid'];
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
    <meta name="keywords" content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="assets/img/pos.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="manifest" href="__manifest.json">
    <style type="text/css">
        @import url("LAOS/stylesheet.css");
            body,td,th ,h3{
                font-family: LAOS;
            }
    
             @import url("LAOS/stylesheet.css");
            .save{
                font-family: LAOS;
            }
    </style>
    <style type="text/css">
            .auto-style1 {
                font-family: LAOS;
            }
        </style>
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
            <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
            <font color="white"></font>
            </a>
        </div>
        <div class="pageTitle">
            <div style="background-color: #066DEB;"><font color="white">ລະບົບຄຸ້ມຄອງ ຮ້ານ ອາຫານ BK</font></div>    
        </div>
        <div class="right">
           
        </div>
    </div>
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule">

       
<br>


        <!-- Stats -->
        <div class="section">
            <div class="row mt-2">
                <div class="col-6"><a href="search.php">
                    <div class="stat-box icon-wrapper" style="background-color: #066DEB;">
                        <div><font color="white">ລາຍການຂາຍ</font></div>               
                       <img src="assets/img/bb.png" alt="icon" width="100px;" height="100px">
                        
                    </div></a>
                </div>
                <div class="col-6"><a href="search_bill.php">
                    <div class="stat-box icon-wrapper" style="background-color: #066DEB;">
                        <div><font color="white"> ຍອດຂາຍ/ມື້</font></div>               
                       <img src="assets/img/icon.png" alt="icon" width="100px;" height="100px">
                        
                    </div></a>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-6"><a href="search_bills.php">
                    <div class="stat-box icon-wrapper" style="background-color: #066DEB;">
                        <div><font color="white">ລວມຍອດຂາຍ</font></div>               
                       <img src="assets/img/dd.png" alt="icon" width="100px;" height="100px">
                        
                    </div></a>
                </div>
                <div class="col-6"><a href="../logout.php">
                    <div class="stat-box icon-wrapper" style="background-color: #066DEB;">
                        <div><font color="white">ອອກຈາກລະບົບ</font></div>               
                       <img src="assets/img/lo.png" alt="icon" width="100px;" height="100px"> 
                    </div></a>
                </div>
            </div>
        </div>
  




        <div class="section mt-2 mb-2">
            <div class="card red">
                <div class="card-body">
                    <div class="p-1">
                        <div class="text-center">
                            <h4 style="color:#066DEB"><b>ພັດທະນາໂດຍ : ບໍລິສັດ ເອພີໄອເອັສ ຈຳກັດ</b></h4>

                            <a href="https://www.facebook.com/apislaos" class="btn btn-facebook btn-icon me-05">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>

                            <a href="http://apislao.net/" class="btn btn-linkedin btn-icon me-05">
                                <ion-icon name="logo-linkedin"></ion-icon>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 

    </div>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="search.php" class="item active">
            <div class="col">
             <ion-icon name="bookmarks-outline"></ion-icon>
                <strong>ເລກນ້ຳອ່ານ</strong>
            </div>
        </a>

        <a href="search_bill.php" class="item">
            <div class="col">
                <ion-icon name="document-text-outline"></ion-icon>
                <strong>ບີນແຈ້ງຄ່ານ້ຳ</strong>
            </div>
        </a>

        <a href="index.php" class="item">
            <div class="col">
               <ion-icon name="home-outline"></ion-icon>
                <strong>Home</strong>
            </div>
        </a>

        <a href="search_bills.php" class="item">
            <div class="col">
                <ion-icon name="card-outline"></ion-icon>
                <strong>ບີນຮັບເງີນຄ່ານ້ຳ</strong>
            </div>
        </a>

        <a href="../logout.php" class="item">
            <div class="col">
                <ion-icon name="log-out-outline"></ion-icon>
                <strong>ອອກຈາກລະບົບ</strong>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->




    <script src="assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="assets/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="assets/js/base.js"></script>

    <script>
        AddtoHome("2000", "once");
    </script>

</body>

</html>