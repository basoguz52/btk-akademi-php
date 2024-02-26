<?php include "libs/functions.php"; ?>
<?php include "libs/variables.php"; ?>

<?php require "partials/_header.php"; ?>
<?php require "partials/_navbar.php"; ?>


<?php
session_start();

$id = $_GET['id'];
$sonuc = getCourseById($id);
$selectedCourse = mysqli_fetch_assoc($sonuc);


$baslik = $altBaslik = $resim = $onay =  "";
$baslikErr = $altBaslikErr = $resimErr = $onayErr  = "";

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
    if (isset($_FILES['imageFile']['name'])) {
        uploadİmage($_FILES['imageFile']);
        $resim = $_FILES['imageFile']['name'];
    }

    $onay = isset($_POST['onay']) ? 1 : 0;


    $categories = [];
    if (isset($_POST['categories'])) {
        $categories = $_POST['categories'];
    }

    // print_r($categories);
    if (empty($baslikErr) && empty($altBaslikErr)) {

        if ($sayi = editCourse($id, $baslik, $altBaslik, $resim, $onay)) {
            clearCourseCaregories($id);
            if (count($categories)) {
                addCourseCategories($id, $categories);
            }
            $_SESSION['message'] = $baslik . " isimli kurs güncellendi";
            $_SESSION['type'] = "success";
            header("Location: admin-courses.php");
        }
    }
}

?>

<div class="container my-3">

    <div class="card card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-9">
                    <div class="mb-3">
                        <label>Başlık</label>
                        <input type="text" name="baslik" class="form-control" value="<?php echo $selectedCourse['baslik']; ?>">
                    </div>
                    <div class="mb-3">
                        <label>Alt Başlık</label>
                        <textarea name="altBaslik" class="form-control"><?php echo $selectedCourse['altBaslik']; ?></textarea>
                    </div>
                    <div class="input-group align-items-center mb-3">
                        <img src="img/<?php echo $selectedCourse['resim']; ?>" style="width: 200px;">
                        <input class="form-control" type="file" name="imageFile">
                    </div>

                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
                <div class="col-3">
                    <img src="img/<?php echo $selectedCourse['resim']; ?>" class="img-fluid">
                    <hr>
                    <?php foreach (getCategories() as $c) : ?>
                        <div class="form-check">
                            <label for="category_<?php echo $c['id']; ?>"><?php echo $c['kategori_adi'] ?></label>
                            <input type="checkbox" name="categories[]" value="<?php echo $c['id']; ?>" class="form-check-input" id="category_<?php echo $c['id']; ?>" <?php
                                                                                                                                                                        $selectedCategories = getCategoriesByCourseId($id);
                                                                                                                                                                        foreach ($selectedCategories as $selectedCategory) {
                                                                                                                                                                            if ($selectedCategory['id'] == $c['id']) {
                                                                                                                                                                                echo "checked";
                                                                                                                                                                                // echo "<pre>";
                                                                                                                                                                                // print_r($selectedCategory);
                                                                                                                                                                                // echo "</pre>";
                                                                                                                                                                            }
                                                                                                                                                                        }
                                                                                                                                                                        ?>>
                        </div>
                    <?php endforeach; ?>
                    <hr>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="onay" id="onay" <?php echo $selectedCourse["onay"] ? 'checked' : '' ?>>
                        <label class="form-check-label" for="onay">
                            Onay
                        </label>
                    </div>
                </div>
        </form>

    </div>

</div>

<?php require "partials/_footer.php"; ?>