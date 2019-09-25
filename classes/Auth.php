<?php
require_once("config.php");

class auth
{
    public function signupVenodor($conn, $email, $phoneNum, $fname, $lname, $businessname, $cansell, $displaymode, $pass1, $pass2, $vendorurl)
    {
        $conn->query("SELECT * FROM users WHERE us_email = '$email' OR us_phone = '$phoneNum'");
        if ($conn->affected_rows > 0) { //check if user exists
            $userExists['code'] = 419;
            $userExists['msg'] = "UserExists";
            header('content-type:application/json');
            echo json_encode($userExists);
            die();
        } else {
            $vendorurl = preg_replace("/[^a-zA-Z]+/", "", $vendorurl); // allow only letters of the alphabet
            $conn->query("SELECT * FROM users WHERE vendorurl = '$vendorurl'");
            if ($conn->affected_rows == 0) {
                if ($pass1 == $pass2) { //check if passwords match
                    $password = password_hash($pass1, PASSWORD_DEFAULT); //hash password
                    $newUser = $conn->prepare("INSERT INTO users(us_email, us_phone, us_password, us_fname, us_lname, us_businessname,
                us_cansell, us_displaymode, vendorurl) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $newUser->bind_param("ssssssiss", $email, $phoneNum, $password, $fname, $lname, $businessname, $cansell, $displaymode, $vendorurl);
                    if ($newUser->execute()) {
                        $success['code'] = 200;
                        $success['msg'] = "usercreated";
                        header('content-type:application/json');
                        echo json_encode($success);
                    }
                } else {
                    $passwordMismatch['code'] = 419;
                    $passwordMismatch['msg'] = "passwordmismatch";
                    header('content-type:application/json');
                    echo json_encode($passwordMismatch);
                }
            } else {
                $vendorExists['code'] = 419;
                $vendorExists['msg'] = "vendorurlexists";
                header('content-type:application/json');
                echo json_encode($vendorExists);
            }
        }
    }
}

$authClass = new auth(); 
