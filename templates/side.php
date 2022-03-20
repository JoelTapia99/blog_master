<aside id="sidebar">
    <?php if (isset($_SESSION['user'])): ?>
        <div id="idusurio-logeado" class="bloque">
            <h4> Bienvenido,
                <?= $_SESSION['user']['nombre'] . ' ' . $_SESSION['user']['apellidos'] ?>
            </h4> <br>
            <a href="post.php" class="boton boton-naranja">Crear Post</a>
            <a href="categorie.php" class="boton">Crear Categoria</a>
            <a href="userProfile.php" class="boton boton-verde">Mi Perfil</a>
            <br>
            <a href="app/logout.php" class="boton boton-rojo">Cerrar Sesion</a>
        </div>
    <?php endif; ?>

    <?php if (!isset($_SESSION['user'])): ?>
        <div id="login" class="bloque">
            <h3>Login</h3>
            <?php if (isset($_SESSION['error_login'])): ?>
                <div id="idusurio-logeado" class="alert alert-error">
                    <?= $_SESSION['error_login'] ?>
                </div>
            <?php endif; ?>
            <form action="app/login.php" method="post">
                <label for="email">Email</label>
                <input type="email" name="email">

                <label for="password">Contraseña</label>
                <input type="password" name="password">

                <input type="submit" value="Entrar">
            </form>
        </div>

        <div id="register" class="bloque">
            <h3>Register</h3>
            <?php if (isset($_SESSION['createdUser'])): ?>
                <div class="alert alert-successful">
                    <?= $_SESSION['createdUser']; ?>
                </div>
            <?php elseif (isset($_SESSION['errors']['createdUser'])): ?>
                <div class="alert alert-error">
                    <?= $_SESSION['errors']['createdUser']; ?>
                </div>
            <?php endif; ?>
            <form action="app/register.php" method="post">
                <label for="name">Nombre</label>
                <input type="text" name="name">
                <?= isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : '' ?>

                <label for="lastname">Apellido</label>
                <input type="text" name="lastname">
                <?= isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'lastname') : '' ?>

                <label for="email">Email</label>
                <input type="email" name="email">
                <?= isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'email') : '' ?>

                <label for="password">Contraseña</label>
                <input type="password" name="password">
                <?= isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'password') : '' ?>

                <input type="submit" value="Registrar">
            </form>
            <?php deleteErrors(); ?>
        </div>
    <?php endif; ?>
</aside>