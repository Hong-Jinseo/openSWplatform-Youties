<?php
//리뷰 DB에 저장된 정보 가져오기
$host = 'localhost';
$user = 'root';
$pw = 'jinseo00';
$dbName = 'youties';

$conn = new mysqli($host, $user, $pw, $dbName) or die("Failed");

session_start();


$result_channel = mysqli_query($conn, "SELECT * FROM reviews WHERE email='{$_SESSION['my_email']}' ORDER BY id DESC") or die(mysqli_error($conn));
$result_tag = mysqli_query($conn, "SELECT * FROM tags WHERE email='{$_SESSION['my_email']}' ORDER BY id DESC") or die(mysqli_error($conn));
$total = mysqli_num_rows($result_channel);
$cnt = 0;
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

                    <h2>  My reviews</h2>

                    <div id="review-div">
                        <?php 
                        $row_review = mysqli_fetch_row($result_channel);
                        $row_tag = mysqli_fetch_row($result_tag);

                        $cnt = $cnt + 1;
                        
                        if ($cnt <= $total){?>
                            <div id="user-info">
                                <label id="user-info-star">
                                    <script>
                                        for (i=0; i< <?php echo $row_review[7];?>; i++){
                                            document.write("★ ");
                                        }
                                    </script>
                                </label>
                                <label id="user-info-date"> <?php echo $row_review[4];?></label>
                            </div><br>

                            <div id="user-channel">
                                <label id="user-info-channel"><b>CHANNEL</b> : <?php echo $row_review[3];?></label>
                            </div><br>

                            <div id="user-tag">
                                <label id="user-info-tag">
                                    <b>TAGS</b> : 
                                    <?php
                                        if ($row_tag[1] == 1){echo "재미있는  ";}
                                        if ($row_tag[2] == 2){echo "유익한  ";}
                                        if ($row_tag[3] == 3){echo "힐링되는  ";}
                                        if ($row_tag[4] == 4){echo "스토리텔링  ";}
                                        if ($row_tag[5] == 5){echo "몰입되는  ";}
                                        if ($row_tag[6] == 6){echo "감동적인  ";}
                                        if ($row_tag[7] == 7){echo "짧은 길이의  ";}
                                        if ($row_tag[8] == 8){echo "킬링타임  ";}
                                        if ($row_tag[9] == 9){echo "슬픈  ";}
                                    ?>
                                </label>
                            </div><br>

                            <div id="user-review">
                                <b><?php echo $row_review[5];?></b><br>
                                <?php echo $row_review[6];?>
                            </div>
                        <?php
                        }
                        else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                    </div>

                    <div id="review-div">
                        <?php 
                        $row_review = mysqli_fetch_row($result_channel);
                        $row_tag = mysqli_fetch_row($result_tag);

                        $cnt = $cnt + 1;
                        
                        if ($cnt <= $total){?>
                            <div id="user-info">
                                <label id="user-info-star">
                                    <script>
                                        for (i=0; i< <?php echo $row_review[7];?>; i++){
                                            document.write("★ ");
                                        }
                                    </script>
                                </label>
                                <label id="user-info-date"> <?php echo $row_review[4];?></label>
                            </div><br>

                            <div id="user-channel">
                                <label id="user-info-channel"><b>CHANNEL</b> : <?php echo $row_review[3];?></label>
                            </div><br>

                            <div id="user-tag">
                                <label id="user-info-tag">
                                    <b>TAGS</b> : 
                                    <?php
                                        if ($row_tag[1] == 1){echo "재미있는  ";}
                                        if ($row_tag[2] == 2){echo "유익한  ";}
                                        if ($row_tag[3] == 3){echo "힐링되는  ";}
                                        if ($row_tag[4] == 4){echo "스토리텔링  ";}
                                        if ($row_tag[5] == 5){echo "몰입되는  ";}
                                        if ($row_tag[6] == 6){echo "감동적인  ";}
                                        if ($row_tag[7] == 7){echo "짧은 길이의  ";}
                                        if ($row_tag[8] == 8){echo "킬링타임  ";}
                                        if ($row_tag[9] == 9){echo "슬픈  ";}
                                    ?>
                                </label>
                            </div><br>

                            <div id="user-review">
                                <b><?php echo $row_review[5];?></b><br>
                                <?php echo $row_review[6];?>
                            </div>
                        <?php
                        }
                        else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                    </div>

                    <div id="review-div">
                        <?php 
                        $row_review = mysqli_fetch_row($result_channel);
                        $row_tag = mysqli_fetch_row($result_tag);

                        $cnt = $cnt + 1;
                        
                        if ($cnt <= $total){?>
                            <div id="user-info">
                                <label id="user-info-star">
                                    <script>
                                        for (i=0; i< <?php echo $row_review[7];?>; i++){
                                            document.write("★ ");
                                        }
                                    </script>
                                </label>
                                <label id="user-info-date"> <?php echo $row_review[4];?></label>
                            </div><br>

                            <div id="user-channel">
                                <label id="user-info-channel"><b>CHANNEL</b> : <?php echo $row_review[3];?></label>
                            </div><br>

                            <div id="user-tag">
                                <label id="user-info-tag">
                                    <b>TAGS</b> : 
                                    <?php
                                        if ($row_tag[1] == 1){echo "재미있는  ";}
                                        if ($row_tag[2] == 2){echo "유익한  ";}
                                        if ($row_tag[3] == 3){echo "힐링되는  ";}
                                        if ($row_tag[4] == 4){echo "스토리텔링  ";}
                                        if ($row_tag[5] == 5){echo "몰입되는  ";}
                                        if ($row_tag[6] == 6){echo "감동적인  ";}
                                        if ($row_tag[7] == 7){echo "짧은 길이의  ";}
                                        if ($row_tag[8] == 8){echo "킬링타임  ";}
                                        if ($row_tag[9] == 9){echo "슬픈  ";}
                                    ?>
                                </label>
                            </div><br>

                            <div id="user-review">
                                <b><?php echo $row_review[5];?></b><br>
                                <?php echo $row_review[6];?>
                            </div>
                        <?php
                        }
                        else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                    </div>

                    <div id="review-div">
                        <?php 
                        $row_review = mysqli_fetch_row($result_channel);
                        $row_tag = mysqli_fetch_row($result_tag);

                        $cnt = $cnt + 1;
                        
                        if ($cnt <= $total){?>
                            <div id="user-info">
                                <label id="user-info-star">
                                    <script>
                                        for (i=0; i< <?php echo $row_review[7];?>; i++){
                                            document.write("★ ");
                                        }
                                    </script>
                                </label>
                                <label id="user-info-date"> <?php echo $row_review[4];?></label>
                            </div><br>

                            <div id="user-channel">
                                <label id="user-info-channel"><b>CHANNEL</b> : <?php echo $row_review[3];?></label>
                            </div><br>

                            <div id="user-tag">
                                <label id="user-info-tag">
                                    <b>TAGS</b> : 
                                    <?php
                                        if ($row_tag[1] == 1){echo "재미있는  ";}
                                        if ($row_tag[2] == 2){echo "유익한  ";}
                                        if ($row_tag[3] == 3){echo "힐링되는  ";}
                                        if ($row_tag[4] == 4){echo "스토리텔링  ";}
                                        if ($row_tag[5] == 5){echo "몰입되는  ";}
                                        if ($row_tag[6] == 6){echo "감동적인  ";}
                                        if ($row_tag[7] == 7){echo "짧은 길이의  ";}
                                        if ($row_tag[8] == 8){echo "킬링타임  ";}
                                        if ($row_tag[9] == 9){echo "슬픈  ";}
                                    ?>
                                </label>
                            </div><br>

                            <div id="user-review">
                                <b><?php echo $row_review[5];?></b><br>
                                <?php echo $row_review[6];?>
                            </div>
                        <?php
                        }
                        else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                    </div>

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