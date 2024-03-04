<?php

require "libs/variables.php";
require "libs/functions.php";


$id = $_GET['id'];

if (deleteCourseById($id)) {
    $_SESSION['message'] = $id . " numaralı kurs silindi.";
    $_SESSION['type'] = "danger";
    header('location: admin-courses.php');
} else {
    echo "hata";
}


?>