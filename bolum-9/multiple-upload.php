<?php
if (isset($_POST['btnFileUpload']) && $_POST['btnFileUpload'] == 'Upload') {

    $dosyaAdet = count($_FILES['fileToUpload']['name']);

    $maxFileSize = (1024 * 1024) * 1;
    $fileTypes = array("image/jpg","png","image/png", "image/jpeg");
    $uploadOk = true;

    if ($dosyaAdet > 2) {
        $uploadOk = false;
        echo "Max. 2 dosya yükleyebilirsiniz.";
    }
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    if ($uploadOk) {
        for ($i = 0; $i < $dosyaAdet; $i++) {

            $fileTmpPath = $_FILES['fileToUpload']['tmp_name'][$i];
            $fileName = $_FILES['fileToUpload']['name'][$i];
            $fileSize = $_FILES['fileToUpload']['size'][$i];
            $fileType = $_FILES['fileToUpload']['type'][$i];

            
            if ($fileSize > $maxFileSize) {
                echo "max dosya boyutu 1 mb olmalıdır.";
            } else {
                
                $dosyaAdi_Arr = explode(".", $fileName);
                $dosyaAdi_uzantisiz = $dosyaAdi_Arr[0];
                $dosyaAdi_uzantisi = $dosyaAdi_Arr[1];
                
                $yeniDosyaAdi = $fileName."-".rand(0,99999999).".".$dosyaAdi_uzantisi;
                $dest_path = "images/" . $yeniDosyaAdi;
                
                if (in_array($fileType, $fileTypes)) {

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        echo $yeniDosyaAdi . " dosyası yüklendi" . "<br>";
                    } else {
                        echo $yeniDosyaAdi . " dosyası yükleme hatası" . "<br>";
                    }
                } else {
                    echo "dosya uzantısı kabul edilmiyor." . "<br>";
                    echo "kabul edilen dosya tipleri: " . implode(".", $fileTypes) . "<br>";
                }
            }
        }
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
        <div style="margin-top:20px;">
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div style="margin-top:20px;;">
            <input type="file" name="fileToUpload[]" multiple="multiple">
            <br>
            <br>
            <input type="submit" value="Upload" name="btnFileUpload">
        </div>
    </form>
</body>

</html>