<div class="shopping-cart">

    <h1 class="heading">shopping cart</h1>

    <table>
        <thead>
            <th>image</th>
            <th>name</th>
            <th>price</th>
            <th>quantity</th>
            <th>total price</th>
            <th>action</th>
        </thead>
        <tbody>
            <?php
            $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            $grand_total = 0;
            if (mysqli_num_rows($cart_query) > 0) {
                while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
            ?>
                    <tr>
                        <td><img src="images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                        <td><?php echo $fetch_cart['name']; ?></td>
                        <td>$<?php echo $fetch_cart['price']; ?>/-</td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                <input type="hidden" name="product_id" value="<?php echo $fetch_cart['product_id']; ?>">
                                <input type="hidden" name="product_stock" value="<?php echo $fetch_cart['stock_bUpdate']; ?>">
                                <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                                <input type="submit" name="update_cart" value="update" class="option-btn">
                            </form>
                        </td>
                        <td>$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                <input type="hidden" name="product_id" value="<?php echo $fetch_cart['product_id']; ?>">
                                <input type="hidden" name="product_stock" value="<?php echo $fetch_cart['stock_bUpdate']; ?>">
                                <input type="submit" name="remove" value="remove" class="delete-btn">
                            </form>
                            
                        </td>
                    </tr>
            <?php
                    $grand_total += $sub_total;
                }
            } else {
                echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
            }
            ?>
            <tr class="table-bottom">
                <td colspan="5">grand total :</td>
                <td>$<?php echo $grand_total; ?>/-</td>
                
            </tr>
        </tbody>
    </table>

    <div class="cart-btn">
        <div id="paypal-button-container"></div>
    </div>

</div>