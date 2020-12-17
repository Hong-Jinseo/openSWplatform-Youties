<!--채널 추가 팝업-->

<?php
session_start();

$conn = mysqli_connect("localhost", "root", "jinseo00", "youties") or die("fail");

?> 


<html>
    <head>
        <meta charset="utf-8">
		<title>Setting</title>
		<link rel="stylesheet" href="./my_page/myPage_style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">	
    </head>

    <body>
        <header id="main_header_logo_s">
			<img src = "logo2_removebg.jpg" width="150">
        </header>


        <div id="add-main">
            <form id="add-content" action="save_add_channel.php" method="POST">

                <div id="add-name">
                    <b>추가하고자 하는 채널 이름을 입력해주세요.</b><br>
                    <input type=text id="name-text" name="name-text" value="" required><br><br>
                </div>

                <div id="add-photo">
                    <b>추가하고자 하는 채널의 프로필 사진 링크를 입력해주세요.</b><br>
                    <input type=text id="photo-text" name="photo-text" value="" required><br><br>
                </div>

                <div id="add-video">
                    <b>추가하고자 하는 채널의 동영상 링크를 하나 입력해주세요.</b><br>
                    <input type=text id="video-text" name="video-text" value="" required><br><br>
                </div>

                <div id="add-category">
                    <b>추가하고자 하는 채널의 카테고리를 선택해주세요.</b><br>
                    <input type="radio" name="category" value="music">Music</input>
                    <input type="radio" name="category" value="People & Blog">People & Blog</input>
                    <input type="radio" name="category" value="Film">Film</input>
                    <input type="radio" name="category" value="Gaming">Gaming</input>
                    <input type="radio" name="category" value="Education">Education</input>
                    <input type="radio" name="category" value="Comedy">Comedy</input>
                    <input type="radio" name="category" value="Howto">Howto</input>
                    <input type="radio" name="category" value="News">News</input>
                    <input type="radio" name="category" value="Challenges">Challenges</input>
                    <input type="radio" name="category" value="Interview">Interview</input>
                    <input type="radio" name="category" value="Sports">Sports</input>
                    <input type="radio" name="category" value="Docuseries">Docuseries</input>
                </div>
                <input type=submit id="setting_btn" value="save">
                <input type=button id="setting_btn" value="close" onClick="window.close();">

            </form>
        </div>  

    </body>
</html>