<?php

session_start();
include 'src\db\config.php';
error_reporting(0);

$user_id = $_SESSION['user_id'];

$select_user = mysqli_query($conn, "SELECT * FROM `user_info` WHERE id = '$user_id'") or die('query failed');
if (mysqli_num_rows($select_user) > 0) {
    $fetch_user = mysqli_fetch_assoc($select_user);
};

if ($fetch_user['rol'] == "user") {
    header('location: index.php');
}

include 'src/controller/controladorAdmin.php';
?>

<?php include("src/views/header.php") ?>

<body>
<link rel="stylesheet" href="css/style.css">
    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
        }
    }
    ?>

    <div class="container">

        <?php
        $select_user = mysqli_query($conn, "SELECT * FROM `user_info` WHERE id = '$user_id'") or die('query failed');
        if (mysqli_num_rows($select_user) > 0) {
            $fetch_user = mysqli_fetch_assoc($select_user);
        };
        ?>

        <div class="pHeader">
            <h1 class="heading">Bienvenido <?php echo $fetch_user['name']; ?> </h1>
            <a href="index.php" class="btn">regresar</a>
        </div>

        <?php include("src/views/verusuarios.php") ?>

        <?php include("src/views/verProductos.php") ?>

    </div>

</body>

</html>