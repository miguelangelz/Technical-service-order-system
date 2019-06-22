<?php

session_start();
require '../Modelo/Database.php';
$connect = new Database;

if (isset($_POST['login'])) {
    $errMsg = '';

    // Get data from FORM
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if ($usuario == '') {
        $errMsg = 'Ingrese Usuario';
    }
    if ($password == '') {
        $errMsg = 'Ingrese Password';
    }
    if ($usuario == '' && $password == '') {
        $errMsg = 'Ingrese Usuario y contraseña';
    }
    if ($errMsg == '') {
        try {
            $stmt = $connect->prepare('SELECT * FROM users WHERE usu_usuario = :usuario AND usu_password = :password');
            $stmt->execute(array(
                ':usuario' => $usuario,
                ':password' => $password
            ));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data['usu_usuario'] == false && $data['usu_password'] == false) {
                $errMsg = "Usuario y contraseña incorrecta.";
            } if($data['usu_usuario'] == false){
                $errMsg = "usuario .$data. no encontrado";
            } if($data['usu_password'] == false){
                $errMsg = "Contraseña incorrecta.";
            } else {
                if ($password == $data['usu_password'] && $data['usu_tipo'] == "Administrador") {
                    $_SESSION['admin'] = $data['usu_nombre'];
                    $_SESSION['password'] = $data['usu_password'];
                    $_SESSION['id'] = $data['usu_id'];

                    header("Location:../Vista/Administrador/admin.php");
                    exit;
                } else if ($password == $data['usu_password'] && $data['usu_tipo'] == "Técnico") {
                    $_SESSION['usuario'] = $data['usu_nombre'];
                    $_SESSION['direccion'] = $data['usu_direccion'];
                    $_SESSION['id'] = $data['usu_id'];

                    header("Location:../Vista/Tecnico/main.php");
                    exit;
                } else
                    header("Location:login.php");
            }
        } catch (PDOException $e) {
            $errMsg = $e->getMessage();
        }
    }
}
?>