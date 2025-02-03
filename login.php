<?php
session_start();
require 'header.php';
require_once 'functions.php';

// $errors = isErrors();
?>

<div class="container h-100 w-50">
    <h3>Bejelentkezés</h3>
</div>


<!-- Bootsrap login form -->
<div class="container w-50">
  <!-- Ha sikeres volt a regisztráció -->
<?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php
                echo htmlspecialchars($_SESSION['success']);
    unset($_SESSION['success']); // Üzenet eltávolítása a megjelenítés után
    ?>
            </div>
        <?php endif; ?>
  <!-- Hibák megjelenítése, ha vannak -->
  <?php showErrors(); ?>
    <form action="loginProcess.php" method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" >
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Jelszó</label>
        <input type="password" class="form-control" name="password" id="password" >
      </div>
      <button type="submit" class="btn btn-primary">Bejelentkezés</button>
    </form>
</div>

<?php
require 'footer.php';
?>
