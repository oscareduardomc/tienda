<?php

include '..\db\config.php';
session_start();
error_reporting(0);
$user_id = $_SESSION['user_id'];

include '../controller/controladorAdmin.php';
?>

<?php include("src/views/header.php") ?>

<style>
    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }
</style>

<body>
<link rel="stylesheet" href="../../css/style.css">
    <div class="form-container">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $fila[0]; ?>">
            <div class="pHeader">
                <h3 class="heading">Editar Usuario</h3>
                <a href="../../productos.php" class="btn">regresar</a>
            </div>
            <input type="text" name="name" required placeholder="enter username" value="<?php echo $fila[1]; ?>" class="box">
            <input type="email" name="email" required placeholder="enter email" value="<?php echo $fila[2]; ?>" class="box">
            <select name="rol" class="box">
                <option value="<?php echo $fila[4]; ?>"><?php echo $fila[4]; ?></option>
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="edit_user" class="btn" value="edit now">
        </form>
    </div>

</body>

</html>