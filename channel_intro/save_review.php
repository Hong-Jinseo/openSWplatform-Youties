<!--DB로 리뷰 올리기-->

<?php
session_start();

//DB 접속 정보 : 호스트, 사용자, 비밀번호, 데이터베이스 이름
$host = 'localhost';
$user = 'root';
$pw = 'jinseo00';
$dbName = 'youties';

$conn = new mysqli($host, $user, $pw, $dbName);
           
$date = date("Y/m/d h:i:s", time());    //지금 '시간'이 좀 이상함

if(!isset($_SESSION['my_email'])){
    echo "<script>alert(\"로그인 후 리뷰를 작성할 수 있습니다.\");</script>";
    echo "<script>location.href='channel_intro.html';</script>";
}

//table reviews에 접속
$sql = "
    INSERT INTO reviews
        (email, channel, date, title, content, rating)
    VALUES (
        '{$_SESSION['my_email']}',
        '{$_POST['channel']}',
        '{$date}',
        '{$_POST['title']}',
        '{$_POST['content']}',
        '{$_POST['rating']}'
    )
";

$result = mysqli_query($conn, $sql);
if($result === false){
    echo '저장하는 과정에서 문제가 생겼습니다.';
    echo mysqli_error($conn);
} else {
    echo "<script>location.href='channel_intro.html';</script>";
}

?>