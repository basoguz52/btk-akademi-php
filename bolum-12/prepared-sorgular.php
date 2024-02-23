<?php

    include "ayar.php";
    
    $baslik = 'Angular Kursu';
    $altBaslik = 'ileri seviye angular dersleri';
    $resim = "1.jpg";
    $yayinTarihi = '10/10/2023';
    $yorumSayisi = 10;
    $begeniSayisi = 10;
    $onay = 1;

    $query = "INSERT INTO kurslar(baslik,altBaslik,resim,yayinTarihi,yorumSayisi,begeniSayisi,onay) VALUES(?,?,?,?,?,?,?)";

    $statement = mysqli_prepare($baglanti, $query);

    mysqli_stmt_bind_param($statement, 'ssssiii',
    $baslik, $altBaslik, $resim, $yayinTarihi, $yorumSayisi, $begeniSayisi, $onay);

    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    
    echo "veri eklendi";

    mysqli_close($baglanti);

?>