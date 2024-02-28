<?php

session_start();

// unset($_SESSION['username']);
// session_unset();
if (isset($_SESSION['username'])) {

    echo $_SESSION['username'];
} else {
    echo "username yok";
    echo "<br>";
}

echo $_SESSION['password'];
