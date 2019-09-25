<?php
require_once("../classes/Auth.php");

if (isset($_REQUEST['token']) && $_REQUEST['token'] == hash("sha256", "easymarket..")) {
    $phoneNum = $_REQUEST['phone'];
    $pass = $_REQUEST['pass'];
    $authClass->loginUser($conn, $phoneNum, $pass);
}
?>