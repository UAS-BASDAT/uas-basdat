<?php
require 'db/db_conn.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM cart WHERE id_product=$id");


if (mysqli_affected_rows($conn)) {
    echo 'success';
}else {
    echo 'error';
}
