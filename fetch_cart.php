<?php


session_start();

if(isset($_SESSION['shopping_cartt']))
{
     echo json_encode($_SESSION["shopping_cartt"]);
}

 ?>
