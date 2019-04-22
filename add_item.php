<?php


session_start();

$product_data = json_decode(file_get_contents("php://input"));


$product_id = $product_data->id;
$product_name = $product_data->name;
$product_price = $product_data->price;

if(isset($_SESSION["shopping_cartt"]))
{
  $is_available = 0;
  foreach($_SESSION["shopping_cartt"] as $keys => $values)
  {
    if($_SESSION["shopping_cartt"][$keys]['product_id'] == $product_id)
    {
      $_SESSION["shopping_cartt"][$keys]['product_quantity'] =
      $_SESSION["shopping_cartt"][$keys]['product_quantity'] + 1;
    }
  }

  if($is_available == 0)
  {
    $item_array = array(
      'product_id'            =>      $product_id,
      'product_name'          =>      $product_name,
      'product_price'         =>      $product_price,
      'product_quantity'      =>      1,
    );
    $_SESSION["shopping_cartes"][] = $item_array;
  }
}
else
{
  $item_array = array(
    'product_id'            =>      $product_id,
    'product_name'          =>      $product_name,
    'product_price'         =>      $product_price,
    'product_quantity'      =>      1,
  );
  $_SESSION["shopping_cartt"][] = $item_Array;

}
 ?>
