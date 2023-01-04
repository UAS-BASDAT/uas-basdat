<?php
require 'db/db_conn.php';

$id = $_POST['id'];
$quantity = $_POST['quantity'];



$query = "SELECT * FROM product WHERE id=$id";
$result = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, "DELETE FROM cart WHERE checked=1");
$product = mysqli_fetch_assoc($result);

$newstock = $product['stock'] - $quantity;

$sql = "UPDATE product SET stock='$newstock' WHERE id='$id'";
mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) != 0) {
  echo 'success';
} else {
  echo 'error';
}
