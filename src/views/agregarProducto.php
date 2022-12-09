<?php

error_reporting(~E_NOTICE); // avoid notice

require_once '..\db\conexion.php';

include '../controller/controladorAgregar.php';
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
            <div class="pHeader">
                <h3 class="heading">Agregar Producto</h3>
                <a href="../../productos.php" class="btn">regresar</a>
            </div>
            <input type="text" name="name" placeholder="Enter name" class="box" />
            <input type="number" name="price" placeholder="Enter price" class="box" />
            <input type="number" name="stock" placeholder="Enter stock" class="box" />
            <input type="file" name="user_image" accept="image/*" class="box" />
            <button type="submit" name="btnsave" class="btn">Guardar</button>
        </form>
    </div>

</body>

</html>