<?php
require_once("config.php");
class homescreen
{
    public function showSliders($conn)
    {
        $fetchSlides = $conn->query("SELECT * FROM sliders WHERE featured = 1");
        while ($topCats = $fetchSlides->fetch_assoc()) {
            $fetchSliderData[] = array($topCats);
        }
        if ($conn->affected_rows > 0) {
            header('Content-type: application/json');
            $sliderInfo = json_encode($fetchSliderData);
            echo $sliderInfo;
        } else {
            header("Content-type: application/json");
            $error['code'] = 419;
            $error['msg'] = "emptySet";
            echo json_encode($error);
         }
    }

    public function showAllCats($conn, $start, $end)
    {
        header("Content-type: application/json");
        $getAllCats = $conn->query("SELECT * FROM categories LIMIT $start, $end");
            //header("Content-type:application/json");
            while ($allCats = $getAllCats->fetch_assoc()) {
                $catsData[] = array($allCats);
        } 
        if($conn->affected_rows > 0){
            $allCatInfo = json_encode($catsData);
            echo $allCatInfo;
        }else {
            header("Content-type: application/json");
            $error['code'] = 419;
            $error['msg'] = "emptySet";
            echo json_encode($error);
        }
    }

    public function showTopCats($conn)
    {

        $getTopCats = $conn->query("SELECT * FROM categories WHERE featured = 1");
        while ($topCats = $getTopCats->fetch_assoc()) {
            $topCatsInfo[] = array($topCats);
        }
        if ($conn->affected_rows > 0) {
            $featuredCats = json_encode($topCatsInfo);
            echo $featuredCats;
        } else {
            header("Content-type: application/json");
            $error['code'] = 419;
            $error['msg'] = "emptySet";
            echo json_encode($error);
        }
    }
}
$homeOptions = new homescreen();
