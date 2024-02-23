<?php

if (($_FILES['fileToUpload']['error'] != 4) && $_POST['btnFileUpload'] == "Upload") {

    /*
        dosya seçilmiş mi
        dosya boyutu
        dosya ismini kontrol - random
        dosya uzantısı (jpg, png)
    */

    $dest_path = "./uploadedFiles/";
    $filename = $_FILES["fileToUpload"]["name"];
    
    if(empty($filename)){
        echo "dosya seçiniz";
    }    
    
    $fileSourcePath = $_FILES["fileToUpload"]["tmp_name"];

    $fileDestPath = $dest_path . $filename;

    
    if (move_uploaded_file($fileSourcePath, $fileDestPath)) {
        echo "dosya yüklendi";
    } else {
        echo "hata";
    }
} else {
    echo "Dosya seçmediniz";
}
