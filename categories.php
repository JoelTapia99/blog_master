<?php require_once "db/connection.php"; ?>
<?php require_once "app/helpers.php"; ?>

<?php
    $searchCategory = getCategory($connect, $_GET['id']);
    if (!isset($searchCategory['id'])){
        header("Location: index.php");
    }
?>

<?php require_once 'templates/header.php'; ?>
<?php require_once 'templates/side.php' ?>

    <div id="principal">
        <h1>Posts de <?= $searchCategory['nombre'] ?></h1>
        <?php $posts = getLastPosts($connect, null, $searchCategory['id']); ?>
        <?php if (!empty($posts) && mysqli_num_rows($posts) >= 1): ?>
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