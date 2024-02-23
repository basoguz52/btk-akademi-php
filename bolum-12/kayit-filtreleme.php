<?php

    include "ayar.php";

    // $query = "SELECT * FROM kurslar WHERE id=1";
    // $query = "SELECT * FROM kurslar WHERE id > 1";
    $query = "SELECT * FROM kurslar WHERE onay = 0";

    $sonuc = mysqli_query($baglanti, $query);

    while ($satir = mysqli_fetch_assoc($sonuc)) {
        echo $satir["id"]." ".$satir["baslik"];
        echo "<br>";
    }

    mysqli_close($baglanti);

?>