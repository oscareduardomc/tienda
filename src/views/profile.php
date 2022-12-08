<div class="user-profile">

    <?php
    $select_user = mysqli_query($conn, "SELECT * FROM user_info WHERE id = '$user_id'") or die('query failed');
    if (mysqli_num_rows($select_user) > 0) {
        $fetch_user = mysqli_fetch_assoc($select_user);
    };
    ?>

    <p> username : <span><?php echo $fetch_user['name']; ?></span> </p>
    <p> email : <span><?php echo $fetch_user['email']; ?></span> </p>
    <div class="flex">
        <?php
        if ($fetch_user['rol'] === "admin") {
        ?>
            <a href="productos.php" class="option-btn">administrar</a>
        <?php } ?>
        <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">logout</a>
    </div>

</div>