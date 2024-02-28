<h1 class="bg-primary text-white rounded-4 p-2 ps-3">Yazılım</h1>

<a href="courses.php" class="list-group-item list-group-item-action <?php echo (($_SERVER['REQUEST_URI'][19]=="c") && !isset($_GET['categoryid'])) ? 'active': null ?>">Tüm Kurslar</a>
<?php
$sonuc = getCategories();
while ($kategori = mysqli_fetch_assoc($sonuc)) : ?>
    <a href="<?php echo "courses.php?categoryid=" . $kategori['id']; ?>" class="list-group-item list-group-item-action
    <?php echo (isset($_GET['categoryid']) and ($_GET['categoryid'] == $kategori['id'])) ? 'active' : null; ?>">
        <?php echo $kategori["kategori_adi"]; ?>
    </a>
<?php endwhile; ?>
</div>