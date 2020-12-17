<?php
    session_start();    //session 가져오기
    //session에 데이터가 없다면 로그인 화면으로 GO
    if (!isset($_SESSION['userID'])) {
        header('Location : http://wamp서버ip주소:80/test/LogIn/login');
    }
?>
<!DOCTYPE html>
<html>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="/test/js/bootstrap.js"></script>
    <head>
        <meta charset = "utf=8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>회원 정보 수정</title>
        <link rel ="stylesheet" href="/test/css/bootstrap.css">
        <link rel="stylesheet" href="/test/css/login.css">
        <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">
    </head>
    <style>
    #update_form{
        font-size: 1.3em;
        width: 50%;
        display: inline-block;
    }
    </style>
    <script>
    $(document).ready(function(){
        $('#update_form').submit(function(e){
            e.preventDefault();
            if($('#PWD').val()==""){
                alert("비밀번호를 입력해 주세요.");
            }else if($('#phone').val()==""){
                alert("전화번호를 입력해 주세요.");
            }else{
                $.ajax({
                    type : 'POST',
                    url : 'http://wamp서버ip주소:80/test/UpdateAccount/update',
                    data : $('#update_form').serialize(),
                    success : function(result){
                        if(result=="success"){
                            alert("성공적으로 변경하였습니다.");
                            location.replace('http://wamp서버ip주소:80/test/main')
                        }else if(result=="Fail:Save"){
                            alert("변경 실패 다시 시도해주세요.");
                        }
                    },
                    error : function(xtr,status,error){
                        alert(xtr +":"+status+":"+error);
                    }
                });
            }
        });
    });
    </script>
    <body>
        <div id="loginer">
            <form id = "update_form" method="POST">
                <fieldset>
                    <legend>회원 정보 수정</legend>
                    비밀번호 : <input type="text" id ="PWD" name ="PWD" placeholder="Enter Your Password">
                    <br><br>
                    전화번호 : <input type="text" id ="phone" name ="phone" placeholder="Enter Your phone">
                    <br><br>
                    <input type="submit" value="변경!">
                    <br>
                </fieldset>
            </form>
        </div>
    </body>
</html>
