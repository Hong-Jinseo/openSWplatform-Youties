<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Youties : Sign up</title>
		<link rel="stylesheet" href="signIn_style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">		

		<script type = "text/javascript">
			function checking() { 
				document.test.submit();
				
                var userPassword = document.test.password.value;
				var userPassword_chk = document.test.password_chk.value;

                if (userPassword != userPassword_chk) alert("Please check your password again.");
			}
		</script>

	</head>

	<body>
        <form name="join" method="post" action="memberSave.php">
			<header id="main_header"></header>

			<section class="app2">

				<figure>
					<img src="youties_logo.png" id="logo_small" alt="YOUTIES" height="70dp"/><br>
				</figure>

				<div id="createAccount">
					<h2>Create account</h2>

					<div id="sign-up-container">

						<div id="inputData">
							<div id=inner_inputData>
								<label for="email" style="text-align:left">Email </label><br>
							</div>
							<input type="text" id="email" name="email" size="30" value="" required><br>	<!--pattern=".+@+." 뺐음-->
						</div>
						
						<div id="inputData">
							<div id=inner_inputData>
								<label for="password"> Password </label><br>
							</div>
							<div id="pw_caution">
								<div id=inner_inputData_caution>
									<label> Passwords must be at least 8 characters.</label>
								</div>
							</div>
							<input type="password" id="password" name="pwd" minlength="8" maxlength="20" size="30" value="" required><br>
						</div>

						<div id="inputData">
							<div id=inner_inputData>
								<label for="password"> Re-enter password </label><br>
							</div>
							<input type="password" id="password_chk" name="pwd2" minlength="8" maxlength="20" size="30" value="" required><br>
						</div>

						<div id="inputData">
							<div id=inner_inputData>
								<label for="name"> Your name </label><br>
							</div>
							<input type="text" id="userName" name="name" rows="1" cols="30" style="resize: none;" value="" required><br><br>
						</div>
					</div>
					
					<input type="submit" onclick="checking()" id="create_btn" value="Create your YOUTIES account"></submit>

				</div>
			</section>

			<footer class="youtiesFooter">
				team 4 : Youties
			</footer>
        </form>
	</body>
</html>















<?php 
/*
    $host="127.0.0.1"               //서버: 자기자신
    $dbid="root";
    $dbpw="데이터베이스 비밀번호";
    $dbname="db1"                   //사용할 데이터베이스 이름

    //DB 연결 함수
    function connect_db($host, $dbid, $dbpw, $dbname){
        return mysqli_connect($host, $dbid, $dbpw, $dbname)
    }

    $connect = connect_db($host, $dbid, $dbpw, $dbname);

    $data_stream="'".$_POST['name'].",".$_POST['email'].",".$_POST['password']."'";
    $query="insert into userinfo(name, email, password) values (".$data_stream")";
    $result = mysqli_query($connect, $query);

    mysqli_close($connect); */
?>
