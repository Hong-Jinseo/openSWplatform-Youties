<?php
//리뷰 DB에 저장된 정보 가져오기
$host = 'localhost';
$user = 'root';
$pw = 'jinseo00';
$dbName = 'youties';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8">
  <meta name = "description" content = "search result page">
  <title></title> <!--사용자가 입력한 검색어를 타이틀로-->
  <link rel = "stylesheet" href = "search.css?after">
  <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
  <div id = "wrapper">
    <header id = "main_header">
      <a class = "top_menu" href = "main.html" target = "_top">SIGN UP</a> <!--signup페이지로 연결-->
      <a class = "top_menu" href = "main.html" target = "_top">SIGN IN</a> <!--signin페이지로 연결-->
    </header>
  </div>
  <form class = 'search', action = "search.php", method = "GET">
    <div id = "container">
      <div id = "logo_img">
        <a href = "main.html" target = "_top">
          <img src = "logo2_removebg.png" border = "0">
        </a>
      </div>
      <div id = "main_search">
        <input onkeyup = "filter()" type = "text" class = "search_word" name = "keyword" autocomplete = "off" placeholder = "Type Channel Name">
        <button type = "button" class = "search_btn" name = "click_btn" value = "">
          <i class = "fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <?php
  //mysql 접속 계정 정보 설정
  $mysql_host = '127.0.0.1';
  $mysql_user = 'root';
  $mysql_password = 'jinseo00';
  $mysql_db = 'youties';


  //connetc 설정(host,user,password)
  $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db)or die("fail");
  $conn2 = mysqli_connect($mysql_host,$mysql_user,$mysql_password,'youties')or die("fail");
  //쿼리문 작성
  //echo "<tr><th>".$_GET["keyword"];
  $input = $_GET['keyword'];

  $query = "SELECT * FROM channels WHERE name LIKE '%$input%'";
  $query2 = "SELECT * FROM reviews WHERE channel LIKE '%$input%'";

  //쿼리보내고 결과를 변수에 저장
  $result = mysqli_query($conn, $query);
  $result2 = mysqli_query($conn2, $query2);
 ?>


  <div id = "table_style">

    <table class = "search_result_table">
      <thead>
        <tr>
          <th width = "150">Category</th>
          <th width = "250">Image</th>
          <th width = "200">Channel Name</th>
          <th width = "200">Info</th>
          <th width = "200">Rating / Reveiws</th>
        </tr>
      </thead>
      <tbody>

  <?php
    echo $input." channel 검색 결과";

    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["category"]. "</td>";
        echo "<td>";
        ?>                                           
        <figure>
          <img src="<?php echo $row["image"];?>">
        </figure>
        <?php
        "</td>";
        
        //echo '<img src="https://yt3.ggpht.com/ytc/AAUvwng-4r6Mq9XzKbP2ytrO6HgugZ7OOqhh5--Onsk8oA=s176-c-k-c0x00ffffff-no-rj"/>';
        //echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'"/>';
        echo "</td>";
?>

         <td> <a href="channel_intro2.php?channel_key=<?=$row["id"]?>"> <?php echo $row["name"]?> </a> </td><td> <?php //채널명에 채널 소개 링크



        //Info tab
        echo "<div id = info_tab>";
        echo "<p>";
        echo "<img src='img_views.png'/>". " ". $row["views"]."</p>";
        echo "<p>";
        echo "<img src='img_subs.png'/>"." ". $row["subscribers"]."</p>";
        echo "<p>";
        echo "<img src='img_videos.png'/>"." ". $row["videos"]."</p></td>";
        echo "<td>";
        echo "<div id = info_tab>";

        //rating tab
        //echo "<style> p {text-align: left;} </style>";
        echo "<div id = rating_tab>";
        echo "<p>";
        echo "<img src='img_rating.png'/>". " ".$row["videos"]."</p>";
        echo "<p>";
        echo "<img src='img_reviews.png'/>". " ".$row["videos"]."</p></td>";

        echo "</tr>";
      }
    } else { //if there's no results found
      echo "</tbody>";
      echo "</table>";
      echo "</div>";
      //warning image style
      echo "<p>"."<img src='img_warning.png'/>"."</p>";

      //warning text style
      echo "<p>"."No results found from channel name"."</p>";
    }

  ?>
      </tbody>
    </table>
  </div>

  <div id = "table_style">

    <table class = "search_result_table">
      <thead>
        <tr>
          <th width = "150">Channel Name</th>
          <th width = "450">Reviews</th>
          <th width = "200">Rating</th>
          <th width = "200">Date</th>
        </tr>
      </thead>
      <tbody>

  <?php
  echo $input." channel reviews 검색 결과";
    if (mysqli_num_rows($result2) > 0) {
      while($row = mysqli_fetch_assoc($result2)) {
        echo "<tr>";
        echo "<td>" .$row["channel"]. "</td>"; //채널명에 채널 소개 링크
        echo "<td><p><b>" . $row["title"]. "</b></p>"; //글 제목에 리뷰 링크

        if (strlen($row["content"])>30) { //글자수 30 넘으면 ...
          $content = str_replace($row["content"], mb_substr($row["content"], 0, 30, "utf-8")."...",$row["content"]);
        }
        echo "<p>". $content."</p></td>";
        echo "<td>" . $row["rating"]. "</td>";
        echo "<td>" . $row["date"]. "</td>";
        echo "</tr>";
      }
    } else { //if there's no results found
      echo "</tbody>";
      echo "</table>";
      echo "</div>";
      //warning image style
      echo "<p>";
      echo "<p>"."<img src='img_warning.png'/>"."</p>";
      //warning text style
      echo "<p>"."No results found from channel reviews"."</p>";
    }
  ?>

  <script type="text/javascript" src="keyword_search.js"></script>

</body>
</html>
