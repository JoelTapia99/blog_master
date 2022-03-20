<?php require_once 'app/isLogin.php' ?>
<?php require_once 'templates/header.php'; ?>
<?php require_once 'templates/side.php'; ?>

<div id="principal">
    <h1> <?= "Perfil de ". $_SESSION['user']['nombre']." ". $_SESSION['user']['apellidos']?> </h1>
    <form action="app/updateUserProfile.php" method="post">
        <label for="name">Nombre</label>
        <input type="text" name="name">
        <?= isset($_SESSION['error_update_profile']) ? showErrors($_SESSION['error_update_profile'], 'name') : '' ?>

        <label for="lastname">Apellido</label>
        <input type="text" name="lastname">
        <?= isset($_SESSION['error_update_profile']) ? showErrors($_SESSION['error_update_profile'], 'lastname') : '' ?>

        <label for="email">Email</label>
        <input type="email" name="email">
        <?= isset($_SESSION['error_update_profile']) ? showErrors($_SESSION['error_update_profile'], 'email') : '' ?>

        <input type="submit" value="Guardar">
        <?php deleteErrors(); ?>
    </form>
</div>

<?php require_once 'templates/footer.php' ?>
