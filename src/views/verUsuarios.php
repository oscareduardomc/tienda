<div class="pHeader">
    <p class="heading">usuarios</p>
    <a href="src\views\agregarUsuario.php" class="option-btn">Agregar usuario</a>
</div>

<table class="admin">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Acción</th>
        </tr>
    </thead>
    <?php
    $select_users = mysqli_query($conn, "SELECT * FROM `user_info`") or die('query failed');
    if (mysqli_num_rows($select_users) > 0) {
        while ($fetch_users = mysqli_fetch_assoc($select_users)) {
    ?>
            <tbody>
                <tr>
                    <td><?php echo $fetch_users['name'] ?></td>
                    <td><?php echo $fetch_users['email'] ?></td>
                    <td><?php echo $fetch_users['rol'] ?></td>
                    <td><a href="src\views\editarUsuario.php?edit=<?php echo $fetch_users['id']; ?>" class="btn">editar</a> <a href="productos.php?removeUser=<?php echo $fetch_users['id']; ?>" class="delete-btn">eliminar</a></td>
                </tr>
            </tbody>
    <?php
        };
    };
    ?>
</table>