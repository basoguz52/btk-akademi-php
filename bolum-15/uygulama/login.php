<?php

require "libs/variables.php";
require "libs/functions.php";
require "libs/ayar.php";


if(isLoggedIn()){
    header("Location: index.php");
}

$username = $password =  "";
$usernameErr  = $passwordErr = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($_POST['username'])) {
        $usernameErr = "username gerekli.";
    } else {
        $username = safe_html($_POST['username']);
    }
    if (empty($_POST['password'])) {
        $passwordErr = "password gerekli.";
    } else {
        $password = safe_html($_POST['password']);
    }

    if (empty($usernameErr) && empty($passwordErr)) {
        $sql = "SELECT id,username,password,role FROM kullanicilar WHERE username=?";

        if ($statement = mysqli_prepare($baglanti, $sql)) {
            mysqli_stmt_bind_param($statement, 's', $username);

            if (mysqli_stmt_execute($statement)) {
                mysqli_stmt_store_result($statement);

                if (mysqli_stmt_num_rows($statement) == 1) {
                    //parola kontrol
                    mysqli_stmt_bind_result($statement, $id, $username, $hashed_password, $role);
                    if (mysqli_stmt_fetch($statement)) {
                        if (password_verify($password, $hashed_password)) {
                            $_SESSION['loggedIn'] = true;
                            $_SESSION['id'] = $id;
                            $_SESSION['username'] = $username;
                            $_SESSION['role'] = $role;
                            header("Location: index.php");
                        } else {
                            $loginErr = "parola yanlış";
                        }
                    }
                } else {
                    $loginErr = "username yanlış";
                }
            } else {
                $loginErr = "Bir hata oluştu";
            }
        }
        mysqli_stmt_close($statement);
        mysqli_close($baglanti);
    }
}
?>

<?php 
    if (!empty($loginErr)) {
        echo "<div class='alert alert-danger'>".$loginErr."</div>";
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
                    <input ype="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <div class="text-danger"><?php echo $usernameErr; ?></div>
                </div>
                <div class="mb-3">
                    <label>Parola</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                    <div class="text-danger"><?php echo $passwordErr; ?></div>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Giriş</button>
            </form>
        </div>

    </div>

    <?php require "partials/_footer.php"; ?>