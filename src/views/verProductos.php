<div class="pHeader">
    <p class="heading">productos</p>
    <a href="src\views\agregarProducto.php" class="option-btn">Agregar producto</a>
</div>

<table class="admin">
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acción</th>
        </tr>
    </thead>
    <?php
    $select_product = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
    if (mysqli_num_rows($select_product) > 0) {
        while ($fetch_product = mysqli_fetch_assoc($select_product)) {
    ?>
            <tbody>
                <tr>
                    <td><img src="images/<?php echo $fetch_product['image']; ?>" alt=""></td>
                    <td><?php echo $fetch_product['name'] ?></td>
                    <td><?php echo $fetch_product['price'] ?></td>
                    <td><?php echo $fetch_product['stock'] ?></td>
                    <td><a href="src\views\editarProducto.php?product=<?php echo $fetch_product['id']; ?>" class="btn">editar</a> <a href="productos.php?remove=<?php echo $fetch_product['id']; ?>" class="delete-btn">eliminar</a></td>
                </tr>
            </tbody>
    <?php
        };
    };
    ?>
</table>