<?php
    $serverhost = "localhost";
    $user ="root";
    $pass ="Buicongdoan97";
    $db  = "doanstore";
    $con = mysqli_connect($serverhost,$user,$pass,$db);

    if(!$con){
        die("Connection failed: ".mysqli_connect_error());
    }


?>