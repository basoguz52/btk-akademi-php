<h1 class="text-bg-primary p-3"><?php echo title; ?></h1>
<p class="lead">
    <?php echo count($kategoriler); ?> kategoride <?php echo count(array_filter($kurslar, fn ($kurs) => $kurs['onay']));; ?> kurs listelenmiştir.
</p>