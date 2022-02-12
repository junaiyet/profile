<?php
session_start();
require 'session_check.php';
require 'db.php';


$email = $_POST['email'];
$password = $_POST['password'];

$select_email = "SELECT COUNT(*) as email_exist,id FROM users WHERE email='$email'";
$select_email_result =mysqli_query($db_connection,$select_email);
$after_assoc =mysqli_fetch_assoc($select_email_result);


if ($after_assoc['email_exist'] == 1) {
    $select_email_two = "SELECT * FROM users WHERE email='$email'";
    $select_email_two_result = mysqli_query($db_connection,$select_email_two);
    $after_assoc_two =mysqli_fetch_assoc($select_email_two_result);
    if (password_verify($password, $after_assoc_two['password'])) {
        $_SESSION['login_done'] = "Already Login Done";
        $_SESSION['login_msg'] = "Already Login Success";
        $_SESSION['id'] = $after_assoc['id'];
        header('location:users/view.php');
        
    }else{
        $_SESSION['password_wrong'] = "Wrong Password" ;
    header('location:login.php');
    }
    
}else{
    $_SESSION['email_exist'] = "Invalud Email" ;
    header('location:login.php');
}

?>