<?php require_once 'app/isLogin.php' ?>
<?php require_once 'templates/header.php'; ?>
<?php require_once 'templates/side.php'; ?>

<div id="principal">
    <h1>Crear Categoria</h1>
    <form action="app/createCategorie.php" method="post">
        <label for="name">Nombre</label>
        <input type="text" name="name">

        <input type="submit" value="Guardar">
    </form>
</div>

<?php require_once 'templates/footer.php' ?>
