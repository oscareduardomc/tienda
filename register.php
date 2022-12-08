<?php

include 'src\db\config.php';

//controlador
include 'src/controller/controladorRegistro.php';

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

   <div class="form-container">

      <?php include("src/views/registro.php") ?>

   </div>

</body>

</html>