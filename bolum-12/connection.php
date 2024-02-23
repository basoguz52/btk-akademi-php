<?php

    // sunucu => coursedb
    // php, asp, nodejs => mysqli
    // php => pdo

    const host = "localhost"; // sql ip
    const username = "root";
    const password = "";
    const database = "coursedb";

    $baglanti = mysqli_connect(host,username,password,database);

    if(mysqli_connect_errno()){
        die("Hata: ".mysqli_connect_errno());
    }

    echo "mysql bağlantısı oluşturuldu.";
    
    // sql sorgularını yazacağız
    
    mysqli_close($baglanti);
    
    echo "<br>";
    echo "mysql bağlantısı kapatıldı.";
?>

<!-- <> -->