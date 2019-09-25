<?php
require_once("../classes/Auth.php");

if (isset($_REQUEST['token']) && $_REQUEST['token'] == hash("sha256", "easymarket..")) {
//$email, $phoneNum, $password, $fname, $lname, $businessname, $cansell, $displaymode, $pass1, $pass2, $vendorurl
$email = $_REQUEST['email'];
$phoneNum = $_REQUEST['phonenum'];
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$businessname = $_REQUEST['bizname'];
$cansell = $_REQUEST['cansell'];
$displaymode = $_REQUEST['displaymode'];
$pass1 = $_REQUEST['pass1'];
$pass2 = $_REQUEST['pass2'];
$vendorurl = $_REQUEST['vendorurl'];


$authClass-> signupVenodor($conn, $email, $phoneNum, $fname, $lname, $businessname, $cansell, $displaymode, $pass1, $pass2, $vendorurl);
}  else {
    $error['code'] = 400;
    $error['msg'] = "bad_token";
    header('content-type:application/json');
    echo json_encode($error);
}
?>