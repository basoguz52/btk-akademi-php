<h1 class="bg-primary text-white rounded-4 p-2 ps-3">Yazılım</h1>

<!-- <a href="#" class="list-group-item list-group-item-action active disabled">Yazılım</a> -->

<?php foreach (getDb()['kategoriler'] as $kategori) : ?>
    <a href="#" class="list-group-item list-group-item-action <?php echo ($kategori["aktif"] ? "active" : null) ?>">
        <?php echo $kategori["kategori_adi"]; ?>
    </a>
<?php endforeach; ?>
</div>