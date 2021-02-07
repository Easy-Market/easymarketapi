<?php
require_once("../classes/homescreen.php");
//display sliders on home screen
if (isset($_REQUEST['token']) && ($_REQUEST['token'] == $token)) {
    if (isset($_REQUEST['sliders']) && ($_REQUEST['sliders'] == "yes")) {
        $homeOptions->showSliders($conn);
    } elseif (isset($_REQUEST['topcats']) && $_REQUEST['topcats'] == "yes") {
        $homeOptions->showTopCats($conn);
    } elseif (isset($_REQUEST['allcats'])){
        $start = $_REQUEST['start'];
        $end = $_REQUEST['end'];
        $homeOptions->showAllCats($conn, $start, $end);
    }
} else {
    header('Content-type: application/json');
    $error['code'] = 419;
    $error['msg'] = "wrongToken or wrongParameters";
    echo json_encode($error);
}
