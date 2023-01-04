<?php 
  require 'db/db_conn.php'; 
    
  $id = $_GET['id'];

  $query = "SELECT * FROM product WHERE id=$id";
  $result = mysqli_query($conn, $query);
  
  $product = mysqli_fetch_assoc($result);

  echo json_encode($product);



  ?>