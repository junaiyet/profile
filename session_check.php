<?php
if (!isset($_SESSION['login_done'])) {
    header('location:login.php');
}
?>