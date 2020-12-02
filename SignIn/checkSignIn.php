<?php
session_start();
$connect = mysqli_connect("localhost", "root", "jinseo00", "youties") or die("fail");

//입력 받은 id와 password
$email = $_POST['email'];
$password = $_POST['pwd'];

//아이디가 있는지 검사
$query = "select * from member where email='$email'";
$result = $connect->query($query);

//아이디가 있다면 비밀번호 검사
if(mysqli_num_rows($result)==1) {
    $row=mysqli_fetch_assoc($result);

    //비밀번호가 맞다면 세션 생성
    if($row['pw']==$password){
        $_SESSION['email']=$email;
        if(isset($_SESSION['email'])){
            ?>
            <script>
                location.replace("main.html");
            </script>
            <?php
        }else{
            echo "session fail";
        }
    }else {
        ?>              
        <script>
            alert("아이디 혹은 비밀번호가 잘못되었습니다.");
            history.back();
        </script>
        <?php
    } 
}else{
    ?>
    <script>
        alert("아이디 혹은 비밀번호가 잘못되었습니다.");
        history.back();
    </script>
    <?php
}
?>
