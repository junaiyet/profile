<?php

session_start();
// require 'session_check.php';
require '../db.php';

$id = $_GET['id'];



$select_user_edit = " SELECT * FROM users WHERE id=$id";

$select_user_edit_result = mysqli_query($db_connection, $select_user_edit);

$after_assos = mysqli_fetch_assoc($select_user_edit_result);


?>


<?php require '../dashbord_parts/header.php'; ?>


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Pages</a>
    <span class="breadcrumb-item active">Blank Page</span>
  </nav>

  <div class="sl-pagebody">
    <div class="row">

      <div class="col-md-8 mx-auto my-5 ">
        <div class="card border-secondary mb-3">

          <div class="card-body ">
            <h5 class="card-title bg-info text-white p-2">Edit User Information</h5>
            <div class="card-body text-secondary">

              <?php if (isset($_SESSION['email_exist'])) { ?>
                <div class="alert alert-warning">
                  <?= $_SESSION['email_exist'] ?>
                </div>
              <?php }
              unset($_SESSION['email_exist']) ?>
              <form action="update.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input type="hidden" class="form-control" name='id' value="<?= $after_assos['id']; ?>">
                  <input type="text" class="form-control" name='name' value="<?= $after_assos['name']; ?>">
                  <?php if (isset($_SESSION['name_error'])) { ?>
                    <div class="alert alert-danger">
                      <?= $_SESSION['name_error'] ?>
                    </div>
                  <?php }
                  unset($_SESSION['name_error']) ?>
                </div>
                <div class="mb-3">
                  <label class="form-label">Email address</label>
                  <input type="text" class="form-control" name='email' value="<?= $after_assos['email']; ?>">
                  <?php if (isset($_SESSION['email_error'])) { ?>
                    <div class="alert alert-danger">
                      <?= $_SESSION['email_error'] ?>
                    </div>
                  <?php }
                  unset($_SESSION['email_error']) ?>
                </div>
                <div class="mb-3 input_password">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name='password'>
                  <?php if (isset($_SESSION['password_error'])) { ?>
                    <div class="alert alert-danger">
                      <?= $_SESSION['password_error'] ?>
                    </div>
                  <?php }
                  unset($_SESSION['password_error']) ?>
                  <!-- <i class='fa fa-eye' onclick="password_show()"></i> -->
                </div>
                <div class="mb-3">

                  <input type="file" class="form-control" name="profile_photo" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                  <img width="50" style="border-radius: 50%;" class="my-4" id="pic" src="/protfolio/uplodeds//users/<?= $after_assos['profile_photo']; ?>">
                  <!-- <img width="50" style="border-radius: 50%;" class="mt-3"  > -->
                  <?php if (isset($_SESSION['extension'])) { ?>
                    <div class="alert alert-danger">
                      <?= $_SESSION['extension'] ?>
                    </div>
                  <?php }
                  unset($_SESSION['extension']) ?>
                  <?php if (isset($_SESSION['size'])) { ?>
                    <div class="alert alert-danger">
                      <?= $_SESSION['size'] ?>
                    </div>
                  <?php }
                  unset($_SESSION['size']) ?>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- sl-page-title -->

  </div><!-- sl-pagebody -->
</div>
<!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->



<?php require '../dashbord_parts/footer.php'; ?>




<?php if (isset($_SESSION['email_exits'])) { ?>
  <script>
    Swal.fire({
      position: 'top-center',
      icon: 'error',
      title: '<?= $_SESSION['email_exits'] ?>',
      showConfirmButton: false,
      timer: 1500
    })
  </script>
<?php }
unset($_SESSION['email_exits']) ?>


<?php if (isset($_SESSION['success'])) { ?>
  <script>
    Swal.fire({
      position: 'top-center',
      icon: 'success',
      title: '<?= $_SESSION['success'] ?>',
      showConfirmButton: false,
      timer: 1500
    })
  </script>
<?php }
unset($_SESSION['success']) ?>

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