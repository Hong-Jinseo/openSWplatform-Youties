<?php
$host = 'localhost';
$user = 'root';
$pw = 'jinseo00';
$dbName = 'youties';

$conn = new mysqli($host, $user, $pw, $dbName) or die("Failed");
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

            <a href="main.html">
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
                    <a class = "top_menu" href = "../my_page/myPage.html" target = "_top"><?php echo $_SESSION['my_name'];?></a> 
                    <a class = "top_menu" href = "../sign_in_up_out/SignOut.php" target = "_top">SIGN OUT</a> 
                <?php
                }
                ?>
            </div>

        </header>

        <div id="main">
        
            <div class="main-container">

                <div id="option" class="inner-div">

                    <div id="sort-button">
                        <input type="radio" name="sort-type" id="radio1" value="most_recent" checked="checked"><label for="radio1">Most recent</label>
                        <input type="radio" name="sort-type" id="radio2" value="most_recommended" checked="checked"><label for="radio1">Most recommended</label>
                        <input type="radio" name="sort-type" id="radio3" value="postive" checked="checked"><label for="radio1">Positive</label>
                        <input type="radio" name="sort-type" id="radio4" value="negative" checked="checked"><label for="radio1">Negative</label>
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
                </div>


                <div id="review-detail">

                    <?php

                    
                    
                    ?>


                    <script>
                        for (i=0; i< <?php echo $rd_row[7];?>; i++){
                            
                        }
                    </script>




                </div>

    

                <div id="div5-review1" class="inner-div inner5">
                    <div id="user-info">
                        <label id="user-info-star">★ ★ ★ ★ ★</label>
                        <label id="user-info-num"><b>Youties #51</b></label>
                        <div id="ctn">
                            <img src= "https://postfiles.pstatic.net/MjAyMDEyMDlfODkg/MDAxNjA3NDQzMDAzMTEz.rHc_Ye9E4NMh7oAhK_afpM7e_B4HDM-OxxABHDMB6gsg.OlV7dT3tqcNxcVXWYXNSkvmkFH_oQGddAyefogaus5Ug.JPEG.rlawlgus9716/unclicked_like.jpg?type=w580" style="float: right; width: 35px; height: 35px" id="btn_like1" onclick="changeImage1()"/>
                            <br>328&nbsp;</div>
                    </div>

                    <div id="user-review">
                        <b>재미있게</b> 잘 보고 있습니다. 고양이는 귀여운데 귀여운 고양이가 동시에 많이 나오니까 너무 심각하게 귀엽네요. 유튜브 최고의 <b>힐링</b> 영상입니다.
                    <div class="date">2020.11.02</div>
                    </div>
                </div>

                <div id="div5-review2" class="inner-div inner5">
                    <div id="user-info">
                        <label id="user-info-star">★ ★ ★ ★ ★</label>
                        <label id="user-info-num"><b>Youties #77</b></label>
                        <div id="ctn">
                            <img src= "https://postfiles.pstatic.net/MjAyMDEyMDlfODkg/MDAxNjA3NDQzMDAzMTEz.rHc_Ye9E4NMh7oAhK_afpM7e_B4HDM-OxxABHDMB6gsg.OlV7dT3tqcNxcVXWYXNSkvmkFH_oQGddAyefogaus5Ug.JPEG.rlawlgus9716/unclicked_like.jpg?type=w580" style="float: right; width: 35px; height: 35px" id="btn_like2" onclick="changeImage2()"/>
                        <br>175&nbsp;</div>
                    </div>

                    <div id="user-review">
                        이 채널은 <b>힐링</b> 그 자체입니다!! 영상에 배경음악도 중독성있고 자막을 진짜 센스있게 넣으셔서 이게 신의 한 수 같아요 심심한 영상 같은데 되게 <b>재밌</b>어요!!
                    <div class="date">2020.11.10</div>
                    </div>
                </div>




                <!--채널 소개 그림-->
                <div id="div1-2">
                <img src="https://yt3.ggpht.com/ytc/AAUvwng-4r6Mq9XzKbP2ytrO6HgugZ7OOqhh5--Onsk8oA=s176-c-k-c0x00ffffff-no-rj" id="cat" width="150" height="150">
                <br>haha ha
                </div>
                
                <div id="more_review">
                    <b>Review this Channel</b>
                <!-- 리뷰작성.html로 넘기기 -->
                    <a href="reviewwrite.html"><img src= "more.jpg" style="width=30; height=30;"></a>
                </div>

            </div>
        </div>
    </body>
</html>