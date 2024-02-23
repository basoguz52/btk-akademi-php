<?php

require "libs/variables.php";
require "libs/functions.php";

sort($kategoriler);

?>
<?php require "partials/_header.php"; ?>
<?php require "partials/_navbar.php"; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $image = $_POST['image'];
    $dateAdded = $_POST['dateAdded'];
    
    kursEkle($kurslar, $title, $subtitle, $image, $dateAdded);
}
?>



<div class="container my-3">

    <div class="row">

        <div class="col-3">
            <div class="list-group">
                <?php require "partials/_kategoriler.php"; ?>
            </div>

            <div class="col-9">
                <?php require "partials/_kursbaslik.php"; ?>
                <?php require "partials/_kurslar.php"; ?>
            </div>

        </div>

    </div>

    <?php require "partials/_footer.php"; ?>