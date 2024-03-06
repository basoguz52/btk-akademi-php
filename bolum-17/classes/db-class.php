<?php

class DB
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db_name = "commerce";

    protected function connect()
    {
        try {
            $dsn = "mysql:host=" . $this->host . ";" . "dbname=" . $this->db_name;
            $pdo = new PDO($dsn, $this->user, $this->password);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            echo "bağlantı başarılı..." . "<br>";
            return $pdo;
        } catch (PDOException $e) {
            echo "bağlantı hatası: " . $e->getMessage();
        }
    }
}

$db = new DB();
