<?php
if (isset($_POST)){
    require_once '../db/connection.php';

    $title = isset($_POST['title']) ? mysqli_real_escape_string($connect, $_POST['title']) : null;
    $description = isset($_POST['description']) ? mysqli_real_escape_string($connect, $_POST['description']) : null;
    $category = isset($_POST['category']) ? (int)$_POST['category'] : null;
    $user = $_SESSION['user']['id'];

    $errors = array();
    if (is_null($title) || empty($title)){
        $errors['title'] = "Titulo no valido";
    }

    if (is_null($description) || empty($description)){
        $errors['description'] = "Descripción no valida";
    }

    if (is_null($category) || !is_numeric($category)){
        $errors['category'] = "Categoría no válido";
    }

    if (count($errors) == 0){
        $sql = "INSERT INTO `entradas` "
            .  "VALUES (null, $user, $category, '$title', '$description', CURDATE())";
        $query = mysqli_query($connect, $sql);
        header("Location: ../index.php");
    }

    $_SESSION['error_post'] = $errors;
    header("Location: ../post.php");
}