<?php
require_once("../classes/ShopListing.php");

if (isset($_REQUEST['token']) && $_REQUEST['token'] == hash("sha256", "easymarket..")) {
    //echo"Hello";
    $shopLists->fetchBanners($conn);
    $success['code'] = 200;
    $success['msg'] = "success";
} else {
    $error['code'] = 401;
    $error['msg'] = "Token not set, or wrong token";
    header('Content-type: application/json');
    echo $_REQUEST['token'];
    echo json_encode($error);
}
