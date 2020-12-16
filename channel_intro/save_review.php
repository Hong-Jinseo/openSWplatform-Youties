<!--DB로 리뷰 올리기-->

<?php
session_start();

//DB 접속 정보 : 호스트, 사용자, 비밀번호, 데이터베이스 이름
$host = 'localhost';
$user = 'root';
$pw = 'jinseo00';
$dbName = 'youties';

$conn = new mysqli($host, $user, $pw, $dbName);
           
date_default_timezone_set('Asia/Seoul');
$date = date("Y.m.d h:i:s");
$date2 = date("Y.m.d");

if(!isset($_SESSION['my_email'])){
    echo "<script>alert(\"로그인 후 리뷰를 작성할 수 있습니다.\");</script>";
    echo "<script>location.href='channel_intro.html';</script>";
}

if($_POST['rating']==0){
    echo "<script>alert(\"별점을 등록해 주십시오.\");</script>";
    echo "<script>history.back();</script>";
}else{
    //table reviews에 접속
    $sql = "
    INSERT INTO reviews
        (parent, email, channel, date, title, content, rating, sexual, violent, crude, horror, imitative, date2)
    VALUES (
        '{$_POST['parent-db']}',
        '{$_SESSION['my_email']}',
        '{$_POST['channel-db']}',
        '{$date}',
        '{$_POST['title']}',
        '{$_POST['content']}',
        '{$_POST['rating']}',

        '{$_POST['sexual']}',
        '{$_POST['violent']}',
        '{$_POST['crude']}',
        '{$_POST['horror']}',
        '{$_POST['imitative']}',
        '{$date2}'
    )
    ";

    //table tags에 저장
    $sql_tag = "
    INSERT INTO tags
        (tag1, tag2, tag3, tag4, tag5, tag6, tag7, tag8, tag9, email)
    VALUES (
        '{$_POST['tag_hidden1']}',
        '{$_POST['tag_hidden2']}',
        '{$_POST['tag_hidden3']}',
        '{$_POST['tag_hidden4']}',
        '{$_POST['tag_hidden5']}',
        '{$_POST['tag_hidden6']}',
        '{$_POST['tag_hidden7']}',
        '{$_POST['tag_hidden8']}',
        '{$_POST['tag_hidden9']}',
        '{$_SESSION['my_email']}'
    )
    ";



    $result = mysqli_query($conn, $sql);
    $result_tag = mysqli_query($conn, $sql_tag);
    if($result === false || $result_tag === false){
    echo '저장하는 과정에서 문제가 생겼습니다.';
    echo mysqli_error($conn);
    } else {
    echo "<script>alert(\"리뷰가 등록되었습니다.\");</script>"; ?>
    <script>var final_parent = "<?php echo $_POST['parent-db'] ?>"; </script>
    <?php echo "<script>location.href='channel_intro.php?channel_key='+final_parent</script>";
    }
}

?>