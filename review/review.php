<?php
$host = 'localhost';
$user = 'root';
$pw = 'jinseo00';
$dbName = 'youties';

$conn = new mysqli($host, $user, $pw, $dbName) or die("Failed");


//리뷰 좋아요순
//$result_1 = mysqli_query($conn, "SELECT * FROM reviews WHERE channel='haha ha' ORDER BY like DESC") or die(mysqli_error($conn));

//리뷰 최신순
$result_2 = mysqli_query($conn, "SELECT * FROM reviews WHERE channel='haha ha' ORDER BY id DESC") or die(mysqli_error($conn));

//리뷰 긍정
$result_3 = mysqli_query($conn, "SELECT * FROM reviews WHERE channel='haha ha' ORDER BY rating DESC") or die(mysqli_error($conn));

//리뷰 부정. 뒤에 ,like DESC 붙여야 함
$result_4 = mysqli_query($conn, "SELECT * FROM reviews WHERE channel='haha ha' ORDER BY rating ASC") or die(mysqli_error($conn));







?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Youties: Reviews</title>
        <link rel="stylesheet" href="review_style.css"/>

        <script type = "text/javascript">
            function colorChange_opt(num) {
                var bgColor = ["#bbbaba", "#c0412b"];
                var fontColor = ["#000000", "#ffffff"];
                
                var bodyOpt = document.getElementById("opt"+num);
                var opt = document.getElementById("opt_hidden"+num);

                document.getElementById("opt1").style.backgroundColor = bgColor[0];
                document.getElementById("opt1").style.color = fontColor[0];
                document.getElementById("opt2").style.backgroundColor = bgColor[0];
                document.getElementById("opt2").style.color = fontColor[0];
                document.getElementById("opt3").style.backgroundColor = bgColor[0];
                document.getElementById("opt3").style.color = fontColor[0];
                document.getElementById("opt4").style.backgroundColor = bgColor[0];
                document.getElementById("opt4").style.color = fontColor[0];

                bodyOpt.style.backgroundColor = bgColor[1];
                bodyOpt.style.color = fontColor[1];
            }

            function chk_opt(num){
                var opt = document.getElementById("opt_hidden"+num);

                document.getElementById("opt_hidden1").value = 0;
                document.getElementById("opt_hidden2").value = 0;
                document.getElementById("opt_hidden3").value = 0;
                document.getElementById("opt_hidden4").value = 0;

                if(opt.value == 0) {opt.value = 1;}
                else {opt.value = 0;}
            }

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
                session_start(); // 세션
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

        <div id="main">
        
            <div class="main-container">

                <div id="option" class="inner-div">
                    <form action="review_opt.php" method="POST">

                        <div id="sort-button">
                            <button type="button" id="opt1" name="opt1" class="opt-btn" onclick="colorChange_opt(1); chk_opt(1)" value=0>Most recommended</button>
                            <input type="hidden" id="opt_hidden1" name="opt_hidden1" value=0>
                            <button type="button" id="opt2" name="opt2" class="opt-btn" onclick="colorChange_opt(2); chk_opt(2)" value=0>Most recent</button>
                            <input type="hidden" id="opt_hidden2" name="opt_hidden2" value=0>
                            <button type="button" id="opt3" name="opt3" class="opt-btn" onclick="colorChange_opt(3); chk_opt(3)" value=0>Positive</button>
                            <input type="hidden" id="opt_hidden3" name="opt_hidden3" value=0>
                            <button type="button" id="opt4" name="opt4" class="opt-btn" onclick="colorChange_opt(4); chk_opt(4)" value=0>Negativee</button>
                            <input type="hidden" id="opt_hidden4" name="opt_hidden4" value=0>

                        </div>

                        <div id="tag-button">
                            <button type="button" id="tag1" name="tag1" class="tag-btn" onclick="colorChange(1); chk_tag(1)" value=0>재미있는</button>
                            <input type="hidden" id="tag_hidden1" name="tag_hidden1" value=0>
                            <button type="button" id="tag2" name="tag2" class="tag-btn" onclick="colorChange(2); chk_tag(2)" value=0>유익한</button>
                            <input type="hidden" id="tag_hidden2" name="tag_hidden2" value=0>
                            <button type="button" id="tag3" name="tag3" class="tag-btn" onclick="colorChange(3); chk_tag(3)" value=0>힐링되는</button>
                            <input type="hidden" id="tag_hidden3" name="tag_hidden3" value=0>
                            <button type="button" id="tag4" name="tag4" class="tag-btn" onclick="colorChange(4); chk_tag(4)" value=0>스토리텔링</button>
                            <input type="hidden" id="tag_hidden4" name="tag_hidden4" value=0>
                        </div>

                        <div id="tag-button">
                            <input type="submit" id="option-data">
                        </div>
                    </form>
                </div>


                <div id="review-content">

                    <div id="review-detail">

                        <div id="div1" class="inner-div inner1">
                            <?php
                                $row = mysqli_fetch_row($result_2); 
                            ?>
                        
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

                                <label id="tag1"><?php echo $row[4];?></label>
                            </div>

                            <div id="user-review">
                                <b><?php echo $row[5];?></b> <?php echo $row[6];?>
                            </div>
                        </div>



        
                    </div>

        




                    <!--채널 소개 그림-->
                    <div id="channel_info">
                    <img src="https://yt3.ggpht.com/ytc/AAUvwng-4r6Mq9XzKbP2ytrO6HgugZ7OOqhh5--Onsk8oA=s176-c-k-c0x00ffffff-no-rj" id="image" width="150" height="150">
                    <br>haha ha
                    </div>
                    
                    <div id="write_review">
                        <b>Review this Channel</b>
                    <!-- 리뷰작성.html로 넘기기 -->
                        <a href=""><img src= "more.jpg" style="width=30; height=30;"></a>
                    </div>


                </div>
            </div>
        </div>
    </body>
</html>