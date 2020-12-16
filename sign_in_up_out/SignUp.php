<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Youties : Sign up</title>
		<link rel="stylesheet" href="signIn_style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">		

		<script type = "text/javascript">
			function openCheckId(){
				var email=document.all.email.value;
				if(email){
					url="idcheck.php?email="+email;
					window.open(url, "chkid", "width=500, height=250, menubar=no, toolbar=no");
				}else{
					alert("이메일을 입력하세요.");
				}
			}

			function chkForm(){
				var checkid=document.all.checkid.value;
				var pwd = document.all.pwd.value;
				var pwd2 = document.all.pwd2.value;
				if(checkid==0){
					alert("이메일 중복 확인을 해 주세요.");
					return false;
				}
				else if(pwd!=pwd2){
					alert("비밀번호가 일치하지 않습니다.");
					return false;
				}
				return true;
			}
		</script>

	</head>

	<body>
        <form name="join" method="post" action="memberSave.php" enctype="multipart/form-data" onSubmit="return chkForm();">
			<header id="main_header"></header>

			<section class="app2">

				<figure>
					<a href="../main.php">
						<img src="image/youties_logo.png" id="logo_small" alt="YOUTIES" height="70dp"/><br>
					</a>
				</figure>

				<div id="createAccount">
					<h2>Create account</h2>

					<div id="sign-up-container">

						<div id="inputData">
							<div id=inner_inputData>
								<label for="email" style="text-align:left">Email </label><br>
							</div>
						</div>

						<div id="inputData_email">
							<input type="text" id="email" name="email" size="30" value="" required>	<!--pattern=".+@+." 뺐음-->
							<button type="button" id="chk_id" formmethod="get" onClick="openCheckId();"></button>
							<input type="hidden" name="checkid" value=0>
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
        </form>
	</body>
</html>