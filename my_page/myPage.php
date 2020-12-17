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
$cnt2 = 1;
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

                    <div id="div1-1">
                        <div></div>
                        <div id="div1-1-2">
                            <h1><?php echo $_SESSION['my_name']?></h1>
                        </div>

                        <div id="div1-1-3">
                            <b><?php echo $_SESSION['my_email']?></b><br><br>
                            <b>내가 쓴 리뷰 수 : <?php echo $total?></b><br>
                        </div>
                    </div>

                    <figure>
                        <img style="width:80px" src="user.png" alt="" >
                    </figure>
                </div>

                <div id="div2">
                    
                <?php
					$sql = "SELECT * from reviews where email = '{$_SESSION['my_email']}'";
					$result = mysqli_query($connect, $sql);
					$num_rows = mysqli_num_rows($result);
					if($num_rows > 0){

					$row = mysqli_fetch_array($result);

					for($i2=0;$i2<$num_rows;$i2++){
						mysqli_data_seek($result, $i2);
						$row = mysqli_fetch_array($result);
						$kk[] = $row["rating"];

						$kk1[] = $row["sexual"];
						$kk2[] = $row["violent"];
						$kk3[] = $row["crude"];
						$kk4[] = $row["horror"];
						$kk5[] = $row["imitative"];
					}
					$kk = round(array_sum($kk)/$num_rows);
					$kk1 = round(array_sum($kk1));
					$kk2 = round(array_sum($kk2));
					$kk3 = round(array_sum($kk3));
					$kk4 = round(array_sum($kk4));
					$kk5 = round(array_sum($kk5));
					}else{
					echo " 데이터가 없습니다";
					}
					?>

					<div id="div4-2-2">
						<p class="star_2">
							<?php for($i=0;$i<$kk;$i++){ ?>
								<a href="javascript://" class="on">★</a>
							<?php }?>
								<?php for($i=0;$i<5-$kk;$i++){ ?>
								<a href="javascript://">★</a>
							<?php }?>
						</p>
					</div>
					  
					<div style="margin-top:15px;">
						<p>sexual : (<?php echo $kk1?>)</p>
						<p>violent : (<?php echo $kk2?>)</p>
						<p>crude : (<?php echo $kk3?>)</p>
						<p><p>horror : (<?php echo $kk4?>)</p>
						<p>encourage imitative actions : (<?php echo $kk5?>)</p>
					</div>
                </div>


                <h2 id="div3">My reviews</h2>

                <div id="div4" class="inner-div">
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
                                        if ($row_tag[2] == 1){echo "유익한  ";}
                                        if ($row_tag[3] == 1){echo "힐링되는  ";}
                                        if ($row_tag[4] == 1){echo "스토리텔링  ";}
                                        if ($row_tag[5] == 1){echo "몰입되는  ";}
                                        if ($row_tag[6] == 1){echo "감동적인  ";}
                                        if ($row_tag[7] == 1){echo "짧은 길이의  ";}
                                        if ($row_tag[8] == 1){echo "킬링타임  ";}
                                        if ($row_tag[9] == 1){echo "슬픈  ";}
                                    ?>
                                </label>
                            </div><br>

                            <div id="user-review">
                                <b><?php echo $row_review[5];?></b><br>
                                <?php echo $row_review[6];?>
                            </div>

                            <form id="delete-btn-form" action="delete_review.php" method="POST">
                                <input type="hidden" name="delete_data" value="<?php echo $row_review[0];?>">
                                <input type="submit" id="del" value="DEL">
                            </form>                          
                        <?php
                        }
                        else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div id="div5" class="inner-div">
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
                                        if ($row_tag[2] == 1){echo "유익한  ";}
                                        if ($row_tag[3] == 1){echo "힐링되는  ";}
                                        if ($row_tag[4] == 1){echo "스토리텔링  ";}
                                        if ($row_tag[5] == 1){echo "몰입되는  ";}
                                        if ($row_tag[6] == 1){echo "감동적인  ";}
                                        if ($row_tag[7] == 1){echo "짧은 길이의  ";}
                                        if ($row_tag[8] == 1){echo "킬링타임  ";}
                                        if ($row_tag[9] == 1){echo "슬픈  ";}
                                    ?>
                                </label>
                            </div><br>

                            <div id="user-review">
                                <b><?php echo $row_review[5];?></b><br>
                                <?php echo $row_review[6];?>
                            </div>

                            <form id="delete-btn-form" action="delete_review.php" method="POST">
                                <input type="hidden" name="delete_data" value="<?php echo $row_review[0];?>">
                                <input type="submit" id="del" value="DEL">
                            </form>                          
                        <?php
                        }
                        else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div id="div6" class="inner-div">
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
                                        if ($row_tag[2] == 1){echo "유익한  ";}
                                        if ($row_tag[3] == 1){echo "힐링되는  ";}
                                        if ($row_tag[4] == 1){echo "스토리텔링  ";}
                                        if ($row_tag[5] == 1){echo "몰입되는  ";}
                                        if ($row_tag[6] == 1){echo "감동적인  ";}
                                        if ($row_tag[7] == 1){echo "짧은 길이의  ";}
                                        if ($row_tag[8] == 1){echo "킬링타임  ";}
                                        if ($row_tag[9] == 1){echo "슬픈  ";}
                                    ?>
                                </label>
                            </div><br>

                            <div id="user-review">
                                <b><?php echo $row_review[5];?></b><br>
                                <?php echo $row_review[6];?>
                            </div>

                            <form id="delete-btn-form" action="delete_review.php" method="POST">
                                <input type="hidden" name="delete_data" value="<?php echo $row_review[0];?>">
                                <input type="submit" id="del" value="DEL">
                            </form>                          
                        <?php
                        }
                        else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div id="div7" class="inner-div">
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
                                       if ($row_tag[2] == 1){echo "유익한  ";}
                                       if ($row_tag[3] == 1){echo "힐링되는  ";}
                                       if ($row_tag[4] == 1){echo "스토리텔링  ";}
                                       if ($row_tag[5] == 1){echo "몰입되는  ";}
                                       if ($row_tag[6] == 1){echo "감동적인  ";}
                                       if ($row_tag[7] == 1){echo "짧은 길이의  ";}
                                       if ($row_tag[8] == 1){echo "킬링타임  ";}
                                       if ($row_tag[9] == 1){echo "슬픈  ";}
                                    ?>
                                </label>
                            </div><br>

                            <div id="user-review">
                                <b><?php echo $row_review[5];?></b><br>
                                <?php echo $row_review[6];?>
                            </div>

                            <form id="delete-btn-form" action="delete_review.php" method="POST">
                                <input type="hidden" name="delete_data" value="<?php echo $row_review[0];?>">
                                <input type="submit" id="del" value="DEL">
                            </form>                          
                        <?php
                        }
                        else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div id="div8" class="inner-div">
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
                                        if ($row_tag[2] == 1){echo "유익한  ";}
                                        if ($row_tag[3] == 1){echo "힐링되는  ";}
                                        if ($row_tag[4] == 1){echo "스토리텔링  ";}
                                        if ($row_tag[5] == 1){echo "몰입되는  ";}
                                        if ($row_tag[6] == 1){echo "감동적인  ";}
                                        if ($row_tag[7] == 1){echo "짧은 길이의  ";}
                                        if ($row_tag[8] == 1){echo "킬링타임  ";}
                                        if ($row_tag[9] == 1){echo "슬픈  ";}
                                    ?>
                                </label>
                            </div><br>

                            <div id="user-review">
                                <b><?php echo $row_review[5];?></b><br>
                                <?php echo $row_review[6];?>
                            </div>

                            <form id="delete-btn-form" action="delete_review.php" method="POST">
                                <input type="hidden" name="delete_data" value="<?php echo $row_review[0];?>">
                                <input type="submit" id="del" value="DEL">
                            </form>                          
                        <?php
                        }
                        else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div id="div9" class="inner-div">
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
                                        if ($row_tag[2] == 1){echo "유익한  ";}
                                        if ($row_tag[3] == 1){echo "힐링되는  ";}
                                        if ($row_tag[4] == 1){echo "스토리텔링  ";}
                                        if ($row_tag[5] == 1){echo "몰입되는  ";}
                                        if ($row_tag[6] == 1){echo "감동적인  ";}
                                        if ($row_tag[7] == 1){echo "짧은 길이의  ";}
                                        if ($row_tag[8] == 1){echo "킬링타임  ";}
                                        if ($row_tag[9] == 1){echo "슬픈  ";}
                                    ?>
                                </label>
                            </div><br>

                            <div id="user-review">
                                <b><?php echo $row_review[5];?></b><br>
                                <?php echo $row_review[6];?>
                            </div>

                            <form id="delete-btn-form" action="delete_review.php" method="POST">
                                <input type="hidden" name="delete_data" value="<?php echo $row_review[0];?>">
                                <input type="submit" id="del" value="DEL">
                            </form>                          
                        <?php
                        }
                        else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                    </div>
                </div>










                <div id="di">
                    <h2> </h2>

                

                    
                </div>

            </div>
        </main>




        <section>
            <div class="section-container">
            </div>
        </section>
    </body>
</html>