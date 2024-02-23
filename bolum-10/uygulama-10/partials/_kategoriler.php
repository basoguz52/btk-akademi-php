<h1 class="bg-primary text-white rounded-4 p-2 ps-3">Yazılım</h1>
<!-- <a href="#" class="list-group-item list-group-item-action active disabled">Yazılım</a> -->
<?php for ($i = 0; $i < count($kategoriler); $i++) : ?>
    <a href="#" class="list-group-item list-group-item-action <?php echo ($kategoriler[$i]["aktif"] ? "active" : null) ?>">
        <?php echo $kategoriler[$i]["ad"]; ?>
    </a>
<?php endfor ?>
</div>