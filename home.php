<?php 
session_start();
if(!isset($_SESSION['u_fname'])){
   echo  '<a href="log.html">LOGIN</a>';
}
else{
    echo '<a href="cart.php">CART <span class="glyphicon glyphicon-off"></a>
          <a href="logout.php"> LOG OUT</a>';
 ?>
