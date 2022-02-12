<?php

require '../db.php';


$id = $_GET['id'];



$select = "SELECT * FROM users WHERE id=$id";
$select_rusult = mysqli_query($db_connection, $select);
$after_assos = mysqli_fetch_assoc($select_rusult);

if ($after_assos['status'] == 1) {
  $update = "UPDATE users SET status=0 WHERE id=$id";
  $update_result = mysqli_query($db_connection,$update);
  header('location:view.php');
}else{
    $update = "UPDATE users SET status=1 WHERE id=$id";
    $update_result = mysqli_query($db_connection,$update);
    header('location:view.php');
}

?>