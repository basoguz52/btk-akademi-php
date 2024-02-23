<html>

<head>

</head>

<body>
    <h1>Dizilerde Döngüler</h1>

    <?php
    // $ogrenciler = array("ali","ayşe","ahmet","deniz");

    // // echo print_r($ogrenciler);

    // for ($i=0; $i < count($ogrenciler); $i++) { 
    //     echo $ogrenciler[$i]."<br>";
    // }

    // $i = 0;
    // while($i < count($ogrenciler)) {
    //     echo $ogrenciler[$i++]."<br>";
    // }

    $urunler = array(
        "100" => array("urun_adi" => "iphone 10","fiyat" => 30000),
        "101" => array("urun_adi" => "iphone 11","fiyat" => 40000),
        "102" => array("urun_adi" => "iphone 12","fiyat" => 50000),
    );

    $keys = array_keys($urunler);

    for ($i = 0; $i < count($urunler); $i++) {
        // print_r($urunler[$i][0] . " " .  $urunler[$i][1] . "<br>");
        // echo $urunler[$i][0] . " ---> " .  $urunler[$i][1] . "<br>";
        echo $urunler[$keys[$i]]["urun_adi"]." - ";
        echo $urunler[$keys[$i]]["fiyat"]." TL ";
        echo "<br>";
    }
    ?>

</body>

</html>