<?php
    $host="127.0.0.1"               //서버: 자기자신
    $dbid="root";
    $dbpw="데이터베이스 비밀번호";
    $dbname="db1"                   //사용할 데이터베이스 이름

    //DB 연결 함수
    function connect_db($host, $dbid, $dbpw, $dbname){
        return mysqli_connect($host, $dbid, $dbpw, $dbname)
    }

    $connect = connect_db($host, $dbid, $dbpw, $dbname);

    $data_stream="'".$_POST['name'].",".$_POST['email'].",".$_POST['password']."'";
    $query="insert into userinfo(name, email, password) values (".$data_stream")";
    $result = mysqli_query($connect, $query);

    mysqli_close($connect);
?>