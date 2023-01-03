<?php 
  require 'db/db_conn.php'; 
  

  $id = $_POST['id'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $stock = $_POST['stock'];


  mysqli_query($conn, "INSERT INTO cart (id_product, quantity, total_price) VALUES ('$id','$quantity','$price')");
  mysqli_query($conn, "UPDATE product SET stock='$stock' WHERE id=$id");
  
  
  if (mysqli_affected_rows($conn)==1) {
    echo 'success';
  }else {
    echo 'error';
  }
  
?>