<?php
require 'db/db_conn.php';

$query = "SELECT * FROM cart";
$result = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn)) {
  while ($data = mysqli_fetch_assoc($result)) {
    $datalist[] = $data;
  }

  echo json_encode($datalist);
} else {
  echo 'error';
  // var_dump($datalist);
}
