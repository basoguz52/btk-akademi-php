<?php

function getCategories()
{
    include "ayar.php";

    $query = "SELECT * FROM kategoriler";
    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}

function clearCourseCategories(int $id)
{
    include "ayar.php";

    $query = "DELETE FROM kurs_kategori WHERE kurs_id=$id";
    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}
function getCoursesByFilters($categoryId, $keyword, $page)
{
    include "ayar.php";

    $pageCount = 2;
    $offset = ($page - 1) * $pageCount;
    $query = "";
    if (!empty($categoryId)) {
        $query = "FROM `kurs_kategori` kg INNER JOIN kurslar k ON kg.kurs_id = k.id WHERE kg.kategori_id=$categoryId and onay=1";
    } else {
        $query = "FROM kurslar WHERE onay=1";
    }

    if (!empty($keyword)) {
        $query .= " and baslik LIKE '%$keyword%' or altBaslik LIKE '%$keyword%' or aciklama LIKE '%$keyword%'";
    }


    $total_sql= "SELECT COUNT(*) ".$query;
    $count_data = mysqli_query($baglanti,$total_sql);
    $count = mysqli_fetch_array($count_data)[0];
    $total_pages = ceil($count / $pageCount);

    $sql = "SELECT * ". $query." LIMIT $offset, $pageCount";

    $sonuc = mysqli_query($baglanti, $sql);
    mysqli_close($baglanti);
    return $sonuc;
}

function getCourses(bool $anasayfa, bool $onay)
{
    include "ayar.php";
    $query = "SELECT * FROM kurslar";

    if ($anasayfa) {
        $query .= " WHERE anasayfa=1";
    }
    if ($onay) {
        if (str_contains($query, "WHERE")) {
            $query .= " and onay =1";
        } else {
            $query .= " WHERE onay =1";
        }
    }

    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}
function getCoursesByKeyword($q)
{
    include "ayar.php";

    $query = "SELECT * FROM kurslar WHERE baslik LIKE '%$q%' or altBaslik LIKE '%$q%' or aciklama LIKE '%$q%'";
    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}
function getCategoriesByCourseId(int $courseId)
{
    include "ayar.php";
    $query = "SELECT * FROM `kurs_kategori` kg INNER JOIN kategoriler k ON kg.kategori_id = k.id WHERE kg.kurs_id=$courseId";

    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}
function getCoursesByCategoryId(int $categoryId)
{
    include "ayar.php";
    $query = "SELECT * FROM `kurs_kategori` kg INNER JOIN kurslar k ON kg.kurs_id = k.id WHERE kg.kategori_id=$categoryId and onay=1";

    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}
function editCategory($id, string $category)
{
    include "ayar.php";
    $query = "UPDATE kategoriler SET kategori_adi='$category' WHERE id='$id'";
    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}

function addCourseCategories(int $id, array $categories)
{
    include "ayar.php";
    $query = "";

    foreach ($categories as $catId) {
        $query .= "INSERT INTO kurs_kategori(kurs_id,kategori_id) VALUES($id,$catId);";
    }

    $sonuc = mysqli_multi_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}

function editCourse($id, string $baslik, string $altBaslik, string $aciklama, string $resim, int $onay, int $anasayfa)
{
    include "ayar.php";
    if ($resim != null) {
        $query = "UPDATE kurslar SET baslik='$baslik', altBaslik='$altBaslik', aciklama='$aciklama', resim='$resim', onay='$onay', anasayfa='$anasayfa' WHERE id='$id'";
    } else {
        $query = "UPDATE kurslar SET baslik='$baslik', altBaslik='$altBaslik', aciklama='$aciklama', onay='$onay', anasayfa='$anasayfa' WHERE id='$id'";
    }
    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}

function deleteCourseById(int $id)
{
    include "ayar.php";

    $query = "DELETE FROM kurslar WHERE id='$id'";
    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}

function uploadİmage(array $file)
{
    if (isset($file)) {
        $dest_path = "./img/";
        $filename = $file["name"];
        $fileSourcePath = $file['tmp_name'];
        $fileDestPath = $dest_path . $filename;

        move_uploaded_file($fileSourcePath, $fileDestPath);
    }
}

function deleteCategoryById(int $id)
{
    include "ayar.php";

    $query = "DELETE FROM kategoriler WHERE id='$id'";
    $sonuc = mysqli_query($baglanti, $query);
    mysqli_close($baglanti);
    return $sonuc;
}

function getCourseById(int $id)
{
    include "ayar.php";
    $query = "SELECT * FROM kurslar WHERE id='$id'";
    $sonuc = mysqli_query($baglanti, $query);

    mysqli_close($baglanti);
    return $sonuc;
}

function getCategoryById(int $id)
{
    include "ayar.php";
    $query = "SELECT * FROM kategoriler WHERE id='$id'";
    $sonuc = mysqli_query($baglanti, $query);

    mysqli_close($baglanti);
    return $sonuc;
}

function createCourse(string $baslik, string $altBaslik, string $aciklama, string $resim, int $yorumSayisi = 0, int $begeniSayisi = 0, int $onay = 0)
{
    include "ayar.php";

    // $query = "INSERT INTO kurslar(baslik,altBaslik,resim,yayinTarihi,yorumSayisi,begeniSayisi,onay) VALUES (?,?,?,?,?,?,?)";
    $query = "INSERT INTO kurslar(baslik,altBaslik,aciklama,resim,yorumSayisi,begeniSayisi,onay) VALUES (?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($baglanti, $query);

    mysqli_stmt_bind_param($stmt, 'ssssiii', $baslik, $altBaslik, $aciklama, $resim, $yorumSayisi, $begeniSayisi, $onay);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $stmt;
}

function createCategory(string $kategori)
{
    include "ayar.php";

    $query = "INSERT INTO kategoriler(kategori_adi) VALUES (?)";
    $stmt = mysqli_prepare($baglanti, $query);

    mysqli_stmt_bind_param($stmt, 's', $kategori);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $stmt;
}

function getDb()
{
    $myfile = fopen("db.json", "r");
    $fileSize = filesize("db.json");
    $data = json_decode(fread($myfile, $fileSize), true);
    fclose($myfile);
    return $data;
}



function kursEkle(string $baslik, string $altBaslik, string $resim, string $yayinTarihi, int $yorumSayisi = 0, int $begeniSayisi = 0, bool $onay = true)
{
    $db = getDb();

    array_push($db["kurslar"], array(
        "baslik" => $baslik,
        "altBaslik" => $altBaslik,
        "resim" =>  $resim,
        "yayinTarihi" => $yayinTarihi,
        "yorumSayisi" => $yorumSayisi,
        "begeniSayisi" => $begeniSayisi,
        "onay" => $onay,
    ));

    $myfile = fopen("db.json", "w");
    fwrite($myfile, json_encode($db, JSON_PRETTY_PRINT));
    fclose($myfile);
}


function urlDuzenle($baslik)
{
    return str_replace([" ", "ç", "@", "."], ["-", "c", "", "-"], strtolower($baslik));
}

function kisaAciklama($altBaslik)
{

    if (strlen($altBaslik) > 50) {
        return substr($altBaslik, 0, 50) . "...";
    } else {
        return $altBaslik;
    }
}

function safe_html($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
