<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>MySQL 접속해서 데이터 가져오기</h1>
    <?php
    //mysql 접속 계정 정보 설정
    $mysql_host = '127.0.0.1';
    $mysql_user = 'root';
    $mysql_password = '';
    $mysql_db = 'youtube_info';
    //connetc 설정(host,user,password)
    $conn = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db)or die("fail");
    //db 연결
    //$dbconn = mysql_select_db($mysql_db,$conn);
    //charset UTF8
    //$insert_query = "INSERT INTO channels(id, category, name, views, subscribers, videos) VALUES(3, '임꺽정')";

    //mysqli_query($conn, "SELECT id, category, name, views, subscribers, videos, FROM channels");
    //$select_query = "SELECT id, category, name, views, subscribers, videos FROM channels";
    //쿼리문 작성
    echo "<tr><th>$_POST[keyword]";
    echo "의 검색결과";

    $input = $_POST['keyword'];
    $dnoun_tmp = preg_replace("[\(|\)|\ㆍ|\ |\[|\]|\{|\}|\,|\.|\·|\?|\!|\'|\\|\"]", "", $input); //input
    echo "$dnoun_tmp";

    $query = "SELECT * FROM channels WHERE name LIKE '%$input%'";
    //쿼리보내고 결과를 변수에 저장
    $result = mysqli_query($conn, $query);
    //echo "MySQL에서 가져온 데이터는 아래와 같습니다.<br/>";
    

    while($row = mysqli_query($conn, $query)){
      echo "<tr>";
      echo "<td>".$row['id']."</td>";
      echo "<td>".$row['category']."</td>";
      echo "<td>".$row['name']."</td>";
      echo"</tr>";
        //echo "번호: ".$row[id]."/ category: ".$row[category]."/ channel name: ".$row[name]
        //."/ views: ".$row[views]."/ subscribers: ".$row[subscribers]."/ videos: ".$row[videos]
        //."<br/>";
    }
    ?>



</body>
</html>
