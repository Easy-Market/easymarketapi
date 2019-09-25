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

    public function loginUser($conn, $phoneNum, $pass)
    {
        $loginUser = $conn->query("SELECT * FROM users WHERE us_phone = '$phoneNum'");
        if ($conn->affected_rows > 0) {
            $userInfo = $loginUser->fetch_assoc();
            if (password_verify($pass, $userInfo['us_password'])) {
                $accountFound['code'] = 200;
                $accountFound['msg'] = "account_found";
                header('content-type:application/json');
                echo json_encode($accountFound);
            } else {
                $wrongDetails['code'] = 419;
                $wrongDetails['msg'] = "wrong_details";
                header('content-type:application/json');
                echo json_encode($wrongDetails);
            }
        } else {
            $noRecord['code'] = 419;
            $noRecord['msg'] = "account_not_found";
            header('content-type:application/json');
            echo json_encode($noRecord);
            die();
        }
    }
}

$authClass = new auth();
