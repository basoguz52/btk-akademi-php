<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// echo "isset(\$_POST[\"btnFileUpload\"] :  --------------> ";
// var_dump(isset($_POST['btnFileUpload']));

if (isset($_POST['btnFileUpload']) && $_POST['btnFileUpload'] == "Upload") {
    /*
        dosya seçilmiş mi
        dosya boyutu
        dosya ismini kontrol - random
        dosya uzantısı (jpg, png)
        
        */
    if ($_FILES['fileToUpload']['error'] == 0) {
        $uploadOk = true;

        $dest_path = "./uploadedFiles/";
        $filename = $_FILES["fileToUpload"]["name"];
        $fileSize = $_FILES["fileToUpload"]["size"];
        $dosyaUzantilari = array('jpg', 'jpeg', 'png');

        $dosyaAdi = explode(".", $filename);
        $dosyaAdi_uzantisiz = $dosyaAdi[0];
        $dosyaAdi_uzantisi = $dosyaAdi[1];

        if ($fileSize > 50000) {
            $uploadOk = false;
            echo "Dosya boyutu fazla";
            echo "<br>";
        }
        if (in_array($dosyaAdi_uzantisi, $dosyaUzantilari)) {


            $fileSourcePath = $_FILES["fileToUpload"]["tmp_name"];
            $fileDestPath = $dest_path . $filename;

            if (!$uploadOk) {
                echo "dosya yüklenmedi";
            } else {
                if (move_uploaded_file($fileSourcePath, $fileDestPath)) {
                    echo "dosya yüklendi";
                } else {
                    echo "dosya yüklemede hata";
                }
            }
        } else {
            $uploadOk = false;
            echo "dosya uzantısı kabul edilmiyor";
            echo "<br>";
            echo "kabul edilen dosyalar: " . implode(",", $dosyaUzantilari);
            echo "<br>";
            echo "<pre>";print_r($dosyaAdi);echo "</pre>";
        }
    } else {
        echo "Lütfen Dosya Seçiniz";
        echo "<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <div style="margin-top:20px;;">
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div style="margin-top:20px;;">
            <input type="file" name="fileToUpload">
            <br>
            <br>
            <input type="submit" value="Upload" name="btnFileUpload">
        </div>
    </form>
</body>

</html>