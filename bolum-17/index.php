<?php

    // MySQLi -> MySQL

    // PDO => Php Data Object

    // echo "<pre>";
    // print_r(PDO::getAvailableDrivers());
    // echo "</pre>";

    include_once('baglanti.php');

    // $sql = "SELECT * FROM products";
    // $results = $pdo -> query($sql);
    
    // while ($row = $results -> fetch(PDO::FETCH_ASSOC)) {
        //     echo $row['title']."<br>";
        // }
        
        // while ($row = $results -> fetch()) {
            //     echo "Title: ".$row->title."<br>";
            //     echo "Price: ".$row->price."<br>";
            //     echo "<br>";
            // }
            
        // $urunler = $results-> fetchAll();
        
        // foreach ($urunler as $urun) {
        //     echo "<pre>";
        //     print_r($urun);
        //     echo "<pre>";
        // }
        
        $productId = 2;
        $price = 45000;
        $sql = "SELECT * FROM products WHERE price>? or id=?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$price,$productId]);
        $urunler = $statement->fetchAll();
        
        foreach ($urunler as $urun) {
            echo "<pre>";
            print_r($urun);
            echo "<pre>";
        }
?>