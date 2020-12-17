<?php


session_start();

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "111111");
define("DB_DATABASE", "youties");
$connect = mysqli_connect("localhost", "root", "111111", "youties");

$get_you = $_GET["get_you"];

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Youties</title>
		<link rel="stylesheet" href="channel_intro_style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<script src="jquery-3.5.1.min.js"></script>

		<script type = "text/javascript">
			function goMainPage() {
				location.href="main.php";
			}


			function colorChange(num) {
				var bgColor = ["#bbbaba", "#c0412b"];
				var fontColor = ["#000000", "#ffffff"];
				var bodyTag = document.getElementById("tag"+num);

				if(bodyTag.style.backgroundColor == "#c0412b"){
					bodyTag.style.backgroundColor = bgColor[0];
					bodyTag.style.color = fontColor[0];
				}
				else{
					bodyTag.style.backgroundColor = bgColor[1];
					bodyTag.style.color = fontColor[1];
				}

			}

			//태그 클릭했는지 확인
			function chk_tag(num){
				var tag = document.getElementById("tag_hidden"+num);
				if(tag.value == 0) {tag.value = 1;}
				else {tag.value = 0;}
			}

			//별점 숫자
			function change_num(num){
				var label = document.getElementById("rating_num");
				var label_hidden = document.getElementById("rating_num_hidden");

				label.innerText = (num+"/5");
				label_hidden.value = num;
			}

			//체크박스
			function chk_checkbox(num){
				var box = document.getElementById("chk_box"+num);
				if(box.checked) {box.value= 1}
				else {box.value = 0}
			}





			//제이쿼리 호출 메소드
			$(document).ready(function() {
				//별점 메소드
				$(".star_rating a").click(function() {
					$(this).parent().children("a").removeClass("on");
					$(this).addClass("on").prevAll("a").addClass("on");
					return false;
				});

				$("tag-button button").click(function(){
					if($(this).value==0){$(this).value(1)}
					else{$(this).value(0)}
				});

				/* TAG 색 바꾸기
				$(".tag-btn").click(function(){
					if(tag-btn.css("color") != "rgb(255, 255, 255)"){
						tag-btn.css("color", "rgb(255, 255, 255)");
						tag-btn.css("background-color", "rgb(192, 65, 43)");
					}
					else{
						tag-btn.css("color", "rgb(0, 0, 0)");
						tag-btn.css("background-color", "rgb(187, 186, 186)");
					}
				});
				*/
			});

		</script>


	</head>

	<body>

		<header id="main_header_logo">
			<a href="main.php">
				<img src="image/logo2_removebg.jpg" id="logo_header" alt="YOUTIES" width="150"/><br>
			</a>
		</header>

		<!--내용 위치 잡기용 div-->
		<div id="channel-intro">
			<!--grid 배치-->
			<div id="channel-intro-grid">
        <?php
        $sql = "select * from channels where id = '$get_you'";
        //db를 선택시 어떤 조건의 데이터를 불러올지
        $result = mysqli_query($connect, $sql);
        //그 결과값을 담음
        $row = mysqli_fetch_array($result);
        $ch = $row['id'];
        $movie= $row["movie"];
        ?>



				<!--유튜버 소개-->
				<div id="div1" class="div-background">
					<div id="div1-1">
						<figure>
              <img style="width:285px" src="<?php echo $row['image']?>" alt="">


						</figure>
					</div>

					<div id="div1-2">
            <h1><?php echo $row['name']?></h1>
					</div>

					<div id="div1-3">
            <b><?php echo $row['category']?></b><br>
            <?php echo $row['subscribers']?> subscribers<br>
            <?php echo $row['videos']?> videos<br>
					</div>
				</div>

				<!--채널 리뷰 요약-->
				<div id="div2" class="div-background">
					summary
          <?php
          $sql2 = "select avg(rating) from reviews where parent = '$ch'";  //avg(rating)
          $result2 = mysqli_query($connect, $sql2);
          $row2 = mysqli_fetch_array($result2);
          //echo  $row2["rating"];

          $sql = "select * from reviews where parent = '$ch'";
           //db를 선택할건데 어떤 조건의 데이터를 불러올지
           $result = mysqli_query($connect, $sql);
           //그 결과값을 담음
            $num_rows = mysqli_num_rows($result);
          if($num_rows > 0){

            $row = mysqli_fetch_array($result);

            for($i2=0;$i2<$num_rows;$i2++){
              mysqli_data_seek($result, $i2);
              $row = mysqli_fetch_array($result);
              $kk[] = $row["rating"];

              $kk1[] = $row["sexual"];
              $kk2[] = $row["violent"];
              $kk3[] = $row["crude"];
              $kk4[] = $row["horror"];
              $kk5[] = $row["imitative"];
            }
           $kk = round(array_sum($kk)/$num_rows);
           $kk1 = round(array_sum($kk1));
           $kk2 = round(array_sum($kk2));
           $kk3 = round(array_sum($kk3));
           $kk4 = round(array_sum($kk4));
           $kk5 = round(array_sum($kk5));
          }else{
            echo " 데이터가 없습니다";
          }
          ?>

					<div id="div4-2-2">
					<p class="star_2">

						<?php for($i=0;$i< $kk;$i++){ ?>
							<a href="javascript://" class="on">★</a>
						<?php }?>
							<?php for($i=0;$i<5-$kk;$i++){ ?>
							<a href="javascript://">★</a>
						<?php }?>


            </p>
          </div>
          <div style="margin-top:15px;">
            <p>sexual : (<?php echo $kk1?>)</p>
            <p>violent : (<?php echo $kk2?>)</p>
            <p>crude : (<?php echo $kk3?>)</p>
            <p><p>horror : (<?php echo $kk4?>)</p>
            <p>encourage imitative actions : (<?php echo $kk5?>)</p>
          </div>
				</div>



				<!--리뷰 쓰기-->
				<div id="div4" class="div-background div-background-full">
          <iframe width="1194" height="672" src="<?php echo $movie?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<form action="save_review.php" method="POST">

						<div id="div4-grid">
							<div id="div4-1" class="inner-div">
								<h2>Review this channel</h2>
							</div>

							<div id="div4-2" class="inner-div-allpadding">
								<div id="div4-2-1">
									<b>YOUR RATING</b>
								</div>

								<div id="div4-2-2">
									<p class="star_rating">
										<a href="#" onclick="change_num(1)">★</a>
										<a href="#" onclick="change_num(2)">★</a>
										<a href="#" onclick="change_num(3)">★</a>
										<a href="#" onclick="change_num(4)">★</a>
										<a href="#" onclick="change_num(5)">★</a>
									</p>
								</div>

								<div id="div4-2-3">
									<label id="rating_num">0/5</label>
									<input type="hidden" id="rating_num_hidden" name="rating" value="">
								</div>

							</div>

							<div id="div4-3" class="inner-div">
								<b>TAG</b>
								<div id="tag-button">
									<button type="button" id="tag1" name="tag1" class="tag-btn" onclick="colorChange(1); chk_tag(1)">재미있는</button>
									<input type="hidden" id="tag_hidden1" name="tag_hidden1" value=0>
									<button type="button" id="tag2" name="tag2" class="tag-btn" onclick="colorChange(2); chk_tag(2)" value=0>유익한</button>
									<input type="hidden" id="tag_hidden2" name="tag_hidden2" value=0>
									<button type="button" id="tag3" name="tag3" class="tag-btn" onclick="colorChange(3); chk_tag(3)" value=0>힐링되는</button>
									<input type="hidden" id="tag_hidden3" name="tag_hidden3" value=0>
									<button type="button" id="tag4" name="tag4" class="tag-btn" onclick="colorChange(4); chk_tag(4)" value=0>스토리텔링</button>
									<input type="hidden" id="tag_hidden4" name="tag_hidden4" value=0>

									<textarea name="channel" rows="1" placeholder="channel"></textarea>
								</div>
							</div>

							<div id="div4-4" class="inner-div-4">
								<b id="your_review">YOUR REVIEW</b>
								<div id="write-review">
									<textarea id="review-title" name="title" rows="1" placeholder="Write a headline for your review here"></textarea><br>
									<textarea id="review-content" name="content" rows="7" class="textarea_test" placeholder="Write your review here"></textarea> <!--onkeyup="this.style.height='26p'; this.style.height = this.scrollHeight+'px'"></textarea-->
									<input type="submit" id="submit_review_btn" value="Submit" style="width:100%"></button>
								</div>
							</div>

							<div id="div4-5" class="inner-div">
								<div id="div4-title">
									<b>HARMFUL CONTENT?</b>
								</div>

								<div id="harmful-checkbox-all">
									<div class="harmful-checkbox">
										sexual
										<input type="checkbox" id="chk_box1" name="sexual" value=0 onclick="chk_checkbox(1)">
									</div>

									<div class="harmful-checkbox">
										violent
										<input type="checkbox" id="chk_box2" name="violent" value=0 onclick="chk_checkbox(2)">
									</div>

									<div class="harmful-checkbox">
										crude
										<input type="checkbox" id="chk_box3" name="crude" value=0 onclick="chk_checkbox(3)">
									</div>

									<div class="harmful-checkbox">
										horror
										<input type="checkbox" id="chk_box4" name="horror" value=0 onclick="chk_checkbox(4)">
									</div>

									<div class="harmful-checkbox">
										encourage imitative actions
										<input type="checkbox" id="chk_box5" name="imitative" value=0 onclick="chk_checkbox(5)">
									</div>
								</div>
							</div>
						</div>


					</form>

				</div>

				<!--다른 리뷰 보기-->
				<div id="div5" class="div-background div-background-full">
					<div id="div5-title" class="inner-div">
						<h2>User reviews <button type="button" id="gotoReview" onClick="location.href='review.html'">>></button> </h2>
					</div>

					<div id="div5=subtitle" class="inner-div subtitle">
						<label>Positive</label>
					</div>

					<div id="div5=subtitle" class="inner-div subtitle">
						<label>Negative</label>
					</div>


					<div id="div5-review1" class="inner-div inner5">
						<div id="user-info">
							<label id="user-info-star">★ ★ ★ ★ ★</label>
							<label id="user-info-num">Youties #26</label>
						</div>

						<div id="user-review">
							리뷰 내용<br>리뷰 내용<br>리뷰 내용<br>
						</div>
					</div>

					<div id="div5-review2" class="inner-div inner5">
						<div id="user-info">
							<label id="user-info-star">★</label>
							<label id="user-info-num">Youties #26</label>
						</div>

						<div id="user-review">
							리뷰 내용<br>리뷰 내용<br>리뷰 내용<br>
						</div>
					</div>

					<div id="div5-review3" class="inner-div inner5">
						<div id="user-info">
							<label id="user-info-star">★ ★ ★ ★ ★</label>
							<label id="user-info-num">Youties #26</label>
						</div>

						<div id="user-review">
							리뷰 내용<br>리뷰 내용<br>리뷰 내용<br>
						</div>
					</div>

					<div id="div5-review4" class="inner-div inner5">
						<div id="user-info">
							<label id="user-info-star">★</label>
							<label id="user-info-num">Youties #26</label>
						</div>

						<div id="user-review">
							리뷰 내용<br>리뷰 내용<br>리뷰 내용<br>
						</div>
					</div>

				</div>

			</div>
		</div>
	</body>
</html>
