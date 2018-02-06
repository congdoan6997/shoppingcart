<?php

include("db.php");

$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email = $_POST['email'];

$password = $_POST['pass'];
$repassword = $_POST['r_pass'];
$mobile = $_POST['mobile'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$thongbao ="";
if(empty($f_name) || empty($l_name) || empty($email) ||empty($password)
||empty($repassword) ||empty($mobile) ||empty($address1)){
    $thongbao="Please Fill all fields";
}else if(!preg_match("/^[a-zA-Z]*$/",$f_name) ){
    $thongbao = "$f_name is not valid";
}else if(!preg_match("/^[a-zA-Z]*$/",$l_name)){
    $thongbao =  "$l_name is not valid";

}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $thongbao =  "$email is not valid";

}else if(strlen($password) < 5){
    $thongbao = "Password is weak";

}else if(strlen($repassword) < 5){
    $thongbao = "Re-enter Password is weak";

}else if($password != $repassword){
    $thongbao = "Password is not same";

}else if(!preg_match('/^\+?([0-9]{1,4})\)?[-. ]?([0-9]{10})$/', $mobile) ) {
    $thongbao = "Mobile number $mobile is not valid";
}else{
    $sql = "SELECT * FROM `user_info` WHERE email = '$email' LIMIT 1";
    $run_query = mysqli_query($con,$sql);
    if (mysqli_num_rows($run_query) >0)
    {
    	$thongbao = "Email Address is availdable. Try another email address";
    }

}

if (!empty($thongbao)) {
    echo "
            <div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>$thongbao</strong>
			</div>
        ";
    exit();
}else {
    $password = md5($password);
    $sql = "
			INSERT INTO `user_info`(`first_name`, `last_name`, `email`, `password`,
			`mobile`, `address1`, `address2`)
			VALUES ('$f_name','$l_name','$email','$password',
            '$mobile','$address1','$address2')
		";
    $run_query = mysqli_query($con,$sql);
    if ($run_query)
    {
        echo"
            <div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>You are registered successfully...</strong>
			</div>
        ";
    }

}



?>