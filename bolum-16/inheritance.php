<?php

    class Kisi {
        public $ad;
        public $soyad;
    
        function konus() {
            echo "{$this->ad} {$this->soyad} konuşuyor...";
            echo "<br>";
        }
    }
    
    $kisi = new Kisi();
    $kisi -> ad = "Ali";
    $kisi -> soyad = "Turan";
    $kisi -> konus();
    
    class Ogrenci extends Kisi {
        public $numara;
        
        function dersCalis() {
            echo "{$this->ad} {$this->soyad} ders çalışıyor...";
            echo "<br>";        
        }
    }
    
    $ogrenci = new Ogrenci();
    $ogrenci -> ad = "Ahmet";
    $ogrenci -> soyad = "Turan";
    $ogrenci -> konus();
    $ogrenci -> dersCalis();
    
    class Ogretmen extends Kisi {
        protected function dersAnlat() {
            echo "{$this->ad} {$this->soyad} ders anlatıyor...";
            echo "<br>";
        }
    }
    
    $ogretmen = new Ogretmen();
    $ogretmen -> ad = "Emel";
    $ogretmen -> soyad = "Turan";
    $ogretmen -> konus();
    // $ogretmen -> dersAnlat();
    
    class Mudur extends Ogretmen {
        function idareEder() {
            $this -> dersAnlat();
            echo "{$this->ad} {$this->soyad} okulu idare ediyor...";
            echo "<br>";
        }        
    }

    $mudur = new Mudur();
    $mudur -> ad = "Çınar";
    $mudur -> soyad = "Turan";
    $mudur -> idareEder();