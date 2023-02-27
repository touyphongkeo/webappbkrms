<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
    content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>log in</title>
    <meta name="description" content="Finapp HTML Mobile Template">
    <meta name="keywords" content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="admin/assets/img/pos.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="stylesheet" href="admin/assets/style.css">
    <link rel="manifest" href="admin/__manifest.json">

    <style type="text/css">
        @import url("admin/LAOS/stylesheet.css");
            body,td,th ,h3{
                font-family: LAOS;
            }
    
             @import url("admin/LAOS/stylesheet.css");
            .save{
                font-family: LAOS;
            }
    </style>
    <style type="text/css">
            .auto-style1 {
                font-family: LAOS;
            }
            body{
                background—color:#ffffff;
              margin-top: 10px;
            }
        </style>
</head>

<body>

    

    <div id="loader" style="background-color: #066DEB;">
        <img src="admin/assets/img/favicon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader" style="background-color: #066DEB;">
       
        <div class="left">
        
            <a href="#" class="headerButton goBack">
            </a>
        </div>

        <div class="left"><font color='white'>BK Cafe</font></div>
        <div class="right">
        </div>
    </div>
 
    <br>


    <div id="appCapsule">
    <?php include("dbconfig.php");?>

        <div class="section mb-5 p-2">
            <form action="check_login.php" method="POST">
                <div class="card red">

                <div class="section mt-2 text-center">
                <img src="admin/assets/img/sdf.jpg" alt="icon" class="loading-icon" width="80px;" height="80px;">
                    <h4>ຍີນດີຕອນຮັບທານ ເຂົ້າສູ່ລະບົບ</h4>
                </div>


                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="name"><font size="3px;">ຊື່ຜູ້ໃຊ້ *</font></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="pass"><font size="3px;">ລະຫັດຜ່ານ *</font></label>
                                <input type="password" class="form-control" id="pass" name="pass" autocomplete="off"
                                    placeholder="ກະລຸນາປ້ອນລະຫັດຜ່ານ" required>
                                    <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>


                        <div class="form-group basic">
                            <div class="input-wrapper">
                              <button type="submit" id="send" class="btn btn-danger btn-block btn-lg"><b>ເຂົ້າສູ່ລະບົບ</b></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


        </div>

    </div>

    <script src="admin/assets/js/lib/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="admin/assets/js/plugins/splide/splide.min.js"></script>
    <script src="admin/assets/js/base.js"></script>
</body>
</html>