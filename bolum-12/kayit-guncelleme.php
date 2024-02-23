<?php

    include "ayar.php";

    // $query = "UPDATE kurslar SET baslik='Php Dersleri',altBaslik='ileri seviye php dersleri' WHERE id=1";
    
    $query = "UPDATE kurslar SET onay=1 where resim='1.jpg'";

    $sonuc = mysqli_query($baglanti, $query);

    if ($sonuc) {
        echo "veri güncellendi";
    }else {
        echo "güncelleme hatası";
    }

    mysqli_close($baglanti);

?>