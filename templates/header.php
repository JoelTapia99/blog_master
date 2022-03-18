<?php require_once 'db/connection.php'; ?>
<?php require_once 'app/helpers.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style.css">
    <title>pagina1</title>
</head>

<body>
<header id="cabeceras">
    <div id="logo">
        <a href="inde.php">
            Blog de videojuegos
        </a>
    </div>
    <nav id="menu">
        <ul>
            <li>
                <a href="index.php">Inicio</a>
            </li>
                <?php $categories = getCategories($connect) ?>
            <?php if ($categories != null): ?>
                <?php while ($categorie = mysqli_fetch_assoc($categories)): ?>
                    <li>
                        <a href="categorias.php?id=<?= $categorie['id'] ?>">
                            <?= $categorie['nombre'] ?>
                        </a>
                    </li>
                <?php endwhile; ?>
            <?php else: ?>
                <li>
                    <a href="index.php">Sin Categorias</a>
                </li>
            <?php endif; ?>
            <li>
                <a href="index.php">Sobre mi</a>
            </li>
            <li>
                <a href="index.php">Contacto</a>
            </li>
        </ul>
    </nav>
</header>

<div id="contenedor">
