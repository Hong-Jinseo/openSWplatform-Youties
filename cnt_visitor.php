<?php
    $mysql_host = '127.0.0.1';
    $mysql_user = 'root';
    $mysql_password = 'jinseo00';
    $mysql_db = 'youties_info';
     
    $db = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_db);

	if(!isset($_SESSION)) { session_start(); } 

	date_default_timezone_set('Asia/Seoul');

	$currdt = date("Y-m-d H:i:s"); 
	$userip = $_SERVER['REMOTE_ADDR'];


	if(isset($_SERVER['HTTP_REFERER'])) 
		$referer = $_SERVER['HTTP_REFERER'];  
	else 
		$referer = ""; 
	if($db){

		// 처음 방문했는지 검사
		if(!isset($_SESSION['visit'])) { 
			$_SESSION['visit'] = "1";
			$query = "insert into tb_stat_visit (regdate, regip, referer) values('$currdt','$userip','$referer')";
			$result = $db->query($query);
        }
        
		// 오늘 방문자수
		$query = "select count(*) as count from tb_stat_visit where DATE(regdate) = DATE('$currdt')";
		$data = $db->query($query)->fetch_array();
		$today_visit_count = $data['count'];

		// 전체 방문자수
		$query = "select count(*) as count from tb_stat_visit";
		$data = $db->query($query)->fetch_array();
		$total_visit_count = $data['count'];

	}
?>  
