<?php

require "libs/variables.php";
require "libs/functions.php";

session_start();

$id = $_GET['id'];

if (deleteCategoryById($id)) {
    $_SESSION['message'] = $id . " numaralı kategori silindi.";
    $_SESSION['type'] = "danger";
    header('location: admin-categories.php');
} else {
    echo "hata";
}


?>