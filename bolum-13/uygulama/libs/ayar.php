<?php
    const host = "localhost"; // sql ip
    const username = "root";
    const password = "";
    const database = "coursedb";

    $baglanti = mysqli_connect(host,username,password,database);

    if(mysqli_connect_errno()){
        die("Hata: ".mysqli_connect_errno());
    }