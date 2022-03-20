<?php
/* @param $connect --> viene de conecction.php */

function showErrors($error, $field)
{
    if (isset($error[$field])) {
        return "<div class='alert alert-error'>" . $error[$field] . "</div>";
    }
    return '';
}

function deleteErrors()
{
    if (isset($_SESSION['errors'])) $_SESSION['errors'] = null;
    if (isset($_SESSION['createdUser'])) $_SESSION['createdUser'] = null;
    if (isset($_SESSION['error_post'])) $_SESSION['error_post'] = null;
    if (isset($_SESSION['update_profile'])) $_SESSION['update_profile'] = null;
    if (isset($_SESSION['error_update_profile'])) $_SESSION['error_update_profile'] = null;
}

function getCategories($connect)
{
    $sql = "SELECT * FROM categorias ORDER BY `id` ASC;";
    $query = mysqli_query($connect, $sql);
    $categories = array();
    if ($query) {
        return $categories = $query;
    }
    return $categories;
}

function getLastPosts($connect, $limit = null)
{
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM `entradas` e "
        . "INNER JOIN `categorias` c on e.categoria_id = c.id "
        . "ORDER BY e.id DESC";

    if ($limit != null) {
        $sql .= " LIMIT 4";
    }
    $posts = array();
    $query = mysqli_query($connect, $sql);
    if (!is_null($query)) {
        return $posts = $query;
    }
    return $posts;
}