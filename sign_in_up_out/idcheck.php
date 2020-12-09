<!--ID 체크 페이지 idcheck.php-->

<?php
session_start();
$conn = mysqli_connect("localhost", "root", "jinseo00", "youties") or die("fail");

//동일한 이메일 있는지 확인
$email = $_GET['email'];
$sql = "SELECT * FROM member WHERE email='$email'";
$rst = mysqli_query($conn, $sql);
$cnt = mysqli_num_rows($rst);     //DB에서 rst에 해당하는 내용의 개수
?> 


<html>
    <head>
        <meta charset="utf-8">
		<title>이메일 중복 확인</title>
		<link rel="stylesheet" href="signIn_style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">	
        
        <script type="text/javascript">
            function useID(v){
                opener.document.all.checkid.value=1;
                opener.document.all.email.value=v;
                window.close();
            } 

            function chkId(){
                var email=document.all.email.value;
                if(email){
                    url="idcheck.php?email="+email;
                    location.href=url;
                }else{
                    alert("이메일을 입력하세요.");
                }
            }

            function retrunID(){

            }
        </script>


    </head>

    <body>
        <header id="main_header_logo">
			<img src = "image/logo2_removebg.jpg" width="150">
        </header>
            
        <?php        
        if($cnt){?> <br>
            <?php echo $email?> : 이미 존재하는 이메일입니다.<br/>
            <div>
                <br><input type=text id="idcheck_text" name="email">
                <input type=button id="idcheck_btn" value="ID중복확인" onClick="chkId();">
            </div>
        <?php
        }else{?><br>
            <?php echo $email?> : 사용 가능한 이메일입니다.<br><br>

            <div>
                <script>var final_email = "<?php echo $email;?>"; </script>
                <input type=button id="idcheck_btn" value="사용하기" onClick="useID(final_email);">
                <input type=button id="idcheck_btn" value="닫기" onClick="window.close();">
            </div>

        <?php
        }?>

    </body>
</html>