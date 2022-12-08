<?php

include 'src\db\config.php';
session_start();

include 'src/controller/controladorLogin.php';

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

      <?php include("src/views/login.php") ?>

   </div>

</body>

</html>