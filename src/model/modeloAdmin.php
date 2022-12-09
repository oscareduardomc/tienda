<?php
// //obtener información para editar los usuarios
// if (isset($_GET['edit'])) {
//     $user_id = $_GET['edit'];
//     $select = mysqli_query($conn, "SELECT * FROM `user_info` WHERE id = '$user_id' ") or die('query failed');

//     if (mysqli_num_rows($select) > 0) {
//         $fila = mysqli_fetch_row($select);
//     }
// }

// //registrar usuarios
// if (isset($_POST['add_user'])) {

//     $name = mysqli_real_escape_string($conn, $_POST['name']);
//     $email = mysqli_real_escape_string($conn, $_POST['email']);
//     $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
//     $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
//     $rol = mysqli_real_escape_string($conn, $_POST['rol']);

//     $select = mysqli_query($conn, "SELECT * FROM `user_info` WHERE email = '$email' AND password = '$pass'") or die('query failed');

//     if (mysqli_num_rows($select) > 0) {
//         $message[] = 'user already exist!';
//     } else {
//         mysqli_query($conn, "INSERT INTO `user_info` (name, email, password, rol) VALUES('$name', '$email', '$pass', '$rol')") or die('query failed');
//         header('location:../../productos.php');
//     }
// }

//editar los usuarios
// if (isset($_POST['edit_user'])) {


//     $user_id = mysqli_real_escape_string($conn, $_POST['id']);
//     $name = mysqli_real_escape_string($conn, $_POST['name']);
//     $email = mysqli_real_escape_string($conn, $_POST['email']);
//     $rol = mysqli_real_escape_string($conn, $_POST['rol']);

//     $select = mysqli_query($conn, "UPDATE `user_info` SET name = '$name', email = '$email', rol = '$rol'  WHERE id = '$user_id'") or die('query failed');

//     header('location:../../productos.php');
// }

//eliminar un usuario
if (isset($_GET['removeUser'])) {
    $remove_id = $_GET['removeUser'];
    mysqli_query($conn, "DELETE FROM `user_info` WHERE id = '$remove_id'") or die('query failed');
    header('location:productos.php');
}

//registrar productos
// if (isset($_POST['btnsave'])) {
//     $name = $_POST['name']; // user name
//     $price = $_POST['price']; // user email
//     $stock = $_POST['stock']; // user email

//     $imgFile = $_FILES['user_image']['name'];
//     $tmp_dir = $_FILES['user_image']['tmp_name'];
//     $imgSize = $_FILES['user_image']['size'];


//     if (empty($name)) {
//         $message[] = "Ingrese el nombre";
//     } else if (empty($price)) {
//         $message[] = "Ingrese el precio.";
//     } else if (empty($stock)) {
//         $message[] = "Ingrese el stock.";
//     } else if (empty($imgFile)) {
//         $message[] = "Seleccione el archivo de imagen.";
//     } else {
//         $upload_dir = '../../images/'; // upload directory

//         $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

//         // valid image extensions
//         $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

//         // rename uploading image
//         $pic = rand(1000, 1000000) . "." . $imgExt;

//         // allow valid image file formats
//         if (in_array($imgExt, $valid_extensions)) {
//             // Check file size '1MB'
//             if ($imgSize < 1000000) {
//                 move_uploaded_file($tmp_dir, $upload_dir . $pic);
//             } else {
//                 $message[] = "Su archivo es muy grande.";
//             }
//         } else {
//             $message[] = "Solo archivos JPG, JPEG, PNG & GIF son permitidos.";
//         }
//     }


//     // if no error occured, continue
//     if (!isset($message)) {
//         $stmt = $DB_con->prepare('INSERT INTO products (name, price, stock, image) VALUES(:pname, :price, :stock, :ppic)');
//         $stmt->bindParam(':pname', $name);
//         $stmt->bindParam(':price', $price);
//         $stmt->bindParam(':stock', $stock);
//         $stmt->bindParam(':ppic', $pic);

//         if ($stmt->execute()) {
//             $message[] = "Nuevo registro insertado correctamente.";
//             header("refresh:3;../../productos.php"); // redirects image view page after 5 seconds.
//         } else {
//             $message[] = "Error al insertar.";
//         }
//     }
// }

// //obtener información para editar los productos
// if (isset($_GET['product'])) {
//     $product_id = $_GET['product'];
//     $select = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id' ") or die('query failed');

//     if (mysqli_num_rows($select) > 0) {
//         $fila = mysqli_fetch_row($select);
//     }
// }

// //editar los productos
// if (isset($_POST['edit_product'])) {


//     $product_id = mysqli_real_escape_string($conn, $_POST['id']);
//     $name = mysqli_real_escape_string($conn, $_POST['name']);
//     $price = mysqli_real_escape_string($conn, $_POST['price']);
//     $stock = mysqli_real_escape_string($conn, $_POST['stock']);

//     $imgFile = $_FILES['user_image']['name'];
//     $tmp_dir = $_FILES['user_image']['tmp_name'];
//     $imgSize = $_FILES['user_image']['size'];



//     if ($imgFile) {
//         $upload_dir = '../../images/'; // upload directory

//         $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

//         // valid image extensions
//         $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

//         // rename uploading image
//         $userpic = rand(1000, 1000000) . "." . $imgExt;

//         // allow valid image file formats
//         if (in_array($imgExt, $valid_extensions)) {
//             // Check file size '1MB'
//             if ($imgSize < 1000000) {
//                 move_uploaded_file($tmp_dir, $upload_dir . $userpic);
//             } else {
//                 $message[] = "Su archivo es muy grande.";
//             }
//         } else {
//             $message[] = "Solo archivos JPG, JPEG, PNG & GIF son permitidos.";
//         }
//     } else {
//         // if no image selected the old image remain as it is.
//         $userpic = $fila[4]; // old image from database
//     }

//     // if no error occured, continue
//     if (!isset($message)) {
//         $stmt = $DB_con->prepare('UPDATE products SET name = :pname, price = :price, stock = :stock, image = :ppic WHERE id = :pid');
//         $stmt->bindParam(':pname', $name);
//         $stmt->bindParam(':price', $price);
//         $stmt->bindParam(':stock', $stock);
//         $stmt->bindParam(':ppic', $userpic);
//         $stmt->bindParam(':pid', $product_id);

//         if ($stmt->execute()) {
//             $message[] = "Registro editado correctamente.";
//             header("refresh:3;../../productos.php"); // redirects image view page after 5 seconds.
//         } else {
//             $message[] = "Error al editar.";
//         }
//     }
// }

//eliminar un producto
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `products` WHERE id = '$remove_id'") or die('query failed');
    header('location:productos.php');
}
