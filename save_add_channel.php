<?php
session_start();

$host = 'localhost';
$user = 'root';
$pw = 'jinseo00';
$dbName = 'youties';

$conn = new mysqli($host, $user, $pw, $dbName);

$sql = "
    INSERT INTO channels(category, name, image, movie)
    VALUES(
        '{$_POST['category']}',
        '{$_POST['name-text']}',
        '{$_POST['photo-text']}',
        '{$_POST['video-text']}'
    )
";

$result = mysqli_query($conn, $sql);
if($result == false){
    echo '저장하는 과정에서 문제가 생겼습니다.';
    echo mysqli_error($conn);
} else {
    echo "<script>window.close();</script>";
}

?>