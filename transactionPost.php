<?php
require 'db/db_conn.php';

$id = $_POST['id'];
$quantity = $_POST['quantity'];


$query = "SELECT * FROM product WHERE id=$id";
$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);

$newstock = $product['stock'] - $quantity;

$sql = "UPDATE product SET stock='$newstock' WHERE id='$id'";
mysqli_query($conn, $sql);

mysqli_query($conn, "INSERT INTO transaction (dates) VALUES (NULL)");


if (mysqli_affected_rows($conn) == 1) {
  echo 'success';
} else {
  echo 'error';
}
