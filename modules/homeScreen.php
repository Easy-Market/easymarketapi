<?php
require_once("../classes/homescreen.php");
if(isset($_REQUEST['token']) && ($_REQUEST['token'] == $token)){
$homeOptions->showTopCats($conn);
} else{
    header('Content-type: application/json');
    $error['code'] = 419;
    $error['msg'] = "wrongToken";
    echo json_encode($error);
}