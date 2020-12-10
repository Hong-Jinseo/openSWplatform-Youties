<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8">
  <meta name = "description" content = "search result page">
  <title>$input</title> <!--사용자가 입력한 검색어를 타이틀로-->
  <link rel = "stylesheet" href = "search_result.css">
  <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
  <div id = "wrapper">
    <header id = "main_header">
      <a class = "top_menu" href = "main.html" target = "_top">SIGN UP</a> <!--signup페이지로 연결-->
      <a class = "top_menu" href = "main.html" target = "_top">SIGN IN</a> <!--signin페이지로 연결-->
    </header>
  </div>
  <form class = 'search'>
    <div id = "container">
      <div id = "logo_img">
        <a href = "main.html" target = "_top">
          <img src = "logo2_removebg.png" border = "0">
        </a>
      </div>
      <div id = "main_search">
        <input onkeyup = "filter()" type = "text" class = "search_word" name = "keyword" autocomplete = "off" placeholder = "Type Channel Name">
        <button onclick = "search_youtube()" type = "button" class = "search_btn" name = "click_btn" value = "">
          <i class = "fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>
<?php
  //mysql 접속 계정 정보 설정
  $mysql_host = '127.0.0.1';
  $mysql_user = 'root';
  $mysql_password = 'madsulie06';
  $mysql_db = 'youtube_info';
  //connetc 설정(host,user,password)
  $conn = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db)or die("fail");

  //쿼리문 작성
  echo "<tr><th>$_POST[keyword]";
  echo "의 검색결과";

  $input = $_POST['keyword'];
  $query = "SELECT * FROM channels WHERE name LIKE '%$input%'";
  $tag_query1 = "SELECT * FROM channel_tags WHERE tag1 LIKE '%$input%'";
  $tag_query2 = "SELECT * FROM channel_tags WHERE tag2 LIKE '%$input%'";
  //쿼리보내고 결과를 변수에 저장
  $result = mysqli_query($conn, $query);
  $tag_result1 = mysqli_query($conn, $tag_query1);
  $tag_result2 = mysqli_query($conn, $tag_query2);
  //echo "MySQL에서 가져온 데이터는 아래와 같습니다.<br/>";
  //echo "<style>td { border:1px solid #ccc; padding:5px; }</style>";
  echo "<table>";
  echo "<thead>";
    echo "<th>"."Category"."</th>";
    echo "<th>"."Channel Name"."</th>";
    echo "<th>"."Info"."</th>";
    echo "<th>"."Rating / Reviews"."</th>";
  echo "</thead>";

  echo "<tbody>";
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["id"]. "</td><td>" . $row["category"]. "</td><td>" . $row["name"]. "</td><td>" . $row["views"]. "</td><td>" . $row["subscribers"]. "</td><td>" . $row["videos"]."</td>";
      echo "</tr>";
    }

 } else if (mysqli_num_rows($tag_result1) > 0) {
   while($row = mysqli_fetch_assoc($tag_result1)) {
     echo "<tr>";
     echo "<td>" . $row["id"]. "</td><td>" . $row["tag1"]."</td>";
     echo "</tr>";
   }
 } else if (mysqli_num_rows($tag_result2) > 0) {
   while($row = mysqli_fetch_assoc($tag_result2)) {
     echo "<tr>";
     echo "<td>" . $row["id"]. "</td><td>" . $row["tag2"]."</td>";
     echo "</tr>";
   }
 } else {
   echo "No search result.";
 }

 echo "</tbody></table>";
 ?>

  <table id = "search_result_table">
    <colgroup>
      <!--카테고리명-->
      <col width = "10%">
      <!--채널이미지-->
      <col width = "10%">
      <!--채널명-->
      <col width = "10%">
      <!--채널소개-->
      <col width = "30%">
      <!--채널리뷰-->
      <col width = "30%">
    </colgroup>


    <tbody>
      <tr class = "tb_content">
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>


  <script type="text/javascript" src="keyword_search.js"></script>

</body>
</html>
