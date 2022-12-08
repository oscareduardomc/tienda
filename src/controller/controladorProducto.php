<?php
if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:index.php');
};

if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
    $product_stock = $_POST['product_stock'];
    $product_id = $_POST['product_id'];

    

    $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'product already added to cart!';
    } else {
        if ($product_stock <= 5) {
            $message[] = 'producto agotado';
        } else {
            mysqli_query($conn, "INSERT INTO cart(user_id, product_id, name, price, image, quantity, stock_bUpdate) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image', '$product_quantity', $product_stock)") or die('query failed');
            $update_stock = mysqli_query($conn, "UPDATE products SET stock = $product_stock - $product_quantity WHERE name = '$product_name'") or die('query failed');
            $message[] = 'product added to cart!';
        }
    }
};