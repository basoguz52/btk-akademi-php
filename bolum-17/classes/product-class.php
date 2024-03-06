<?php

class Product extends DB
{

    public function getProducts()
    {
        $sql = "SELECT * FROM products";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getProductById(int $productId)
    {
        $sql = "SELECT * FROM products WHERE id=:id";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $productId]);
        return $stmt->fetch();
    }

    function createProduct(string $title, $description, $price)
    {
        $sql = "INSERT INTO products(title,description,price) VALUES (:title,:description,:price)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([

            'title' => $title,
            'description' => $description,
            'price' => $price,
        ]);
    }

    function editProduct($id, string $title, $description, $price)
    {
        $sql = "UPDATE products SET title=:title,description=:description,price=:price WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        try {
            return $stmt->execute([
                'id' => $id,
                'title' => $title,
                'description' => $description,
                'price' => $price,
            ]);
        } catch (PDOException $e) {
            return $e;
        }
    }

    function deleteProduct($productId)
    {
        $sql = "DELETE FROM products WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([
            'id' => $productId
        ]);
    }
}
