<?php

    class Product{
        
        public $name;
        public $price;

        function __construct($name, $price) {
            $this->name = $name;
            if ($price<0) {
                $this->price = 0;
            }else{
                $this->price = $price;
            }
        }
        
        function __destruct()
        {
            echo "<br>nesne silindi";
        }


        function set_name($name) {
            $this->name = $name;
        }
        
        function get_name() {
            return $this->name;
        }
        
        function set_price($price) {
            if ($price<0) {
                $this->price = 0;
            }else{
                $this->price = $price;
            }
        }
        
        function get_price() {
            return $this->price;
        }

        function display() {
            return "Ürün: ".$this->name." Fiyat: ".$this->name;
        }

    }

    $p1 = new Product("İphone 14",50);
    
    echo $p1->get_name()." ".$p1->get_price();
    
    $p1 -> set_price(70);
    $p1->set_name("Samsung S21");

    echo "<br>";echo "<br>";

    echo $p1->display();