<?php 
  require 'db/db_conn.php'; 
  
  function get_products() {
    global $conn;
    $query = "SELECT * FROM product";
    $result = mysqli_query($conn, $query);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $products;
  }

  function get_product_detail($id) {
    global $conn;
    $query = "SELECT * FROM product WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
    return $product;
  }

  function get_all_cart() {
    global $conn;
    $query = "SELECT product.*, cart.* FROM product INNER JOIN cart ON cart.id_product = product.id";
    $result = mysqli_query($conn, $query);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $products;
  }
