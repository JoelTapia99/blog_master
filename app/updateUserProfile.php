<?php
/* @param $connect --> viene de conecction.php */

if (isset($_POST)) {
    require_once '../db/connection.php';

    if (!isset($_SESSION)) {
        session_start();
    }

    $name = isset($_POST['name']) ? mysqli_real_escape_string($connect, $_POST['name']) : false;
    $lastname = isset($_POST['lastname']) ? mysqli_real_escape_string($connect, $_POST['lastname']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($connect, $_POST['email']) : false;
    $errors = array();
    $idUser = $_SESSION['user']['id'];


    if (empty($name) || is_numeric($name) && !preg_match("/[0-9]/", $name)) {
        $errors["name"] = "El nombre no es valido";
    }

    if (empty($lastname) || is_numeric($lastname) && !preg_match("/[0-9]/", $lastname)) {
        $errors["lastname"] = "El apellido no es valido ";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "El correo no es valido";
    }

    $sql = "SELECT `email` FROM `usuarios` WHERE `email` = '$email'";
    $query = mysqli_query($connect, $sql);

    $exist_email = mysqli_fetch_assoc($query);

    if (!is_null($exist_email)){
        if (empty($errors["email"])){
            $errors["email"] = "El correo ya existe";
        }else{
            $errors["email"] .= "\n El correo ya existe";
        }
    }

    if (count($errors) == 0 && is_null($exist_email)) {
        $sql = "UPDATE `usuarios` SET "
            . "`nombre`='$name', "
            . "`apellidos`='$lastname', "
            . "`email`='$email' "
            . " WHERE `id` = $idUser;";
        $query = mysqli_query($connect, $sql);
        if ($query) {
            $_SESSION['update_profile'] = "Usuario Actualizado";
            header('Location: ../index.php');
            return;
        } else {
            $_SESSION['error_update_profile'] = "Error al actualizar el usuario";
            header('Location: ../userProfile.php');
            return;
        }
    }
    $_SESSION['error_update_profile'] = $errors;
    header('Location: ../userProfile.php');
}