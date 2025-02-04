
<nav class="navbar navbar-expand-lg kutyus  bg-light">
    <div class="container ">
        <a class="navbar-brand" href="/php-modul-zaro/index.php">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item ">
                    <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/php-modul-zaro/index.php') ? 'active' : ''; ?>" href="/php-modul-zaro/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <?php if (isLoggedIn()): ?>
                        <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/php-modul-zaro/my-posts.php') ? 'active' : ''; ?>" href="/php-modul-zaro/my-posts.php"><?php echo $_SESSION['is_admin'] ? 'Minden poszt' : 'Posztjaim'; ?></a>
                        <?php endif ?>
                </li>
                <li>
                    <?php if(!isLoggedIn()): ?>
                        <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/php-modul-zaro/login.php') ? 'active' : ''; ?>" href="/php-modul-zaro/login.php">Login</a>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if(!isLoggedIn()): ?>
                        <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/php-modul-zaro/registration.php') ? 'active' : ''; ?>" href="/php-modul-zaro/registration.php">Regisztráció</a>
                    <?php endif; ?>
                </li>
                
                <li class="nav-item">
                    <?php if (isLoggedIn()): ?>
                        <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/php-modul-zaro/create-post.php') ? 'active' : ''; ?>" href="/php-modul-zaro/create-post.php">Post létrehozása</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <?php if (isLoggedIn()): ?>
                        <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/php-modul-zaro/logout.php') ? 'active' : ''; ?>" href="/php-modul-zaro/logout.php">Logout</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>   
     </div>
</nav>