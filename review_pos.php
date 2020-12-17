<?php
$host = '127.0.0.1';
$user = 'root';
$pw = 'jinseo00';
$dbName = 'youties';

$conn = new mysqli($host, $user, $pw, $dbName) or die("Failed");
$conn2 = new mysqli($host, $user, $pw, 'youtube_info') or die("Failed");

//리뷰 긍정
session_start();
$result_3 = mysqli_query($conn, "SELECT * FROM reviews WHERE channel='haha ha' ORDER BY rating DESC") or die(mysqli_error($conn));
$result_tag = mysqli_query($conn, "SELECT * FROM tags WHERE email='{$_SESSION['my_email']}' ORDER BY id DESC") or die(mysqli_error($conn));$cnt = 0;
$cnt = 0;
$total = mysqli_num_rows($result_3);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Youties: Reviews</title>
        <link rel="stylesheet" href="review_style.css"/>

        <script type = "text/javascript">
            

            function colorChange(num) {
                var bgColor = ["#bbbaba", "#c0412b"];
                var fontColor = ["#000000", "#ffffff"];
                
                var bodyTag = document.getElementById("tag"+num);
                var tag = document.getElementById("tag_hidden"+num);

                if(tag.value == 0) {
                    bodyTag.style.backgroundColor = bgColor[0];
                    bodyTag.style.color = fontColor[0];
                }
                else {
                    bodyTag.style.backgroundColor = bgColor[1];
                    bodyTag.style.color = fontColor[1];
                }
            }

            function chk_tag(num){
                var tag = document.getElementById("tag_hidden"+num);
                if(tag.value == 0) {tag.value = 1;}
                else {tag.value = 0;}
            }
        </script>
    </head>

    <body>
        <header id="main_header_logo">

            <a href="../main.php">
                <img src="image/logo2_removebg.jpg" id="logo_header" alt="YOUTIES" width="150"/><br>
            </a>

            <!--로그아웃 기능-->
            <div id="header-login">
                <?php
                
                $connect = mysqli_connect('127.0.0.1', 'root', 'jinseo00', 'youties') or die ("connect fail");
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

        <div id="main">
        
            <div class="main-container">

                <div id="option" class="inner-div">
                    <form action="review_opt.php" method="POST">

                        <div id="sort-button">
                            <button type="button" id="opt2" name="opt2" class="opt-btn" value=0 onclick="location.href='./review_def.php'">Most recent</button>
                            <input type="hidden" id="opt_hidden2" name="opt_hidden2" value=0>
                            <button type="button" id="opt3" name="opt3" class="opt-btn" value=0 style="color: #ffffff; background: #c0412b;" onclick="location.href='./review_pos.php'">Positive</button>
                            <input type="hidden" id="opt_hidden3" name="opt_hidden3" value=0>
                            <button type="button" id="opt4" name="opt4" class="opt-btn" value=0 onclick="location.href='./review_neg.php'">Negative</button>
                            <input type="hidden" id="opt_hidden4" name="opt_hidden4" value=0>

                        </div>

                        
                    </form>
                </div>


                <div id="review-content">

                    <div id="review-detail">

                    <div id="div1" class="inner-div inner1">
                            <?php
                                $row = mysqli_fetch_row($result_3);
                                $row_tag = mysqli_fetch_row($result_tag);
                                $cnt = $cnt + 1;
                                if ($cnt <= $total){?>
                            
                        
                            <div id="user-info">
                                <label id="user-info-star">
                                    <script>
                                        for (i=0; i< <?php echo $row[7];?>; i++){
                                            document.write("★ ");
                                        }
                                    </script>
                                </label>
                                <label id="user-info-date"><?php echo $row[4];?></label>
                                <label id="user-info-num">Youties #<?php echo $row[0];?></label>
                            </div>

                            <div id="tags">
                                <script>
                                    for(var k=1; k<5; k++){
                                        if (document.getElementById(i) == 1){
                                            <?php echo $row[4];?>
                                        }
                                    }
                                    
                                </script>

                                
                            </div>

                            <div id="user-review">
                                <b><?php echo $row[5];?></b> 
                                <p><?php echo $row[6];?></p>
                            </div>

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

                            <?php
                                }
                                else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                        </div>

                        <div id="div1" class="inner-div inner1">
                            <?php
                                $row = mysqli_fetch_row($result_3);
                                $row_tag = mysqli_fetch_row($result_tag);
                                $cnt = $cnt + 1;
                                if ($cnt <= $total){?>
                            
                        
                            <div id="user-info">
                                <label id="user-info-star">
                                    <script>
                                        for (i=0; i< <?php echo $row[7];?>; i++){
                                            document.write("★ ");
                                        }
                                    </script>
                                </label>
                                <label id="user-info-date"><?php echo $row[4];?></label>
                                <label id="user-info-num">Youties #<?php echo $row[0];?></label>
                            </div>

                            <div id="tags">
                                <script>
                                    for(var k=1; k<5; k++){
                                        if (document.getElementById(i) == 1){
                                            <?php echo $row[4];?>
                                        }
                                    }
                                    
                                </script>

                                
                            </div>

                            <div id="user-review">
                                <b><?php echo $row[5];?></b> 
                                <p><?php echo $row[6];?></p>
                            </div>

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
                            
                            <?php
                                }
                                else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                        </div>

                        <div id="div1" class="inner-div inner1">
                            <?php
                                $row = mysqli_fetch_row($result_3);
                                $row_tag = mysqli_fetch_row($result_tag);
                                $cnt = $cnt + 1;
                                if ($cnt <= $total){?>
                            
                        
                            <div id="user-info">
                                <label id="user-info-star">
                                    <script>
                                        for (i=0; i< <?php echo $row[7];?>; i++){
                                            document.write("★ ");
                                        }
                                    </script>
                                </label>
                                <label id="user-info-date"><?php echo $row[4];?></label>
                                <label id="user-info-num">Youties #<?php echo $row[0];?></label>
                            </div>

                            <div id="tags">
                                <script>
                                    for(var k=1; k<5; k++){
                                        if (document.getElementById(i) == 1){
                                            <?php echo $row[4];?>
                                        }
                                    }
                                    
                                </script>

                                
                            </div>

                            <div id="user-review">
                                <b><?php echo $row[5];?></b> 
                                <p><?php echo $row[6];?></p>
                            </div>

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
                            
                            <?php
                                }
                                else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                        </div>

                        <div id="div1" class="inner-div inner1">
                            <?php
                                $row = mysqli_fetch_row($result_3);
                                $row_tag = mysqli_fetch_row($result_tag);
                                $cnt = $cnt + 1;
                                if ($cnt <= $total){?>
                            
                        
                            <div id="user-info">
                                <label id="user-info-star">
                                    <script>
                                        for (i=0; i< <?php echo $row[7];?>; i++){
                                            document.write("★ ");
                                        }
                                    </script>
                                </label>
                                <label id="user-info-date"><?php echo $row[4];?></label>
                                <label id="user-info-num">Youties #<?php echo $row[0];?></label>
                            </div>

                            <div id="tags">
                                <script>
                                    for(var k=1; k<5; k++){
                                        if (document.getElementById(i) == 1){
                                            <?php echo $row[4];?>
                                        }
                                    }
                                    
                                </script>

                                
                            </div>

                            <div id="user-review">
                                <b><?php echo $row[5];?></b> 
                                <p><?php echo $row[6];?></p>
                            </div>

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
                            
                            <?php
                                }
                                else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                        </div>

                        <div id="div1" class="inner-div inner1">
                            <?php
                                $row = mysqli_fetch_row($result_3);
                                $row_tag = mysqli_fetch_row($result_tag);
                                $cnt = $cnt + 1;
                                if ($cnt <= $total){?>
                            
                        
                            <div id="user-info">
                                <label id="user-info-star">
                                    <script>
                                        for (i=0; i< <?php echo $row[7];?>; i++){
                                            document.write("★ ");
                                        }
                                    </script>
                                </label>
                                <label id="user-info-date"><?php echo $row[4];?></label>
                                <label id="user-info-num">Youties #<?php echo $row[0];?></label>
                            </div>

                            <div id="tags">
                                <script>
                                    for(var k=1; k<5; k++){
                                        if (document.getElementById(i) == 1){
                                            <?php echo $row[4];?>
                                        }
                                    }
                                    
                                </script>

                                
                            </div>

                            <div id="user-review">
                                <b><?php echo $row[5];?></b> 
                                <p><?php echo $row[6];?></p>
                            </div>

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
                            
                            <?php
                                }
                                else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                        </div>

                        <div id="div1" class="inner-div inner1">
                            <?php
                                $row = mysqli_fetch_row($result_3);
                                $row_tag = mysqli_fetch_row($result_tag);
                                $cnt = $cnt + 1;
                                if ($cnt <= $total){?>
                            
                        
                            <div id="user-info">
                                <label id="user-info-star">
                                    <script>
                                        for (i=0; i< <?php echo $row[7];?>; i++){
                                            document.write("★ ");
                                        }
                                    </script>
                                </label>
                                <label id="user-info-date"><?php echo $row[4];?></label>
                                <label id="user-info-num">Youties #<?php echo $row[0];?></label>
                            </div>

                            <div id="tags">
                                <script>
                                    for(var k=1; k<5; k++){
                                        if (document.getElementById(i) == 1){
                                            <?php echo $row[4];?>
                                        }
                                    }
                                    
                                </script>

                                
                            </div>

                            <div id="user-review">
                                <b><?php echo $row[5];?></b> 
                                <p><?php echo $row[6];?></p>
                            </div>

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
                            
                            <?php
                                }
                                else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                        </div>

                        <div id="div1" class="inner-div inner1">
                            <?php
                                $row = mysqli_fetch_row($result_3);
                                $row_tag = mysqli_fetch_row($result_tag);
                                $cnt = $cnt + 1;
                                if ($cnt <= $total){?>
                            
                        
                            <div id="user-info">
                                <label id="user-info-star">
                                    <script>
                                        for (i=0; i< <?php echo $row[7];?>; i++){
                                            document.write("★ ");
                                        }
                                    </script>
                                </label>
                                <label id="user-info-date"><?php echo $row[4];?></label>
                                <label id="user-info-num">Youties #<?php echo $row[0];?></label>
                            </div>

                            <div id="tags">
                                <script>
                                    for(var k=1; k<5; k++){
                                        if (document.getElementById(i) == 1){
                                            <?php echo $row[4];?>
                                        }
                                    }
                                    
                                </script>

                                
                            </div>

                            <div id="user-review">
                                <b><?php echo $row[5];?></b> 
                                <p><?php echo $row[6];?></p>
                            </div>

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
                            
                            <?php
                                }
                                else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                        </div>

                        <div id="div1" class="inner-div inner1">
                            <?php
                                $row = mysqli_fetch_row($result_3);
                                $row_tag = mysqli_fetch_row($result_tag);
                                $cnt = $cnt + 1;
                                if ($cnt <= $total){?>
                            
                        
                            <div id="user-info">
                                <label id="user-info-star">
                                    <script>
                                        for (i=0; i< <?php echo $row[7];?>; i++){
                                            document.write("★ ");
                                        }
                                    </script>
                                </label>
                                <label id="user-info-date"><?php echo $row[4];?></label>
                                <label id="user-info-num">Youties #<?php echo $row[0];?></label>
                            </div>

                            <div id="tags">
                                <script>
                                    for(var k=1; k<5; k++){
                                        if (document.getElementById(i) == 1){
                                            <?php echo $row[4];?>
                                        }
                                    }
                                    
                                </script>

                                
                            </div>

                            <div id="user-review">
                                <b><?php echo $row[5];?></b> 
                                <p><?php echo $row[6];?></p>
                            </div>

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
                            
                            <?php
                                }
                                else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                        </div>

                        <div id="div1" class="inner-div inner1">
                            <?php
                                $row = mysqli_fetch_row($result_3);
                                $row_tag = mysqli_fetch_row($result_tag);
                                $cnt = $cnt + 1;
                                if ($cnt <= $total){?>
                            
                        
                            <div id="user-info">
                                <label id="user-info-star">
                                    <script>
                                        for (i=0; i< <?php echo $row[7];?>; i++){
                                            document.write("★ ");
                                        }
                                    </script>
                                </label>
                                <label id="user-info-date"><?php echo $row[4];?></label>
                                <label id="user-info-num">Youties #<?php echo $row[0];?></label>
                            </div>

                            <div id="tags">
                                <script>
                                    for(var k=1; k<5; k++){
                                        if (document.getElementById(i) == 1){
                                            <?php echo $row[4];?>
                                        }
                                    }
                                    
                                </script>

                                
                            </div>

                            <div id="user-review">
                                <b><?php echo $row[5];?></b> 
                                <p><?php echo $row[6];?></p>
                            </div>

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
                            
                            <?php
                                }
                                else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                        </div>

                        <div id="div1" class="inner-div inner1">
                            <?php
                                $row = mysqli_fetch_row($result_3);
                                $row_tag = mysqli_fetch_row($result_tag);
                                $cnt = $cnt + 1;
                                if ($cnt <= $total){?>
                            
                        
                            <div id="user-info">
                                <label id="user-info-star">
                                    <script>
                                        for (i=0; i< <?php echo $row[7];?>; i++){
                                            document.write("★ ");
                                        }
                                    </script>
                                </label>
                                <label id="user-info-date"><?php echo $row[4];?></label>
                                <label id="user-info-num">Youties #<?php echo $row[0];?></label>
                            </div>

                            <div id="tags">
                                <script>
                                    for(var k=1; k<5; k++){
                                        if (document.getElementById(i) == 1){
                                            <?php echo $row[4];?>
                                        }
                                    }
                                    
                                </script>

                                
                            </div>

                            <div id="user-review">
                                <b><?php echo $row[5];?></b> 
                                <p><?php echo $row[6];?></p>
                            </div>

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
                            
                            <?php
                                }
                                else{?>
                            <script> document.getElementById(review-div).style.backgroundColor = null; </script>
                        <?php
                        }
                        ?>
                        </div>

                    </div>

                    

                    <?php 
                    $result_ch = mysqli_query($conn2, "SELECT * FROM channels WHERE name='haha ha'") or die(mysqli_error($conn));
                    $row = mysqli_fetch_row($result_ch);
                    ?>

                    <!--채널 소개 그림-->
                    <div id="channel_info">
                        <div>
                            <img src="https://yt3.ggpht.com/ytc/AAUvwng-4r6Mq9XzKbP2ytrO6HgugZ7OOqhh5--Onsk8oA=s176-c-k-c0x00ffffff-no-rj" id="image" width="150" height="150">
                            <br>haha ha
                        </div>
                        <div id="info_text">
                            <p> <?php echo $row[4]?></p>
                            <p> <?php echo $row[5]?></p>
                            <p> <?php echo $row[6]?></p>
                        </div>
                    </div>

                    <div id="write_review">
                        <b>Review this Channel</b>
                    <!-- 리뷰작성.html로 넘기기 -->
                        <a href=""><img src= "image/more.jpg" style="width=30; height=30;"></a>
                    </div>


                </div>
            </div>
        </div>
    </body>
</html>