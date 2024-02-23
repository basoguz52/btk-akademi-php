<?php

require "libs/variables.php";
require "libs/functions.php";

sort($kategoriler);

session_start();

if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-warning mb-0 text-center'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
    
}
echo $_SERVER["REQUEST_METHOD"];

?>


<?php require "partials/_header.php"; ?>
<?php require "partials/_navbar.php"; ?>

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