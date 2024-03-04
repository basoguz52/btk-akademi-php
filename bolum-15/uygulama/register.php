<?php include "libs/ayar.php"; ?>
<?php include "libs/functions.php"; ?>
<?php include "libs/variables.php"; ?>

<?php require "partials/_header.php"; ?>
<?php require "partials/_navbar.php"; ?>


<?php

$usernameErr = $emailErr = $passwordErr = $repasswordErr = "";
$username = $email = $password = $repassword =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['username'])) {
        $usernameErr = "username gerekli.";
    } elseif (strlen($_POST['username']) < 5 or strlen($_POST['username'] < 30)) {
        $usernameErr = "username 5-30 karakter aralığında olmalıdır.";
    }
    elseif (!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $_POST['username'])) {
        $usernameErr = "username sadece rakam, harf ve alt çizgi karakterlerinden olmalıdır.";
    }
    else {
        $sql = "SELECT id FROM kullanicilar WHERE username=?";

        if ($statement = mysqli_prepare($baglanti,$sql)) {
            $param_username = trim($_POST['username']);
            mysqli_stmt_bind_param($statement,'s',$param_username);

            if (mysqli_stmt_execute($statement)) {
                mysqli_stmt_store_result($statement);
                if (mysqli_stmt_num_rows($statement) == 1) {
                    $usernameErr = "kullanıcı adı alınmış";
                }
                else {
                    $username = safe_html($_POST['username']);
                }
            } else {
                echo mysqli_error($baglanti);
                echo "hata oluştu";
            }
        }   
    }
    if (empty($_POST['email'])) {
        $emailErr = "email gerekli.";
    }
    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "email hatalıdır.";
    }
    else {

        $sql = "SELECT id FROM kullanicilar WHERE email=?";

        if ($statement = mysqli_prepare($baglanti,$sql)) {
            $param_email = trim($_POST['email']);
            mysqli_stmt_bind_param($statement,'s',$param_email);

            if (mysqli_stmt_execute($statement)) {
                mysqli_stmt_store_result($statement);
                if (mysqli_stmt_num_rows($statement) == 1) {
                    $emailErr = "email alınmış";
                }
                else {
                    $email = safe_html($_POST['email']);
                }
            } else {
                echo mysqli_error($baglanti);
                $email = safe_html($_POST['email']);
            }
        }   
    }
    if (empty($_POST['password'])) {
        $passwordErr = "password gerekli.";
    } else {
        $password = safe_html($_POST['password']);
    }
    if ($_POST['repassword'] != $_POST['password']) {
        $repasswordErr = "parolalar eşleşmiyor.";
    } else {
        $password = safe_html($_POST['repassword']);
    }

    if (empty($usernameErr) && empty($emailErr) && empty($passwordErr) && empty($repasswordErr)) {

        $sql = "INSERT INTO kullanicilar(username,email,password) VALUES(?,?,?)";
        if ($statement = mysqli_prepare($baglanti, $sql)) {
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password,PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($statement, "sss", $param_username,$param_email,$param_password);
            if(mysqli_stmt_execute($statement)){
                header("Location: login.php");
            }else {
                echo mysqli_error($baglanti);
                echo "<br>";
                echo "hata oluştu";
            }
        }
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
            <form action="register.php" method="post" novalidate>
                <div class="mb-3">
                    <label>Kullanıcı Adı</label>
                    <input ype="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <div class="text-danger"><?php echo $usernameErr; ?></div>
                </div>
                <div class="mb-3">
                    <label>E-Posta</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                    <div class="text-danger"><?php echo $emailErr; ?></div>
                </div>
                <div class="mb-3">
                    <label>Parola</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                    <div class="text-danger"><?php echo $passwordErr; ?></div>
                </div>
                <div class="mb-3">
                    <label>Parola Tekrar</label>
                    <input type="password" name="repassword" class="form-control">
                    <div class="text-danger"><?php echo $repasswordErr; ?></div>
                </div>

                <button type="submit" class="btn btn-primary">Kayıt Ol</button>
            </form>
        </div>

    </div>

    <?php require "partials/_footer.php"; ?>