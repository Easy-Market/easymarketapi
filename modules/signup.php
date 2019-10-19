<?php
require_once("../classes/Auth.php");

if (isset($_REQUEST['token']) && $_REQUEST['token'] == hash("sha256", "easymarket..")) {
    //$email, $phoneNum, $password, $fname, $lname, $businessname, $cansell, $displaymode, $pass1, $pass2, $vendorurl
    $email = $_REQUEST['email'];
    $phoneNum = $_REQUEST['phonenum'];
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    if (isset($_REQUEST['bizname'])) {
        $businessname = $_REQUEST['bizname'];
    }
    if (isset($_REQUEST['cansell'])) {
        $cansell = $_REQUEST['cansell'];
    }
    if (isset($_REQUEST['displaymode'])) {
        $displaymode = $_REQUEST['displaymode'];
    }
    $pass1 = $_REQUEST['pass1'];
    $pass2 = $_REQUEST['pass2'];
    if (isset($_REQUEST['vendorurl'])) {
        $vendorurl = $_REQUEST['vendorurl'];
    }


    if (isset($_REQUEST['cansell'])) {
        $authClass->signupVendor($conn, $email, $phoneNum, $fname, $lname, $businessname, $cansell, $displaymode, $pass1, $pass2, $vendorurl);
    } else {
        $authClass->signup($conn, $email, $phoneNum, $fname, $lname, $pass1, $pass2);
    }
} else {
    $error['code'] = 400;
    $error['msg'] = "bad_token";
    header('content-type:application/json');
    echo json_encode($error);
}
