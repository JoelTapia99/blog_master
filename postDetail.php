<?php require_once "db/connection.php"; ?>
<?php require_once "app/helpers.php"; ?>

<?php
$post = getPost($connect, $_GET['id']);
if (!isset($post['id'])) {
    header("Location: index.php");
}
?>

<?php require_once 'templates/header.php'; ?>
<?php require_once 'templates/side.php' ?>
<?php
var_dump($post);
?>
    <div id="principal">
        <h1><?= $post['titulo'] ?></h1>
        <h2><?= $post['categoria'] ?></h2>
        <h4><?= $post['fecha']. " | ".$post['usuario'] ?></h4>
        <p><?= $post['descripcion'] ?></p>

        <?php if (empty($_SESSION['user'] && ($_SESSION['user']['id'] === $post['usuario_id']))): ?>
            <a href="post.php" class="boton boton-verde">Editar Post</a>
            <a href="post.php" class="boton boton-rojo">Eliminar Post</a>
        <?php endif; ?>

    </div>
<?php require_once 'templates/footer.php' ?>