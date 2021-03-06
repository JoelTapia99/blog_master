<?php require_once 'templates/header.php'; ?>
<?php require_once 'templates/side.php' ?>

    <div id="principal">
        <h1>Ultimos Posts</h1>
        <?php $posts = getLastPosts($connect, true); ?>
        <?php if (!empty($posts)): ?>
            <?php while ($post = mysqli_fetch_assoc($posts)): ?>
                <article class="entrada">
                    <a href="postDetail.php?id=<?=$post['id']?>">
                        <h2><?= $post['titulo'] ?></h2>
                        <span class="fecha"> <?= $post['categoria'] . ' | ' . $post['fecha'] ?> </span>
                        <p>
                            <?= substr($post['descripcion'], 0, 180) . "..." ?>
                        </p>
                    </a>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <img src="assets/imgs/no-data.svg" alt="no data">
        <?php endif; ?>
        <div id="ver-todas"><a href="allPosts.php">ver todas las entradas</a></div>
    </div>

<?php require_once 'templates/footer.php' ?>