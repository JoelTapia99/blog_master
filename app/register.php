<?php
/* @param $connect --> viene de conecction.php */

if (isset($_POST)) {
    require_once '../db/connection.php';

    if(!isset($_SESSION)){
        session_start();
    }

    $name = isset($_POST['name']) ? mysqli_real_escape_string($connect, $_POST['name']) : false;
    $lastname = isset($_POST['lastname']) ? mysqli_real_escape_string($connect, $_POST['lastname']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($connect, $_POST['email']) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($connect, $_POST['password']) : false;
    $errors = array();
    $newUser = false;

    if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
        $valid_name = true;
    } else {
        $valid_name = false;
        $errors["name"] = "El nombre no es valido";
    }

    if (!empty($lastname) && !is_numeric($lastname) && !preg_match("/[0-9]/", $lastname)) {
        $valid_lastname = true;
    } else {
        $valid_lastname = false;
        $errors["lastname"] = "El apellido no es valido ";
    }

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $valid_email = true;
    } else {
        $valid_email = false;
        $errors["email"] = "El correo no es valido";
    }

    if (!empty($password)) {
        $valid_password = true;
    } else {
        $valid_password = false;
        $errors["password"] = "La contraseña no puede ser vacia";
    }

    if (count($errors) == 0) {
        $newUser = true;
        // ['cost' => 4] => cifra la password 4 veces
        $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        $sql_select_email = "SELECT `email` FROM `usuarios` WHERE `email` = '$email'";
        $existEmail = mysqli_fetch_array(mysqli_query($connect, $sql_select_email));
        if ($existEmail == null) {
            $sql = "INSERT INTO"
                . "`blog_master`.`usuarios`(\n"
                . "    `id`,\n"
                . "    `nombre`,\n"
                . "    `apellidos`,\n"
                . "    `email`,\n"
                . "    `password`,\n"
                . "    `fecha`\n"
                . ")\n"
                . "VALUES(\n"
                . "    null,"
                . "    '$name',"
                . "    '$lastname',"
                . "    '$email',"
                . "    '$password',"
                . "    'CURDATE()'"
                . ")";
            $createdUser = mysqli_query($connect, $sql);
            if ($createdUser) {
                $_SESSION['createdUser'] = "Usuario creado";
            } else {
                $_SESSION['errors']['createdUser'] = "Error al crear el usuario";
            }
        } else {
            $_SESSION['errors']['createdUser'] = "Correo ya registrado";
        }
//		var_dump(mysqli_error($db));
//		die();
    } else {
        $_SESSION['errors'] = $errors;
    }
}

header('Location: ../index.php');