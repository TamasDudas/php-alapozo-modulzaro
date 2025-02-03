<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="/posts/index.php">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/php-modul-zaro/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <?php if (isLoggedIn()): ?>
                        <a class="nav-link" href="/php-modul-zaro/my-posts.php"><?php echo $_SESSION['is_admin'] ? 'Minden poszt' : 'Posztjaim'; ?></a>
                        <?php endif ?>
                </li>
                <li>
                    <?php if(!isLoggedIn()): ?>
                        <a class="nav-link" href="/php-modul-zaro/login.php">Login</a>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if(!isLoggedIn()): ?>
                        <a class="nav-link" href="/php-modul-zaro/registration.php">Regisztráció</a>
                    <?php endif; ?>
                </li>
                
                <li class="nav-item">
                    <?php if (isLoggedIn()): ?>
                        <a class="nav-link" href="/php-modul-zaro/create-post.php">Post létrehozása</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <?php if (isLoggedIn()): ?>
                        <a class="nav-link" href="/php-modul-zaro/logout.php">Logout</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>   
     </div>
</nav>