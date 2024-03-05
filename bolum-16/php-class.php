<?php

    #class => Person, Product
        #property

    #instance , nesne

    class Ogrenci{
        var $num;
        var $name;
        var $class;

        function show(){
            echo $this->name." ".$this->num." ".$this->class."<br>";
        }

    }

    $ogr1 = new Ogrenci();
    $ogr2 = new Ogrenci();

    $ogr1->num = 109;
    $ogr1->name = "Oğuzhan";
    $ogr1->class = "1-B";
    
    $ogr2->num = 1054;
    $ogr2->name = "Oğuzhan";
    $ogr2->class = "12-C";

    $ogr1->show();
    $ogr2->show();
    

