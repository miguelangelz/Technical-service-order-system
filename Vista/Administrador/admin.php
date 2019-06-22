<?php
header('Content-Type: text/html; charset=ISO-8859-1');

session_start();
if (isset($_SESSION['admin'])) {
    ?>

    <html lang="es">
            <?php require '../head.php' ?>
            <div id="wrapper">

                <?php require './headerAdmin.php' ?>
                
                    <div class="row">
                        <div class="col-lg-12">

                            <h1 class="page-header">Bienvenido <?php echo $_SESSION['admin']; ?></h1>
                        
                    <div class="row">
                        <img src="../assets/img/banner.jpg" class="img-responsive">
                    <?php require '../footer.php' ?>
    </html>
    <?php
} else {
    header("location:../login.php");
}
