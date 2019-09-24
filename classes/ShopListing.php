<?php
require_once("config.php");
class shopListing
{
    public function fetchBanners($conn)
    {
        //@var bannerIds is an array that contains several banner IDs.
        $fetchBanners = $conn->query("SELECT * FROM banners");
        if ($conn->affected_rows > 0) {
            while ($bannerArray = $fetchBanners->fetch_assoc()) {
                //echo $bannerData['ba_id'];
                $bannerData[] = array($bannerArray);
            }
               header('Content-type: application/json');
               //$messageInfo[] = array('readmessage' => $bannerData);
                $banners = json_encode($bannerData);
                echo $banners;
                /*
                $decoded = json_decode($banners, true);
                $array = array($decoded);
                foreach($decoded as $blah) {
                    echo $blah[0]['ba_catid'];
                }
                */
        } else {
            $error['code'] = 401;
            $error['msg'] = "empty string";
            header('content-type:application/json');
            echo json_encode($error);
        }
    }


    public function featuredCats($conn){
        $fetchCats = $conn->query("SELECT * FROM categories WHERE cat_type = 1");
    }
}
$shopLists = new shopListing();
