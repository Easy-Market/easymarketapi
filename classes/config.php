<?php

global $baseURL;
$localhost = array("127.0.0.1", "::1");
if (in_array($_SERVER['REMOTE_ADDR'], $localhost)) {
    $baseURL = "http://localhost/easymarketapi/";
    $host = "localhost";
    $username = "root";
    $passwd = "";
    $dbname = "mymarket";
    $token = hash("sha256", "easymarket..");
} else {
    $baseURL = "http://api.easymarket.com.ng/";
    $host = "localhost";
    $username = "ceervdcg_easyadmin";
    $passwd = "iamtheb0ss";
    $dbname = "ceervdcg_easymarket";
    $token = hash("sha256", "easymarket..");

}




$conn = new mysqli($host, $username, $passwd);
mysqli_select_db($conn, $dbname);
// Check connection
if ($conn->connect_error) {
    die("<b>Connection failed: " . $conn->connect_error . "</b>");
}
$debugMode = "On";
if ($debugMode == "On") {
    //print("<h1>Debug mode is on! Be sure to disable all debug-related functions.</h1>");
}
?>