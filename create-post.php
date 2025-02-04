<?php
session_start();
require 'header.php';

if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$titleValue = isset($_SESSION['form_data']['title']) ? htmlspecialchars($_SESSION['form_data']['title']) : '';
$bodyValue = isset($_SESSION['form_data']['body']) ? htmlspecialchars($_SESSION['form_data']['body']) : '';
?>   
  <div class="container h-100">
      
      <!-- Poszt létrehozása form -->
       <div class="row justify-content-center">
          <div class="col-12 col-md-6">
            
      <!--Hibák megjelenítése-->
      <?php showErrors(); ?>
      
              <form action="create-post-process.php" method="post">
                  <div class="mb-3">
                      <label for="title" class="form-label">Title</label>
                      <input type="text" class="form-control" id="title" name="title" value="<?php echo $titleValue; ?>">
                  </div>
                  <div class="mb-3">
                      <label for="body" class="form-label">Body</label>
                      <textarea class="form-control" id="body" name="body" rows="5"><?php echo $bodyValue; ?></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Poszt létrehozása</button>
              </form>
          </div>
      </div>
  </div>
<?php require 'footer.php'; ?>
