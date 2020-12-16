<!--설정 팝업-->

<?php
session_start();

$conn = mysqli_connect("localhost", "root", "jinseo00", "youties") or die("fail");

$email = $_SESSION['my_email'];
$name = $_SESSION['my_name'];
$pw = $_SESSION['my_pw'];
?> 


<html>
    <head>
        <meta charset="utf-8">
		<title>Setting</title>
		<link rel="stylesheet" href="myPage_style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">	
    </head>

    <body>
        <header id="main_header_logo">
			<img src = "logo2_removebg.jpg" width="150">
        </header>


        <div id="setting-main">
            <form id="setting-content" action="save_setting.php" method="POST">
                <div id="setting-email">
                    <b>EMAIL</b><br>
                    <?php echo $email?><br><br>
                </div>

                <div id="setting-name">
                    <b>USER NAME</b><br>
                    <input type=text id="name-text" name="name-text" value=" <?php echo $name?>"><br><br>
                </div>

                <div id="setting-pw">
                    <b>USER PASSWORD</b><br>
                    <input type=text id="pw-text" name="pw-text" value=" <?php echo $pw?>"><br><br>
                </div>

                <input type=submit id="setting_btn" value="save">
                <input type=button id="setting_btn" value="close" onClick="window.close();">

            </form>
        </div>  

    </body>
</html>