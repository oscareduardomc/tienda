<?php

require_once '../db/conexion.php';
require_once '../db/config.php';

include '../../src/controller/controladorAdmin.php';
?>

<?php include("../views/header.php") ?>

<body>

    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
        }
    }
    ?>

    <div class="form-container">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $fila[0]; ?>">
            <div class="pHeader">
                <h3 class="heading">Editar Producto</h3>
                <a href="../../productos.php" class="btn">regresar</a>
            </div>
            <input type="text" name="name" placeholder="Enter name" value="<?php echo $fila[1]; ?>" class="box" />
            <input type="number" name="price" placeholder="Enter price" value="<?php echo $fila[2]; ?>" class="box" />
            <input type="number" name="stock" placeholder="Enter stock" value="<?php echo $fila[3]; ?>" class="box" />
            <input type="file" name="user_image" accept="image/*" value="<?php echo $fila[4]; ?>" class="box" />
            <button type="submit" name="edit_product" class="btn">Editar</button>
        </form>
    </div>

</body>

</html>