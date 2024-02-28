<?php

require "libs/variables.php";
require "libs/functions.php";

    $kurslar = getCourses(true,true);

?>


<?php require "partials/_header.php"; ?>
<?php require "partials/_navbar.php"; ?>

<div class="container my-3">

    <div class="row">

        <div class="col-3">
            <div class="list-group">
                <?php require "partials/_kategoriler.php"; ?>
            </div>

            <div class="col-9">
                <?php require "partials/_kursbaslik.php"; ?>
                <?php if (mysqli_num_rows($kurslar) > 0) : ?>

                    <?php foreach ($kurslar as $kurs) : ?>

                        <?php if ($kurs["onay"]) : ?>

                            <div class="card mb-3">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="img/<?php echo $kurs["resim"]; ?>" alt="" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="course-details.php?id=<?php echo ($kurs["id"]); ?>">
                                                    <?php echo $kurs["baslik"] ?>
                                                </a>
                                            </h5>
                                            <p class="card-text">
                                                <?php echo kisaAciklama($kurs["altBaslik"]) ?>
                                            </p>
                                            <p>
                                                <?php if (($kurs["begeniSayisi"]) > 0) : ?>
                                                    <span class="badge rounded-pill text-bg-primary">
                                                        <?php echo $kurs["begeniSayisi"] ?> Beğeni
                                                    </span>
                                                <?php endif ?>
                                                <?php if (($kurs["yorumSayisi"]) > 0) : ?>
                                                    <span class="badge rounded-pill text-bg-danger">
                                                        Yorum:
                                                        <?php echo $kurs["yorumSayisi"] ?>
                                                    </span>
                                                <?php else : ?>
                                                    <span class="badge rounded-pill text-bg-warning">
                                                        İlk Yorumu Sen Yap!
                                                    </span>
                                                <?php endif ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endif ?>

                    <?php endforeach ?>

                <?php else : ?>

                    <div class="alert alert-warning">
                        Kurs Bulunamadı
                    </div>
                <?php endif ?>
            </div>

        </div>

    </div>

    <?php require "partials/_footer.php"; ?>