<?php
include_once "../db/connection.php";

if (isset($_POST)) {
    if (isset($_SESSION['error_login'])) {
        $_SESSION['error_login'] = null;
    }

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM `usuarios` WHERE `email` = '$email'";
    $user = mysqli_fetch_assoc(mysqli_query($connect, $sql));

    if ($user != null) {
        $verify = password_verify($password, $user['password']);
        if ($verify) {
            unset($user['password']);
            $_SESSION['user'] = $user;
        } else {
            $_SESSION['error_login'] = "Verifique las credenciales";
        }
    } else {
        $_SESSION['error_login'] = "El correo no existe";
    }
}

header('Location: ../index.php');