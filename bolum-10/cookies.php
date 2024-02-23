<?php

echo "<pre>";print_r($_COOKIE);echo "</pre>";
setcookie("username", "sadikturan", time() + (60 * 60 * 24));

setcookie("auth", "true", time() + (60 * 60 * 24));



if (isset($_COOKIE['username'])) {
    
    // echo $_COOKIE['username'];echo "<br>";echo $_COOKIE['auth'];

    echo "<pre>";print_r($_COOKIE);echo "</pre>";

} else {
    echo "cookie yok";
}

// güncelleme

setcookie("username", "admin", time() + (60 * 60 * 24));

// silme

// setcookie("username", "admin", time() - (60 * 60));

?>
