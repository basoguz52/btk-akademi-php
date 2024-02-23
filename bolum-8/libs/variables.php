<?php

    
$title = "Popüler Kurslar";

$kategoriler = array(
    array("ad" => "Programlama", "aktif" => true),
    array("ad" => "Web Geliştirme", "aktif" => false),
    array("ad" => "Veri Analizi", "aktif" => false),
    array("ad" => "Back-End Programlama", "aktif" => false),
    array("ad" => "Ofis Uygulamaları", "aktif" => false),
    array("ad" => "Mobil Uygulamaları", "aktif" => false),
);

$sehirler = array(
    "41" => "Kocaeli",
    "34" => "İstanbul",
    "06" => "Ankara", 
    "53" => "Rize",
    "52" => "Ordu",
);

$hobiler = array(
    "1" => "Sinema",
    "2" => "Spor",
    "3" => "Müzik",
    "4" => "Satranç"
);


$kurslar = array(
    "1" => array(
        "baslik" => "Php Kursu",
        "altBaslik" => "Sıfırdan İleri Seviye Php ile Web Geliştirme",
        "resim" =>  "https://img-c.udemycdn.com/course/750x422/3952174_5d3a.jpg",
        "yayinTarihi" => "01.01.2023",
        "yorumSayisi" => 0,
        "begeniSayisi" => 10,
        "onay" => true
    ),
    "2" => array(
        "baslik" => "Python Kursu",
        "altBaslik" => "Sıfırdan İleri Seviye Python Programlama",
        "resim" =>  "https://img-c.udemycdn.com/course/750x422/2463492_8344_3.jpg",
        "yayinTarihi" => "01.01.2023",
        "yorumSayisi" => 10,
        "begeniSayisi" => 0,
        "onay" => true
    ),
    "3" => array(
        "baslik" => "Node.js Kursu",
        "altBaslik" => "Sıfırdan İleri Seviye Node.js ile Web Geliştirme",
        "resim" =>  "https://img-c.udemycdn.com/course/750x422/1944162_74f2_3.jpg",
        "yayinTarihi" => "01.01.2023",
        "yorumSayisi" => 10,
        "begeniSayisi" => 20,
        "onay" => true
    ),
    "4" => array(
        "baslik" => "Java Kursu",
        "altBaslik" => "Sıfırdan İleri Seviye Java ile Back-End Geliştirme",
        "resim" =>  "https://veriakademi.com/images/java-kurs.png",
        "yayinTarihi" => "01.01.2023",
        "yorumSayisi" => 0,
        "begeniSayisi" => 5,
        "onay" => true
    )
);

?>