<?
 include "session.php";   //session.php파일을 포함
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Welcome to Youties</title>
		<link rel="stylesheet" href="signIn_style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<script type = "text/javascript">
			function goCreatePage() { 
				location.href="SignUp.php";
			}

			function goMainPage() { 
				location.href="../main.php";
			}
		</script>


	</head>

	<body>	
    <form name="join" method="post" action="checkSignIn.php">

		<header id="main_header_logo">
			<a href="../main.php">
				<img src = "image/logo2_removebg.jpg" width="150">
			</a>
		</header>
	
		<div class="app">
			<figure>
				<img src="image/투명.png"  alt="YOUTIES Sign in" height="100dp"/><br>
			</figure>
				
			<!--grid 형식으로 배치하기 위해 div 이름 통일함-->
			<div id="sign-in-container">
				<div class="div1">
				<h2>Sign in</h2>
			</div>
				
			<div class="div2 text">Email</div>

			<div class="div3">
				<input type="email" name="email" id="user_email" size="30" placeholder="Enter your email" required><br>			
			</div>

			<div class="div4" style="float: inherit;">
				<input type="submit" id="startSignIn" value="Sign in">
			</div>


			<div class="div5 text">Password</div>
						
			<div class="div6">
				<input type="password" name="pwd" id="user_password" minlength="8" maxlength="20" size="30" placeholder="Enter your password" required>
			</div>

			<div></div>

			<div id="div7">
				<button id="gotoCreateAccount" onclick="goCreatePage()">Create a new account</button>
			</div>
				
			</div>
		</div>

		<footer class="youtiesFooter">
			team 4 : Youties
        </footer>
        
    </form>
	</body>
</html>