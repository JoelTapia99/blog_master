<?php require_once 'templates/header.php'; ?>
<?php require_once 'templates/side.php' ?>

    <div id="principal">
        <h1>Ultimas Posts</h1>
        <?php $posts = getLastPosts($connect); ?>
        <?php if (!empty($posts)): ?>
            <?php while ($post = mysqli_fetch_assoc($posts)): ?>
                <article class="entrada">
                    <h2><?= $post['titulo'] ?></h2>
                    <span class="fecha"> <?= $post['categoria'] . ' | ' . $post['fecha'] ?> </span>
                    <p>
                        <?= substr($post['descripcion'], 0, 180) . "..." ?>
                    </p>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <img src="assets/imgs/no-data.svg" alt="no data">
        <?php endif; ?>
    </div>

<?php require_once 'templates/footer.php' ?>