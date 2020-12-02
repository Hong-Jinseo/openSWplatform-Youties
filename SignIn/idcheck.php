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

        <figure>
            <img src="youties_logo.png" alt="YOUTIES" height="60dp"/><br>
        </figure>
            
        <?php        
        if($cnt){?>
            <?php echo $email?> : 이미 존재하는 이메일입니다.<br/>
            <form>
                <input type=text name="email">
                <input type=button value="ID중복확인" onClick="chkId();">
            </form>
        <?php
        }else{?>
            <?php echo $email?> : 사용 가능한 이메일입니다.<br/>
            <a href="#" onClick="useID('<?php=$userid?>');">사용하기</a> 
            <a href="#" onClick="window.close();">닫기</a>
        <?php
        }?>

    </body>
</html>