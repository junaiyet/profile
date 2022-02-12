<?php

session_start()
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!--Font Awesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>registaion</title>
</head>

<body>
  <style>
    .password {
      position: relative;
    }

    .password i {
      position: absolute;
      right: 20px;
      top: 42px;
    }
  </style>


  <div class="container mt-5">
    <div class="col-lg-7 mx-auto card mt-5 p-5">
      <form action="post.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name='name'
            value="<?php echo (isset( $_SESSION['old_name'])? $_SESSION['old_name']: ''); unset( $_SESSION['old_name'])?>">

          <?php if (isset($_SESSION ['name_error'])) {?>
          <div class="alert alert-danger">
            <?=$_SESSION['name_error']?>
          </div>
          <?php } unset( $_SESSION['name_error'])?>

        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email"
            value="<?php echo (isset($_SESSION['old_email'])? $_SESSION['old_email'] : ''); unset($_SESSION['old_email']) ?>">
          <?php if(isset($_SESSION['email_error'])){?>
          <div class="alert alert-danger">
            <?=$_SESSION['email_error']?>
          </div>
          <?php } unset($_SESSION['email_error'])?>

        </div>
        <div class="mb-3 password">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password"
            value="<?php echo (isset($_SESSION['old_password'])? $_SESSION['old_password'] : ''); unset($_SESSION['old_password']) ?>">
          <?php if(isset($_SESSION['password_error'])){?>
          <div class="alert alert-danger">
            <?=$_SESSION['password_error']?>
          </div>
          <?php } unset($_SESSION['password_error'])?>
          <i class='fa fa-eye' onclick="passWord_show()"></i>

        </div>
        <div class="mb-3">
          <label class="form-label">Confirm Password</label>
          <input type="password" class="form-control" name="confirm_password">
          <?php if(isset($_SESSION['confirm_password_error'])){?>
          <div class="alert alert-danger">
            <?=$_SESSION['confirm_password_error']?>
          </div>
          <?php } unset($_SESSION['confirm_password_error'])?>
        </div>
        <div class="mb-3">

          <input type="file" class="form-control" name="profile_photo" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
          <img width="50" style="border-radius: 50%;" class="mt-3"  id="pic"/>
          <?php if(isset($_SESSION['extension'])){?>
          <div class="alert alert-danger">
            <?=$_SESSION['extension']?>
          </div>
          <?php } unset($_SESSION['extension'])?>
          <?php if(isset($_SESSION['size'])){?>
          <div class="alert alert-danger">
            <?=$_SESSION['size']?>
          </div>
          <?php } unset($_SESSION['size'])?>
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>

      </form>

    </div>
  </div>







  <script src="https://code.jquery.com/jquery-1.12.4.min.js"
    integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>



  <?php if(isset($_SESSION['email_exits'])){?>
  <script>
    Swal.fire({
      position: 'top-center',
      icon: 'error',
      title: '<?=$_SESSION['email_exits ']?>',
      showConfirmButton: false,
      timer: 1500
    })
  </script>
  <?php } unset($_SESSION['email_exits'])?>


  <?php if(isset($_SESSION['success'])){?>
  <script>
    Swal.fire({
      position: 'top-center',
      icon: 'success',
      title: '<?=$_SESSION['success ']?>',
      showConfirmButton: false,
      timer: 1500
    })
  </script>
  <?php } unset($_SESSION['success'])?>

  <script>
    function passWord_show() {
      var password_input = document.getElementById('password')
      if (password_input.type == 'password') {
        password_input.type = 'text';
      } else {
        password_input.type = 'password'
      }
    }
  </script>

</body>

</html>