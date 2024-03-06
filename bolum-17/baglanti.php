<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "commerce";

    try {
        $dsn = "mysql:host=".$host.";"."dbname=".$db_name;
        $pdo = new PDO($dsn,$user,$password);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        echo "bağlantı başarılı..."."<br>";
    } catch (PDOException $e) {
        echo "bağlantı hatası: ".$e->getMessage();
    }


?>