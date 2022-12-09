<?php
if (isset($_POST['btnsave'])) {
    $name = $_POST['name']; // user name
    $price = $_POST['price']; // user email
    $stock = $_POST['stock']; // user email

    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];


    if (empty($name)) {
        $message[] = "Ingrese el nombre";
    } else if (empty($price)) {
        $message[] = "Ingrese el precio.";
    } else if (empty($stock)) {
        $message[] = "Ingrese el stock.";
    } else if (empty($imgFile)) {
        $message[] = "Seleccione el archivo de imagen.";
    } else {
        $upload_dir = '../../images/'; // upload directory

        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

        // rename uploading image
        $pic = rand(1000, 1000000) . "." . $imgExt;

        // allow valid image file formats
        if (in_array($imgExt, $valid_extensions)) {
            // Check file size '1MB'
            if ($imgSize < 1000000) {
                move_uploaded_file($tmp_dir, $upload_dir . $pic);
            } else {
                $message[] = "Su archivo es muy grande.";
            }
        } else {
            $message[] = "Solo archivos JPG, JPEG, PNG & GIF son permitidos.";
        }
    }


    // if no error occured, continue
    if (!isset($message)) {
        $stmt = $DB_con->prepare('INSERT INTO products (name, price, stock, image) VALUES(:pname, :price, :stock, :ppic)');
        $stmt->bindParam(':pname', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':ppic', $pic);

        if ($stmt->execute()) {
            $message[] = "Nuevo registro insertado correctamente.";
            header("refresh:3;../../productos.php"); // redirects image view page after 5 seconds.
        } else {
            $message[] = "Error al insertar.";
        }
    }
}



//registrar usuarios
if (isset($_POST['add_user'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $rol = mysqli_real_escape_string($conn, $_POST['rol']);

    $select = mysqli_query($conn, "SELECT * FROM `user_info` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $message[] = 'user already exist!';
    } else {
        mysqli_query($conn, "INSERT INTO `user_info` (name, email, password, rol) VALUES('$name', '$email', '$pass', '$rol')") or die('query failed');
        header('location:../../productos.php');
    }
}

?>