<?php
include("db.php");
session_start();
if (isset($_POST['userLogin']))
{

    $email = mysqli_real_escape_string($con, $_POST['userEmail']);
    //$email = $_POST['userPass'];
    $pass = md5($_POST['userPass']);
    $sql = "SELECT * FROM `user_info` WHERE email ='$email' and password = '$pass'";
    $run_query = mysqli_query($con,$sql);
    if(mysqli_num_rows($run_query) == 1){
        $row = mysqli_fetch_array($run_query);
        $_SESSION['uid']= $row['user_id'];
        $_SESSION['name'] = $row['first_name'];
        echo "Buicongdoan97";
    }
}

?>