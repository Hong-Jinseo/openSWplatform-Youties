<?php
$host = 'localhost';
$user = 'root';
$pw = 'jinseo00';
$dbName = 'youties';

$conn = $mysqli = new mysqli($host, $user, $pw, $dbName);
           
$sql = "
    INSERT INTO member 
        (email, pw, name)
        VALUES (
            '{$_POST['email']}',
            '{$_POST['pwd']}',
            '{$_POST['name']}'
        )
";

$result = mysqli_query($conn, $sql);
if($result === false){
    echo '저장하는 과정에서 문제가 생겼습니다.';
    echo mysqli_error($conn);
} else {
    echo '성공했습니다. <a href="SignIn.html">돌아가기</a>';
}

?>