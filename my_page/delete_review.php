<?php
//회원가입 후 개인정보 DB로 올리기
$host = 'localhost';
$user = 'root';
$pw = 'jinseo00';
$dbName = 'youties';

$conn = new mysqli($host, $user, $pw, $dbName);

$sql1 = "DELETE FROM reviews WHERE id='{$_POST['delete_data']}'";
$sql2 = "DELETE FROM tags WHERE id='{$_POST['delete_data']}'";


$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);

if($result1==false || $result2==false){
    echo '삭제하는 과정에서 문제가 생겼습니다.';
    echo mysqli_error($conn);
} else {
    echo "<script>location.href='myPage.php';</script>";
}

?>