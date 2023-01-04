<?php 
  require 'db/db_conn.php'; 
  

  $id = $_POST['id'];
  $quantity = $_POST['quantity'];

  $query = "SELECT * FROM product WHERE id=$id";
  $result = mysqli_query($conn, $query);
  
  $product = mysqli_fetch_assoc($result);

$price = (int)$product['price'];

//   echo json_encode($price);
$total_price= $price*$quantity;

$sql = "UPDATE cart SET quantity='$quantity', total_price='$total_price' WHERE id_product='$id'";

mysqli_query($conn, $sql);

// echo json_encode($price);
  
  if (mysqli_affected_rows($conn)==1) {
    echo 'success';
  }else {
    echo 'error';
  }
