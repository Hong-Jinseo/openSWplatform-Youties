<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Youties: Youtube Channel Review Site</title>
        <link rel="stylesheet" href="myPage_style.css"/>

        <script type = "text/javascript">
            function openSetting(){
                url="setting.php";
                window.open(url, "Setting", "width=400, height=330, menubar=no, toolbar=no");
            }
        </script>
    </head>

    <body>
        <header id="main_header_logo">

            <a href="../main.php">
                <img src="logo2_removebg.jpg" id="logo_header" alt="YOUTIES" width="150"/><br>
            </a>

            <!--로그아웃 기능-->
            <div id="header-login">
                <?php
                $connect = mysqli_connect('localhost', 'root', 'jinseo00', 'youties') or die ("connect fail");
                $query ="SELECT * FROM member ORDER BY id DESC";
                $result = $connect->query($query);

                if(!isset($_SESSION['my_name'])){ ?>   
                    <a class = "top_menu" href = "../sign_in_up_out/SignUp.php" target = "_top" color="white">SIGN UP</a> 
                    <a class = "top_menu" href = "../sign_in_up_out/SignIn.php" target = "_top" color="white">SIGN IN</a> 
                <?php
                }else { ?>              
                    <a class = "top_menu" href = "../my_page/myPage.php" target = "_top"><?php echo $_SESSION['my_name'];?></a> 
                    <a class = "top_menu" href = "../sign_in_up_out/SignOut.php" target = "_top">SIGN OUT</a> 
                <?php
                }
                ?>
            </div>
        </header>

        <main id="main">
            <div id="grid-main">
                <div class="main-container" id="div1">
                   
                        
                    <button type="button" id="setting" onClick="openSetting();">
                        <img src="setting.jpg" id="setting-img">
                    </button>

                </div>

                <div id="div2">
                    시각화
                </div>


                <div id="div3">
                    리뷰
                </div>

                <div id="div4">
                    좋아요
                </div>

            </div>
        </main>




        <section>
            <div class="section-container">
            </div>
        </section>
    </body>
</html>