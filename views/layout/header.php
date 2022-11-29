<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Tienda</title>
        <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css"/>
    </head>
    <body>
        <div id="container">
            <!-- CABECERA  -->
            <header id="header">
                <div id="logo">
                    <img src="<?=base_url?>assets/img/banner.png" alt="Logo"/>
                    <a href="index.php">
                        Tienda Masisa 
                    </a>
                </div>
            </header>
            <!-- MENÚ  -->
            <?php $categorias = Utils::showCategorias(); ?>
            <nav id="menu">
                <ul>
                    <li>
                        <a href="<?=base_url?>">Inicio</a>
                    </li>
                    <?php while($cat = $categorias->fetch_object()):?>
                    <li>
                        <a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a>
                    </li>
                    <?php endwhile; ?>
                </ul>

            </nav>
            <div id="content">
