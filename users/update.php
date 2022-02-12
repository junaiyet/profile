<?php
session_start();
require '../db.php';


$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

if (empty($password)) {

   if ($_FILES['profile_photo']['name'] != '') {

      // 
      $uploded_file = $_FILES['profile_photo'];

      $uploded_file_name = $uploded_file['name'];
      $after_expolde = explode('.', $uploded_file_name);
      $extension = end($after_expolde);
      $allowed_extension = array('jpg', 'png', 'jpeg', 'gif');

      if (in_array($extension, $allowed_extension)) {
         if ($uploded_file['size'] <= 1000000) {
            $select_img = "SELECT * FROM users WHERE  id=$id";
            $select_img_result = mysqli_query($db_connection, $select_img);
            $after_assos = mysqli_fetch_assoc($select_img_result);

            $delete_from = '../uplodeds/users/' . $after_assos['profile_photo'];
            unlink($delete_from);


            $file_name = $id . '.' . $extension;
            $new_location = '../uplodeds/users/' . $file_name;
            move_uploaded_file($uploded_file['tmp_name'], $new_location);

            // 
            $update_users = "UPDATE users SET profile_photo = '$file_name' WHERE id=$id";
            $update_users_result = mysqli_query($db_connection, $update_users);
            $_SESSION['success'] = 'Registration Successful';

            header('location:view.php');
            // 
         } else {
            $_SESSION['size'] = 'file size  to large, max 1 mb';
            header('location:edit.php?id=' . $id);
         }
      } else {
         $_SESSION['extension'] = 'ivalide extension';
         header('location:edit.php?id=' . $id);
      }
      // 


   } else {
      $ubdate_user = "UPDATE users SET name='$name', email='$email'  WHERE id=$id ";
      $ubdate_user_result = mysqli_query($db_connection, $ubdate_user);

      $_SESSION['success'] = 'User Updated! ';
      header('location:view.php');
   }
} else {
   if ($_FILES['profile_photo']['name'] != '') {

      // 
      $uploded_file = $_FILES['profile_photo'];

      $uploded_file_name = $uploded_file['name'];
      $after_expolde = explode('.', $uploded_file_name);
      $extension = end($after_expolde);
      $allowed_extension = array('jpg', 'png', 'jpeg', 'gif');

      if (in_array($extension, $allowed_extension)) {
         if ($uploded_file['size'] <= 1000000) {
            $select_img = "SELECT * FROM users WHERE  id=$id";
            $select_img_result = mysqli_query($db_connection, $select_img);
            $after_assos = mysqli_fetch_assoc($select_img_result);

            $delete_from = '../uplodeds/users/' . $after_assos['profile_photo'];
            unlink($delete_from);

            $ubdate_user = "UPDATE users SET name='$name', email='$email', password='$password_hash' WHERE id=$id ";
            $ubdate_user_result = mysqli_query($db_connection, $ubdate_user);

            $file_name = $id . '.' . $extension;
            $new_location = '../uplodeds/users/' . $file_name;
            move_uploaded_file($uploded_file['tmp_name'], $new_location);

            // 

            $_SESSION['success'] = 'Registration Successful';

            header('location:view.php');
            // 
         } else {
            $_SESSION['size'] = 'file size  to large, max 1 mb';
            header('location:view.php');
         }
      } else {

         $_SESSION['extension'] = 'ivalide extension';
         header('location:edit.php?id=' . $id);
      }
      // 


   } else {
      $ubdate_user = "UPDATE users SET name='$name', email='$email', password='$password_hash' WHERE id=$id ";
      $ubdate_user_result = mysqli_query($db_connection, $ubdate_user);

      $_SESSION['success'] = 'User Updated! ';
      header('location:view.php');
   }


   $_SESSION['success'] = 'User Updated! ';
   header('location:view.php');
}
