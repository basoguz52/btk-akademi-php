
<?php include "libs/functions.php"; ?>
<?php include "libs/variables.php"; ?>

<?php require "partials/_header.php"; ?>
<?php require "partials/_navbar.php"; ?>


<?php
session_start();
$categoryErr = $category = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['category'])) {
        $categoryErr = "category gerekli.";
    } else {
        $category = safe_html($_POST['category']);
    }

    if(empty($categoryErr)){
        createCategory($category);
        $_SESSION['message']=$category." isimli kategori eklendi";
        $_SESSION['type']="success";
        header("Location: admin-categories.php");
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
            <div class="card card-body">

                <form method="post">
                    <div class="mb-3">
                        <label>Kategori Adı</label>
                        <input type="text" name="category" class="form-control" value="<?php echo $category; ?>">
                        <div class="text-danger"><?php echo $categoryErr; ?></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>
            </div>
        </div>

    </div>

    <?php require "partials/_footer.php"; ?>