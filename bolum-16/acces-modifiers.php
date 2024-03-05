<?php

    class Product{
        
        private float $tax = 1.18;
        private string $name;
        private string $price;

        function __construct($name, $price) {
            $this->name = $name;
            if ($price<0) {
                $this->price = 0;
            }else{
                $this->price = $price;
            }
        }

        function get_name() {
            return $this->name;
        }

        function get_price() {
            return $this->price * $this->tax;
        }

        function display() {
            return "Ürün: ".$this->name." Fiyat: ".$this->get_price();
        }

    }

    $p1 = new Product("İphone 14",50);
    $p2 = new Product("Samsung S21",30);
        
    echo $p1->display();
    echo "<br>";
    echo $p2->display();