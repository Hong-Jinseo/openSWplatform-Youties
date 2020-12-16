<?php include_once("cnt_visitor.php");?>

<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8">
  <meta name = "description" content = "main page">
  <title>Youties</title>
  <link rel = "stylesheet" href = "main.css?after">
  <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
  <div id = "wrapper">
    <header id = "main_header">
      <a class = "top_menu" href = "main.html" target = "_top">SIGN UP</a> <!--signup페이지로 연결-->
      <a class = "top_menu" href = "main.html" target = "_top">SIGN IN</a> <!--signin페이지로 연결-->
    </header>
  </div>
  <form class = 'search' action = "search.php" method = "GET">
  <div id = "main_logo">
    <img src = "logo2.png" border = "0">
  </div>
  <div>
      <!--review 수, channel 수, member 수 db 연결-->
    <p id = "main_info">REVIEWS: &nbsp&nbspCHANNELS: &nbsp&nbspMEMBERS: &nbsp&nbspVISITORS: <?php echo $today_visit_count?>&nbsp&nbsp</p>
  </div>

  <?php
    $conn = mysqli_connect($mysql_host,$mysql_user,$mysql_password,'youtube_info')or die("fail");
    $query = "SELECT * FROM channels WHERE name";
    $result = mysqli_query($conn, $query);

    $cnt_query = "SELECT count(0) FROM channels";



  ?>
  <div id = "main_search">
    <input type = "text" class = "search_word" name = "keyword" id = "keyword" autocomplete = "off" autofocus placeholder = "Type Channel Name">
    <button type = "button" class = "search_btn" name = "click_btn" value = "">
      <i class = "fas fa-search"></i>
    </button>
  </div>
  <div class = "keyword_list">
    <ul class = "list-group" id = "list"></ul>
  </div>
</form>
<script type="text/javascript" src="./main2.js">
  const people = new Object();
  for (var i in <?php 
    if (mysqli_num_rows($result) > 0) { 
      while($row = mysqli_fetch_assoc($result)) {
        
        echo $row["name"];
        
      }
    } ?>) { //등록된 채널 수만큼 반복
    people.name = <?php echo $result ?>; //객체 삽입
  }

const list = document.getElementById('list');

function setList(group){
  clearList();
  for (const person of group) {
    const item = document.createElement('li');
    item.classList.add('list-group-item');
    const text = document.createTextNode(person.name);
    item.appendChild(text);
    list.appendChild(item);
  }
  if(group.length === 0){
    setNoResult();
  }
}

function clearList(){
  while(list.firstChild){
    list.removeChild(list.firstChild);
  }
}

function setNoResult() {
  const item = document.createElement('li');
  item.classList.add('list-group-item');
  const text = document.createTextNode('No results found');
  item.appendChild(text);
  list.appendChild(item);
}

function computeRelevancy(name, searchTerm) {
let value = name.trim().toLowerCase();
  if (value === searchTerm) {
    return 2;
  } else if (value.startsWith(searchTerm)){
    return 1;
  } else if (value.includes(searchTerm)){
    return 0;
  } else {
    return -1;
  }
}

const searchInput = document.getElementById('keyword');
searchInput.addEventListener('input', (event) => {
  let value = event.target.value;
  if (value && value.trim().length > 0) {
    value = value.trim().toLowerCase();
    setList(people.filter(person => {
      return person.name.toLowerCase().includes(value);
    }).sort((person1, person2) => {
      return computeRelevancy(person2.name, value) - computeRelevancy(person1.name, value);
    }));
  } else {
    clearList();
  }
})
  
</script>
</body>
</html>