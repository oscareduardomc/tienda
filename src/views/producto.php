<div class="products">

    <div class="pHeader">
        <h1 class="heading">latest products</h1>
        <?php
        if (!isset($user_id)) {
        ?>
            <a href="login.php" class="btn">login</a>
        <?php } ?>
    </div>

    <div class="box-container">

        <?php
        $select_product = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
        if (mysqli_num_rows($select_product) > 0) {
            while ($fetch_product = mysqli_fetch_assoc($select_product)) {
        ?>
                <form method="post" class="box" action="">
                    <img src="images/<?php echo $fetch_product['image']; ?>" alt="">
                    <div class="name"><?php echo $fetch_product['name']; ?></div>
                    <!-- <div class="stock">Hay 
                        <?php 
                        //echo $fetch_product['stock']; 
                        ?> 
                        unidades en stock</div> -->
                    <div class="price">$<?php echo $fetch_product['price']; ?></div>
                    <input type="number" min="1" name="product_quantity" value="1">
                    <input type="hidden" name="product_id" value="<?php echo $fetch_product['id']; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                    <input type="hidden" name="product_stock" value="<?php echo $fetch_product['stock']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                    <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                </form>
        <?php
            };
        };
        ?>

    </div>

</div>