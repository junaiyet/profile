<?php
session_start();
require 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$_SESSION['old_name'] = $name;
$_SESSION['old_email'] = $email;
$_SESSION['old_password'] = $password;
$number = preg_match('@[0-9]@',$password );
$uppercase = preg_match('@[A-Z]@',$password );
$lowercase = preg_match('@[a-z]@',$password );
$special_character = preg_match('@[#,$,%,^,&,*]@',$password );
$after_decryot = password_hash($password, PASSWORD_DEFAULT);
date_default_timezone_set('Asia/Dhaka');
$created_at = date('y-m-d h:i:s');

if (empty($name)) {
    $_SESSION['name_error'] = "Please Enter Your Name";
    header('location:registation.php');
}
else if (empty($email)) {
    $_SESSION['email_error'] = "Please Enter Your Email";
    header('location:registation.php');
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['name_error'] = "Please Enter Your Validate Email";
    header('location:registation.php');
}
else if (empty($password)) {
    $_SESSION['password_error'] = "Please Enter Your Password";
    header('location:registation.php');
}
elseif(empty($confirm_password)){
    $_SESSION ['confirm_password_error'] = 'Please Enter Your Confirm Password';
    header('location:index.php');
  } 
else if ($password != $confirm_password) {
    $_SESSION['name_error'] = " Password Dose not match";
    header('location:registation.php');
}
elseif( !$number || !$uppercase || !$lowercase || !$special_character || strlen($password) < 8){
    $_SESSION ['confirm_password_error'] = 'Please Enter Your Validate special_character';
    header('location:index.php');
  } 
else{
    

    $select_email = "SELECT COUNT(*) as email_exits FROM users WHERE email='$email' ";
    $select_email_result = mysqli_query($db_connection, $select_email);
    $after_assos = mysqli_fetch_assoc( $select_email_result);
    if ($after_assos ['email_exits'] == 1) {
        $_SESSION['email_exits'] = "Email already Exits";
        header('location:registation.php');

    }else{

//   image uploded
                    $uploded_file = $_FILES['profile_photo'];
                    $uploded_file_name = $uploded_file['name'];
                    $after_expolde =explode('.',$uploded_file_name);
                    $extension =end($after_expolde);
                    $allowed_extension=array('jpg','png','jpeg','gif');

                    if (in_array($extension,$allowed_extension)) {
                        if ($uploded_file['size'] <= 1000000) {
                            
                            $inssert = "INSERT INTO users(name,email,password,created_at) VALUES ('$name','$email','$after_decryot','$created_at')";
                            $inssert_result = mysqli_query($db_connection, $inssert);
                            $last_id = mysqli_insert_id($db_connection);
                            $file_name = $last_id.'.'.$extension;
                            $new_location ='uplodeds/users/'.$file_name;
                            move_uploaded_file($uploded_file['tmp_name'],$new_location);

                            // 
                            $update_users = "UPDATE users SET profile_photo = '$file_name' WHERE id=$last_id";
                            $update_users_result = mysqli_query($db_connection, $update_users);
                            $_SESSION['success'] = 'Registration Successful';
                            unset($_SESSION['old_name']);
                            unset($_SESSION['old_email']);
                            unset($_SESSION['old_password']);
                            header('location:login.php');
                            // 
                        }else{
                            $_SESSION['size'] = 'file size  to large, max 1 mb';
                            header('location:registation.php');
                        }
                    }else{
                        $_SESSION['extension'] = 'ivalide extension';
                        header('location:registation.php');
                    }

                        }

                    }
                    ?>