<?php
session_start();
require 'header.php';
?>

    <div class="container mt-5">
        
    <?php showErrors(); ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Regisztráció</h3>
                    </div>
                    <div class="card-body">
                        <form action="registerProcess.php" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Név</label>
                                <input type="text" class="form-control" id="name" name="name" >
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email cím</label>
                                <input type="email" class="form-control" id="email" name="email" >
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Jelszó</label>
                                <input type="password" class="form-control" id="password" name="password" >
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Jelszó megerősítése</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" >
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Regisztráció</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <?php require 'footer.php'; ?>
