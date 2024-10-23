<!doctype html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="imagenes/logoxd.png">
    <link rel="stylesheet" href="estilo_principal.css">
    <meta charset="utf-8">
    <title>Monster Coock</title>
</head>

<body>
    <header>
        <img id="logo" src="imagenes/logoxd.png">
        <h1 id="titulo">Cocina</h1>
        <a class="item_menu" href="nuevo_articulo.php">Publicar</a>
        <a class="item_menu" href="index.php">Home</a>
        <div class="dropdown-container">
            <a class="item_menu" href="#">Categorías</a>
            <ul class="dropdown">
                <li><a class="item_menu" href="filtrar.php?categoria=pastas">Pastas</a></li>
                <li><a class="item_menu" href="filtrar.php?categoria=alhorno">Al Horno</a></li>
                <li><a class="item_menu" href="filtrar.php?categoria=fritos">Fritos</a></li>
                <li><a class="item_menu" href="filtrar.php?categoria=postres">Postres</a></li>
                <li><a class="item_menu" href="filtrar.php?categoria=aperitivos">Aperitivos</a></li>
        </div>

        <?php
        session_start();
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            echo "<p>Hola, " . htmlspecialchars($_SESSION['nombre']) . "!</p>";
        } else {
            echo '<p><a class="item_menu" href="iniciar_sesion.php">Login</a></p>';
        }
        ?>
        <?php if (isset($_SESSION['loggedin']) == true): ?>
            <a class="item_menu" href="logout.php">Logout</a>
        <?php endif; ?>
    </header>
</body>

</html>