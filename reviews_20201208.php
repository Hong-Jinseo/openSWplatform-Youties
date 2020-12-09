<?php
               $connect = mysqli_connect("localhost", "root", "", "opentutorials") or die("fail");


               //userid 어떻게?
               $userid = "";
               $title = $_GET[title];                  //Title
               $content = $_GET[content];              //Content
               $date = date('Y-m-d H:i:s');            //Date

               $URL = './reviews.php';                   //return URL


               $query = "insert into board (number, title, userid, content, date)
                       values(null,'$title', '$userid','$content', '$date')";


               $result = $connect->query($query);
               if($result){
?>                  <script>
                       alert("<?php echo "글이 등록되었습니다."?>");
                       location.replace("<?php echo $URL?>");
                   </script>
<?php
               }
               else{
                       echo "FAIL";
               }

               mysqli_close($connect);
?>
