<?php

include 'classes/db-class.php';
include 'classes/product-class.php';

?>
<?php include 'includes/header.php'; ?>

<?php

$product = new Product();
if ($product->deleteProduct($_GET['id'])) {
    header('Location:index.php');
} else {
    echo "silme hatası";
}


?>

<?php include 'includes/footer.php'; ?>