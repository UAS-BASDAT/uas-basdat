<?php
require 'db/db_conn.php';


$id = $_POST['id'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];


$query = "SELECT * FROM product WHERE id=$id";
$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);

$query2 = "SELECT * FROM cart WHERE id_product=$id";
$resultCart = mysqli_query($conn, $query2);
$cart = mysqli_fetch_assoc($resultCart);

if ($cart != null) {
  if ($quantity + $cart['quantity'] > $product['stock']) {
    echo 'full';
  } elseif ($quantity + $cart['quantity'] <= $product['stock']) {
    $new_price = $cart['total_price']+$price;
    $new_quantity = $cart['quantity'] +$quantity;
    $sql = "UPDATE cart SET quantity='$new_quantity', total_price='$new_price' WHERE id_product='$id'";
    mysqli_query($conn, $sql);
    echo 'success';
  }
} else {
  mysqli_query($conn, "INSERT INTO cart (id_product, quantity, total_price) VALUES ('$id','$quantity','$price')");
  if (mysqli_affected_rows($conn) == 1) {
    echo 'success';
  } else {
    echo 'error';
  }
}
