<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<meta name = "description" content = "main page">
		<title>Youties</title>
		<link rel = "stylesheet" href = "../main.css">
		<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	</head>

	<body>
		<div id = "wrapper">
			<header id = "main_header">

				<?php
				session_start(); // 세션
                $connect = mysqli_connect('localhost', 'root', 'jinseo00', 'youties') or die ("connect fail");
                $query ="SELECT * FROM member ORDER BY id DESC";
				$result = $connect->query($query);
		

				if(!isset($_SESSION['my_name'])){ ?>   
					<a class = "top_menu" href = "SignUp.php" target = "_top">SIGN UP</a> 
					<a class = "top_menu" href = "SignIn.php" target = "_top">SIGN IN</a> 
				<?php
				}else { ?>              
					<a class = "top_menu" href = "myPage_temp.html" target = "_top"><?php echo $_SESSION['my_name'];?></a> 
					<a class = "top_menu" href = "SignOut.php" target = "_top">SIGN OUT</a> 
				<?php
				}
					

				?>


				
			</header>
		</div>
		<form class = 'search'>
			<div id = "main_logo">
				<img src = "../logo2.png" border = "0">
			</div>

			<div>
				<p id = "main_info">REVIEWS: &nbsp&nbspCHANNELS: &nbsp&nbspMEMBERS: &nbsp&nbspVISITORS: &nbsp&nbsp</p>
			</div>

			<div id = "main_search">
				<input onkeyup = "filter()" type = "text" class = "search_word" name = "keyword" placeholder = "Type Channel Name">
				<button onclick = "search_youtube()" type = "button" class = "search_btn" name = "click_btn" value = "">
				<i class = "fas fa-search"></i>
				</button>
			</div>
		</form>
		<script type="text/javascript" src="keyword_search.js"></script>

	</body>
</html>
