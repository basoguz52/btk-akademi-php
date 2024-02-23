<?php
// $ogrenciler = array("ali", "ayşe", "ahmet", "deniz");

// foreach ($ogrenciler as $ogrenci) {
//     echo $ogrenci . "<br>";
// }

// $urunler = array(
//     array("iphone 11", 30000),
//     array("iphone 12", 40000),
//     array("iphone 13", 50000),
// );

// foreach ($urunler as $urun) {
//     echo $urun[0] . " " . $urun[1] . "<br>";
// }

$urunler = array(
    "100" => array("urun_adi" => "iphone 10","fiyat" => 30000),
    "101" => array("urun_adi" => "iphone 11","fiyat" => 40000),
    "102" => array("urun_adi" => "iphone 12","fiyat" => 50000),
);

foreach ($urunler as $key => $value) {
    echo $key." ".$value["urun_adi"]." " .$value["fiyat"]."<br>";
}