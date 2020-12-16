<?php

session_start(); // 세션

session_destroy();
echo "<script>location.href='../main.php';</script>";

?>