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

        // ----------prepared----------
        
        // $productId = 2;
        // $price = 45000;
        // $sql = "SELECT * FROM products WHERE price>? or id=?";
        // $statement = $pdo->prepare($sql);
        // $statement->execute([$price,$productId]);
        // $urunler = $statement->fetchAll();
        
        // foreach ($urunler as $urun) {
        //     echo "<pre>";
        //     print_r($urun);
        //     echo "<pre>";
        // }

        // ----------insert data----------

        // $title = "Discovery Mobil 4";
        // $price = 17000;
        // $description = "güzel mazili telefon";
        
        // $sql = "INSERT INTO products(title,price,description) VALUES(:title,:price,:description)";
        // $stmt = $pdo->prepare($sql);
        // $stmt ->execute(['title'=>$title,'price'=>$price,'description'=>$description]);
        
        // echo "kayıt eklendi...";
        
        // ----------multiple insert----------
        
        // $title = "Samsung Kalem";
        // $price = 20000;
        // $description = "güzel mazili telefon";
        
        // $sql = "INSERT INTO products(title,price,description) VALUES(:title,:price,:description)";
        // $stmt = $pdo->prepare($sql);
        
        // $stmt ->bindParam(':title',$title);
        // $stmt ->bindParam(':price',$price);
        // $stmt ->bindParam(':description',$description);
        
        // $stmt->execute();
        
        // $title = "Samsung Kalem 4";
        // $price = 20000;
        // $description = "güzel mazili kedili telefon";
        
        // $stmt->execute();
        
        
        // ----------kayıt güncelleme----------
        
        // $id=1;
        // $title="updated";

        // $sql = "UPDATE products SET title=:title WHERE id=:id";
        // $stmt = $pdo->prepare($sql);
        // $stmt->execute(['id'=>$id,'title'=>$title]);
        
        // echo "güncellendi: ".$stmt->rowCount();
        
        // ----------kayıt silme----------
        
        $id=1;

        $sql = "DELETE FROM products WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id'=>$id]);
        
        echo "silindi: ".$stmt -> rowCount();

?>