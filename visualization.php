<?php
    $mysql_host = '127.0.0.1';
    $mysql_user = 'root';
    $mysql_password = '';
    $mysql_db = 'youties';

    $conn = mysqli_connect( 'localhost', 'root', '', 'youties' );
    $sql = "SELECT * FROM reviews where parent = 1 ";
    $result = mysqli_query($conn, $sql);

    $cnt=8;
    $temp=0;
    $row = mysqli_fetch_array($result);
    
    /*
    while($cnt<5){
        if ($row==$cnt){ 
            $temp = $row[$cnt+8]+ $temp; //반복문
        }
        $cnt++;
        break;
    }
    */

    while($cnt<5){     
        $temp= $row[$cnt]+ $temp; //반복문
        $cnt++;
        break;
    }

    $chk_sexual= $row['sexual'];
	$chk_violent= $row['violent'];
	$chk_crude= $row['crude'];
	$chk_horror= $row['horror'];
	$chk_imitative= $row['imitative'];
    $number_of_people=5;
    /*$number_of_people= $row['parent']; */

/*php파일에서 체크박스 변수 불러와서 설정해야합니다 수식은 다음과 같습니다 어쩌면 이거까지 php코드에 들어가야할지도 모르겠습니다..!*/

    $sexual_percent = $chk_sexual/$number_of_people*100;
    $violent_percent = $chk_violent/$number_of_people*100;
    $crude_percent = $chk_crude/$number_of_people*100;
    $horror_percent = $chk_horror/$number_of_people*100;
    $imitative_percent = $chk_imitative/$number_of_people*100;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>visualization_channel_intro</title>
</head>

<body>

    <style>
        body {padding: 50px;}
        .graph {height: 40px; margin: 0 0 30px; background: #ccc; border-radius: 40px;}
        .graph span { display: block; padding: 0 10px; height: 40px; line-height: 40px; text-align: right; border-radius: 40px; box-sizing: border-box; color: #fff;}
        .graph.stack1 span{ background: violet; animation: stack1 2s 1;}
        .graph.stack2 span{ background: skyblue; animation: stack2 2s 1;}                
        .graph.stack3 span{ background: orange; animation: stack3 2s 1;}
        .graph.stack4 span{ background: salmon; animation: stack4 2s 1;}
        .graph.stack5 span{ background: cornflowerblue; animation: stack5 2s 1;}

        .position {
            margin: 100px; 
            background-color: grey;
            padding: 30px;
            width: 450px;
            border-radius: 10px;
            }

        @keyframes stack1{
            0% { width: 0; color: rgba(255,255,255,0);}
            40% { color: rgba(255,255,255,1);}
            100% { width: <?php echo $sexual_percent; ?>; }
        }
        @keyframes stack2{
            0% { width: 0; color: rgba(255,255,255,0);}
            40% { color: rgba(255,255,255,1);}
            100% { width: <?php echo $violent_percent; ?>; }
        }
        @keyframes stack3{
            0% { width: 0; color: rgba(255,255,255,0);}
            40% { color: rgba(255,255,255,1);}
            100% { width: <?php echo $crude_percent; ?>; }
        }
        @keyframes stack4{
            0% { width: 0; color: rgba(255,255,255,0);}
            40% { color: rgba(255,255,255,1);}
            100% { width: <?php echo $horror_percent; ?>; }
        }
        @keyframes stack5{
            0% { width: 0; color: rgba(255,255,255,0);}
            40% { color: rgba(255,255,255,1);}
            100% { width: <?php echo $imitative_percent; ?>; }
        }
    </style>

    <div class="position">
        <div class="graph stack1">
            <span style="width: <?php echo "{$sexual_percent}%"; ?> ;"> <?php echo "sexual {$sexual_percent}%"; ?> </span>
        </div>
        <div class="graph stack2">
            <span style="width:<?php echo "{$violent_percent}%"; ?> ;"> <?php echo "violent {$violent_percent}%"; ?></span>
        </div>
        <div class="graph stack3">
            <span style="width:<?php echo "{$crude_percent}%"; ?> ;"> <?php echo "crude {$crude_percent}%"; ?></span>
        </div>
        <div class="graph stack4">
            <span style="width:<?php echo "{$horror_percent}%"; ?> ;"> <?php echo "horror {$horror_percent}%"; ?></span>
        </div>
        <div class="graph stack5">
            <span style="width:<?php echo "{$imitative_percent}%"; ?> ;"> <?php echo "imitative {$imitative_percent}%"; ?></span>
        </div>

    </div>

</body>
</html>
