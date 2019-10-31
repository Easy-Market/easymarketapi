<?php
require_once("config.php");
class homescreen
{
    public function showTopCats($conn)
    {
        $fetchCats = $conn->query("SELECT * FROM categories WHERE featured = 1");
        while ($topCats = $fetchCats->fetch_assoc()) {
            $topCatsData[] = array($topCats);
        }
        header('Content-type: application/json');
        $topCatInfo = json_encode($topCatsData);
        echo $topCatInfo;
    }
}

$homeOptions = new homescreen();
