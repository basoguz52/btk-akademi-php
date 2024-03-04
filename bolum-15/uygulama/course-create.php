<?php include "libs/functions.php"; ?>
<?php include "libs/variables.php"; ?>

<?php require "partials/_header.php"; ?>
<?php require "partials/_navbar.php"; ?>


<?php
$baslik = $altBaslik = $resim = $aciklama =  "";

$baslikErr = $altBaslikErr = $resimErr  = $aciklamaErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['baslik'])) {
        $baslikErr = "baslik gerekli.";
    } else {
        $baslik = safe_html($_POST['baslik']);
    }
    if (empty($_POST['altBaslik'])) {
        $altBaslikErr = "altBaslik gerekli.";
    } else {
        $altBaslik = safe_html($_POST['altBaslik']);
    }
    if (empty($_POST['aciklama'])) {
        $aciklamakErr = "aciklama gerekli.";
    } else {
        $aciklama = safe_html($_POST['aciklama']);
    }
    if (empty($_FILES['imageFile']['name'])) {
        $resimErr = "resim gerekli.";
    } else {
        uploadİmage($_FILES['imageFile']);
        $resim = $_FILES['imageFile']['name'];
    }

    if (empty($baslikErr) && empty($altBaslikErr) && empty($resimErr) && empty($aciklamaErr)) {
        createCourse($baslik, $altBaslik, $aciklama, $resim);
        $_SESSION['message'] = $baslik . " isimli kurs eklendi";
        $_SESSION['type'] = "success";
        header("Location: admin-courses.php");
    } else {
        echo "hata";
    }

    // echo "<pre>";
    // print_r($hobbies);
    // echo "</pre>";
    // echo $username;
}

?>

<div class="container my-3">

    <div class="row">

        <div class="col-12">
            <div class="card card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>Başlık</label>
                        <input type="text" name="baslik" class="form-control" value="<?php echo $baslik; ?>">
                        <div class="text-danger"><?php echo $baslikErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label>Alt Başlık</label>
                        <textarea name="altBaslik" class="form-control"><?php echo $altBaslik; ?></textarea>
                        <div class="text-danger"><?php echo $altBaslikErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label>Açıklama</label>
                        <textarea name="aciklama" class="form-control"><?php echo $aciklama; ?></textarea>
                        <div class="text-danger"><?php echo $aciklamaErr; ?></div>
                    </div>
                    <div class="input-group">
                        <label for="imageFile" class="input-group-text"></label>
                        <input type="file" name="imageFile" id="imageFile" class="form-control">
                    </div>
                    <div class="mb-3 text-danger"><?php echo $resimErr; ?></div>

                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>
            </div>
        </div>

    </div>

    <?php require "partials/_editor.php"; ?>
    <?php require "partials/_footer.php"; ?>