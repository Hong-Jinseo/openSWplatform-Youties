<?php include_once("cnt_visitor.php");?>

<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8">
  <meta name = "description" content = "main page">
  <title>Youties</title>
  <link rel = "stylesheet" href = "main.css?after">
  <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
  <div id = "wrapper">
    <header id = "main_header">
      <!--로그아웃 기능-->
				<?php
				
        $connect = mysqli_connect('127.0.0.1', 'root', 'jinseo00', 'youties') or die ("connect fail");
        $query ="SELECT * FROM member ORDER BY id DESC";
				$result = $connect->query($query);
		
				if(!isset($_SESSION['my_name'])){ ?>   
					<a class = "top_menu" href = "./sign_in_up_out/SignUp.php" target = "_top">SIGN UP</a> 
					<a class = "top_menu" href = "./sign_in_up_out/SignIn.php" target = "_top">SIGN IN</a> 
				<?php
				}else { ?>              
					<a class = "top_menu" href = "./my_page/myPage.php" target = "_top"><?php echo $_SESSION['my_name'];?></a> 
					<a class = "top_menu" href = "./sign_in_up_out/SignOut.php" target = "_top">SIGN OUT</a> 
				<?php
				}
				?>
      
    </header>
  </div>
  <form class = 'search' action = "search.php" method = "GET">
  <div id = "main_logo">
    <img src = "logo2.png" border = "0">
  </div>
  <div>
      <!--review 수, channel 수, member 수 db 연결-->
      <?php 
      $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db)or die("fail");
      $query_re = "SELECT * FROM reviews";
      $query_ch = "SELECT * FROM channels";
      $query_mem = "SELECT * FROM member";

      $result_re = mysqli_query($conn, $query_re);
      $result_ch = mysqli_query($conn, $query_ch);
      $result_mem = mysqli_query($conn, $query_mem);

      $cnt_re = mysqli_num_rows($result_re);
      $cnt_ch = mysqli_num_rows($result_ch);
      $cnt_mem = mysqli_num_rows($result_mem);

      ?>
    <p id = "main_info">REVIEWS: <?php echo $cnt_re?>&nbsp&nbspCHANNELS: <?php echo $cnt_ch?>&nbsp&nbspMEMBERS: <?php echo $cnt_mem?>&nbsp&nbspVISITORS: <?php echo $today_visit_count?>&nbsp&nbsp</p>
  </div>

  <div id = "main_search">
    <input type = "text" class = "search_word" name = "keyword" id = "keyword" autocomplete = "off" autofocus placeholder = "Type Channel Name">
    <button type = "button" class = "search_btn" name = "click_btn" value = "">
      <i class = "fas fa-search"></i>
    </button>
  </div>
  <div class = "keyword_list">
    <ul class = "list-group" id = "list"></ul>
  </div>
</form>
<script type="text/javascript" src="./main2.js"></script>
</body>
</html>