<?php
session_start();

//회원가입 후 개인정보 DB로 올리기
$host = 'localhost';
$user = 'root';
$pw = 'jinseo00';
$dbName = 'youties';

$conn = new mysqli($host, $user, $pw, $dbName);

$sql = "
    UPDATE member 
    SET pw='{$_POST['pw-text']}', name='{$_POST['name-text']}'
    WHERE email='{$_SESSION['email']}'
";

$_SESSION['my_pw'] = $_POST['pw-text'];
$_SESSION['my_name'] = $_POST['name-text'];

$result = mysqli_query($conn, $sql);
if($result == false){
    echo '저장하는 과정에서 문제가 생겼습니다.';
    echo mysqli_error($conn);
} else {
    echo "<script>window.close();</script>";
}

?>