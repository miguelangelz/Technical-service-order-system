<?php
session_start();
if (isset($_SESSION['usuario']) || isset($_SESSION['id'])) {
    ?>

    <html lang="es">

     <?php require '../head.php' ?>

            <div id="wrapper">
                <?php require 'headerUser.php' ?>
                
                    <div class="row">
                        <div class="col-lg-12">

                            <h1 class="page-header">Bienvenido <?php echo $_SESSION['usuario']; ?></h1>
                            <center><img class="img-responsive" src="../assets/img/banner.jpg"></center>
                            <?php require'../footer.php' ?>
                       
    </html>
    <?php
} else {
    header("location:../login.php");
}
