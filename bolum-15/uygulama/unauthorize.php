<?php

require "libs/variables.php";
require "libs/functions.php";

?>
<?php

    if (!isLoggedIn()) {
        header("Location: login.php");
    }

?>

<?php require "partials/_header.php"; ?>
<?php require "partials/_navbar.php"; ?>

<div class="container my-3">

    <div class="row">
        <div class="col-12">
            <h3>Merhaba <?php echo $_SESSION['username']; ?> </h3>
            <p>Yetkisiz alana ulaşmaktasınız</p>
            <div>
                <a href="logout.php">Çıkış Yap</a>
            </div>
        </div>
    </div>

    <?php require "partials/_footer.php"; ?>