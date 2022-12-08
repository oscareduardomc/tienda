<?php

include 'src\db\config.php';
session_start();
error_reporting(0);
$user_id = $_SESSION['user_id'];

include 'src/controller/controladorProducto.php';
?>

<?php include("src/views/header.php") ?>


<body>
   <link rel="stylesheet" href="css/style.css">
   <script src="https://www.paypal.com/sdk/js?client-id=Ae43kUVCTTBPEUWxNex_PMWIt__gxlWmc4fLeQ-SaZvAMG-BnE0oA42NfsAX9GN-GvGAoDZ_jSjssEZf"></script>

   <?php
   //Para los mensajes
   if (isset($message)) {
      foreach ($message as $message) {
         echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
      }
   }
   ?>

   <div class="container">

      <?php
      if (isset($user_id)) {
         include("src/views/profile.php");
      };
      ?>

      <?php include("src/views/productos.php") ?>

      <?php include("src/views/carrito.php") ?>

   </div>

   <script>
      paypal.Buttons({
         // Sets up the transaction when a payment button is clicked
         createOrder: (data, actions) => {
            return actions.order.create({
               purchase_units: [{
                  amount: {
                     value: '<?php echo $grand_total; ?>' // Can also reference a variable or function
                  }
               }]
            });
         },
         // Finalize the transaction after payer approval
         onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
               console.log(orderData);
               // Successful capture! For dev/demo purposes:
               console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
               const transaction = orderData.purchase_units[0].payments.captures[0];
               $transaction_id = transaction.id;
               alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
               // When ready to go live, remove the alert and show a success message within this page. For example:
               // const element = document.getElementById('paypal-button-container');
               // element.innerHTML = '<h3>Thank you for your payment!</h3>';
               // Or go to another URL: actions.redirect('productos.php');
               
            });
            
         }
      }).render('#paypal-button-container');
   </script>

</body>

</html>