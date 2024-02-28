<?php

require "libs/variables.php";
require "libs/functions.php";

session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username == db_user['username'] && $password == db_user['password']) {
        setcookie("auth[username]", db_user['username'], time() + (60 * 60 * 24));
        setcookie("auth[name]", db_user['name'], time() + (60 * 60 * 24));
        $_SESSION['message'] = $username." ile hesaba giriş yapıldı.";
        header("Location: index.php");
    }else{
        echo "<div class='alert alert-danger mb-0 text-center'>Yanlış kullanıcı adı veya şifre</div>";
    }
}
?>


<?php require "partials/_header.php"; ?>
<?php require "partials/_navbar.php"; ?>

<div class="container my-3">

    <div class="row">

        <div class="col-12">
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label>Kullanıcı Adı</label>
                    <input ype="text" name="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Parola</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" name="login">Giriş</button>
            </form>
        </div>

    </div>

    <?php require "partials/_footer.php"; ?>