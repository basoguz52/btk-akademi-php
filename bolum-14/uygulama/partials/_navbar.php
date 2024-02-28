<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container">
        <a href="index.php" class="navbar-brand">Course App</a>

        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a href="index.php" class="nav-link active">Anasayfa</a>
            </li>
            <li class="nav-item">
                <a href="admin-categories.php" class="nav-link">Admin Categories</a>
            </li>
            <li class="nav-item">
                <a href="admin-courses.php" class="nav-link">Admin Courses</a>
            </li>
        </ul>
        <ul class="navbar-nav me-2">

            <?php if (isset($_COOKIE['auth'])) : ?>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">Çıkış</a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link active">Hoşgeldiniz, <?php echo $_COOKIE['auth']['name'] ?></a>
                </li>
            <?php else :  ?>
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Giriş</a>
                </li>
                <li class="nav-item">
                    <a href="register.php" class="nav-link">Üye Ol</a>
                </li>
            <?php endif;  ?>
        </ul>
        <form action="courses.php" class="d-flex">
            <input type="text" name="q" class="form-control me-2" placeholder="Keyword">
            <button type="submit" class="btn btn-warning">Arama</button>
        </form>
    </div>
</nav>