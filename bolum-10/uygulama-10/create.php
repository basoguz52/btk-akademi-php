<?php
require "libs/variables.php";
require "libs/functions.php";
?>

<?php require "partials/_header.php"; ?>
<?php require "partials/_navbar.php"; ?>

<div class="container my-3">

    <div class="row">

        <div class="col-12">
            <form action="index.php" method="POST">
                <div class="mb-3">
                    <label for="title">Başlık</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="subtitle">Alt Başlık</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="image">Resim</label>
                    <input type="text" name="image" id="image" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="dateAdded">Eklenme Tarihi</label>
                    <input type="text" name="dateAdded" id="dateAdded" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Kursu Kaydet</button>
            </form>
        </div>

    </div>

    <?php require "partials/_footer.php"; ?>