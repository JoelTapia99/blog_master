<?php
if (isset($_POST)){
    require_once '../db/connection.php';

    $name = isset($_POST['name']) ? mysqli_real_escape_string($connect, $_POST['name']) : null;

    $errors = array();
    if (!is_null($name) || !empty($name) && preg_match("/[0-9]/",$name)){
        $sql = "INSERT INTO `categorias` VALUES(null, '$name');";
        $query = mysqli_query($connect, $sql);
    }else{
        $errors['createCategories'] = "Nombre no valido";
    }
}
header("Location: ../index.php");