<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8">
  <meta name = "description" content = "search result page">
  <title>$input</title> <!--사용자가 입력한 검색어를 타이틀로-->
  <link rel = "stylesheet" href = "search.css">
  <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
  <div id = "wrapper">
    <header id = "main_header">
      <a class = "top_menu" href = "main.html" target = "_top">SIGN UP</a> <!--signup페이지로 연결-->
      <a class = "top_menu" href = "main.html" target = "_top">SIGN IN</a> <!--signin페이지로 연결-->
    </header>
  </div>
  <form class = 'search', action = "search.php", method = "post">
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
  $mysql_password = '';
  $mysql_db = 'youtube_info';
  //connetc 설정(host,user,password)
  $conn = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db)or die("fail");
  $conn2 = mysqli_connect($mysql_host,$mysql_user,$mysql_password,'youties')or die("fail");
  //쿼리문 작성
  echo "<tr><th>$_POST[keyword]";
  echo "의 검색결과";

  $input = $_POST['keyword'];
  
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
          <th>Category</th>
          <th>Image</th>
          <th>Channel Name</th>
          <th>Info</th>
          <th>Rating / Reveiws</th>
        </tr>
      </thead>
      <tbody>
    
  <?php 

    if (mysqli_num_rows($result) > 0) { 
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        
        echo "<td>" . $row["category"]. "</td>";
        echo "<td>";
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'"/>';
        echo "</td>";
        echo "<td>" . $row["name"]. "</td><td>";
        echo "<p>";
        echo "<img src='img_views.png'/>". " ". $row["views"]."</p>";
        echo "<p>";
        echo "<img src='img_subs.png'/>"." ". $row["subscribers"]."</p>";
        echo "<p>";
        echo "<img src='img_videos.png'/>"." ". $row["videos"]."</p></td>";
        echo "<td>";
        echo "<style> p {text-align: left;} </style>";
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
      echo "<style> p { 
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 5rem; }</style>";
      echo "<p>"."<img src='img_warning.png'/>"."</p>";
      
      //warning text style
      echo "<style> p { 
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
        font-family: system-ui, serif;
        font-size: 2rem; }</style>";
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
          <th>Channel Name</th> 
          <th>Reviews</th>
          <th>Rating</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
    
  <?php 
    if (mysqli_num_rows($result2) > 0) { 
      while($row = mysqli_fetch_assoc($result2)) {
        echo "<tr>";
        echo "<td>" . $row["channel"]. "</td>";
        echo "<td><p>" . $row["title"]. "</p>";
        echo "<p>". $row["content"]."</p></td>";
        echo "<td>" . $row["rating"]. "</td>";
        echo "<td>" . $row["date"]. "</td>";
        echo "</tr>";
      }
    } else { //if there's no results found
      echo "</tbody>";
      echo "</table>";
      echo "</div>"; 
      //warning image style
      echo "<style> p { 
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 5rem; }</style>";
      echo "<p>"."<img src='img_warning.png'/>"."</p>";
    
      //warning text style
      echo "<style> p { 
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
        font-family: system-ui, serif;
        font-size: 2rem; }</style>";
      echo "<p>"."No results found from channel reviews"."</p>";
    }
  ?>

  <script type="text/javascript" src="keyword_search.js"></script>

</body>
</html>
