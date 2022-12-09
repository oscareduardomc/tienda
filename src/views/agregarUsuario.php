<?php

include '..\db\config.php';
session_start();
error_reporting(0);
$user_id = $_SESSION['user_id'];

include '../controller/controladorAgregar.php';
?>

<?php include("header.php") ?>


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

    <div class="form-container">
        <form action="" method="post">
            <div class="pHeader">
                <h3 class="heading">Agregar Usuario</h3>
                <a href="../../productos.php" class="btn">regresar</a>
            </div>
            <input type="text" name="name" required placeholder="enter username" class="box">
            <input type="email" name="email" required placeholder="enter email" class="box">
            <input type="password" name="password" required placeholder="enter password" class="box">
            <input type="password" name="cpassword" required placeholder="confirm password" class="box">
            <select name="rol" class="box">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="add_user" class="btn" value="register now">
        </form>
    </div>

</body>

</html>