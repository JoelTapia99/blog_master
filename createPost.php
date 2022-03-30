<?php require_once 'app/isLogin.php' ?>
<?php require_once 'templates/header.php'; ?>
<?php require_once 'templates/side.php'; ?>

<div id="principal">
    <h1>Crear Posts</h1>
    <form action="app/createPost.php" method="post">
        <label for="title">Titulo</label>
        <input type="text" name="title">
        <?= isset($_SESSION['error_post']) ? showErrors($_SESSION['error_post'], 'title') : '' ?>
        <label for="description">Descripción</label>
        <textarea name="description" rows="10" cols="50"></textarea>
        <?= isset($_SESSION['error_post']) ? showErrors($_SESSION['error_post'], 'description') : '' ?>

        <label for="name">Categoría</label>
        <select name="category">
            <?php $categories = getCategories($connect) ?>
            <?php if ($categories != null): ?>
                <?php while ($category = mysqli_fetch_assoc($categories)): ?>
                    <option value="<?= $category['id'] ?>">
                        <?= $category['nombre'] ?>
                    </option>
                <?php endwhile; ?>
            <?php endif; ?>
        </select>
        <?= isset($_SESSION['error_post']) ? showErrors($_SESSION['error_post'], 'category') : '' ?>

        <input type="submit" value="Guardar">
        <?php deleteErrors(); ?>
    </form>
</div>

<?php require_once 'templates/footer.php' ?>
