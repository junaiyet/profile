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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>login</title>
  </head>
  <body>


  <section>
      <div class="container mt-5 pt-5">
          <div class="col-lg-6 mx-auto">
              <form action="login_post.php" method="POST">
                  <div class="card"> 
                      <div class="card-header">
                          <h3>Login</h3>
                      </div>
                      <div class="card-body">
                          <div class="mt-4">
                          <label class="form-label">Email</label>
                          <input type="email" class="form-control" name='email'>
                          </div>
                          <div class="mt-4">
                          <label class="form-label">Password</label>
                          <input type="password" class="form-control" name='password'>
                          </div>
                          <div class="mt-4">
                          <button type="submit" class="btn btn-primary"> Submit</button>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </section>




  <script src="https://code.jquery.com/jquery-1.12.4.min.js"integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <?php if(isset($_SESSION['password_wrong'])){?>
        <script>
    Swal.fire({
  position: 'top-center',
  icon: 'error',
  title: '<?=$_SESSION['password_wrong']?>',
  showConfirmButton: false,
  timer: 1500
  })
    </script>

    <?php } unset($_SESSION['password_wrong'])?>

    
    <?php if(isset($_SESSION['email_exist'])){?>
        <script>
    Swal.fire({
  position: 'top-center',
  icon: 'error',
  title: '<?=$_SESSION['email_exist']?>',
  showConfirmButton: false,
  timer: 1500
  })
    </script>

    <?php } unset($_SESSION['email_exist'])?>




  </body>
</html>