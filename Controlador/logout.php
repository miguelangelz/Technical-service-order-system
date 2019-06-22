<?php
include('../Modelo/Database.php');
session_start();
	session_destroy();
	header('Location: ../index.php');
?>
