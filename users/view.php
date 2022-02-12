<?php
session_start();

require '../db.php';
require '../session_check.php';


$select_user = "SELECT * FROM users WHERE status=0 ";
$select_user_result = mysqli_query($db_connection, $select_user);

$select_user_trused = "SELECT * FROM users WHERE status=1 ";
$select_user_trused_result = mysqli_query($db_connection, $select_user_trused);


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
    <?php if($after_assos_info['role'] != 4){?>
        <div class="row">

            <div class="col-lg-8 mx-auto mt-5 p-4">
                <div class="card p-4">
                    <h3>User Information</h3>
                    <table class=" table table-bordered table-primary">
                        <thead>
                        <tr>
                    <td>id</td>
                    <td>name</td>
                    <td>email</td>
                    <td>photo</td>
                    <?php if($after_assos_info['role'] == 1 || $after_assos_info['role'] == 2){?>
                    <td>action</td>
                    <?php }?>
                </tr>
            </thead>

                 <tbody>
                 <?php foreach ($select_user_result as $index => $users) { ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $users['name'] ?></td>
                                <td><?= $users['email'] ?></td>
                                <td>
                                    <img width="50" style="border-radius: 50%;" src="../uplodeds/users/<?= $users['profile_photo'] ?>" alt="">
                                </td>

                                <?php if($after_assos_info['role'] == 1 || $after_assos_info['role'] == 2){?>
                                <td>
                                    <a href="edit.php?id=<?= $users['id'] ?>" type="button" class="btn btn-info "> Edit</a>
                                 
                                    <?php }?>
                                    <?php if($after_assos_info['role'] == 1){?>
                                        <button name="status.php?id=<?= $users['id'] ?>" class="btn btn-danger status">Delete</button>
                                    </td>
                                    <?php }?>
                            </tr>
                        <?php } ?>
                        <?php if (mysqli_num_rows($select_user_result) == 0) { ?>
                            <tr>
                                <td colspan="4" class="text-center"> No user found
                                     </td>
                            </tr>
                        <?php } ?>
                 </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-8 mx-auto mt-5 p-4">

                <div class="container">
                    <div class="mt-5 ">
                        <div class="card p-4">
                            <div class="card-header">
                                <h2>Trashed Users Information</h2>
                            </div>
                            <div class="card-body">
                                <table class="table  table table-bordered table-danger">
                                 <thead>
                                 <tr>
                                        <td>id</td>
                                        <td>name</td>
                                        <td>email</td>
                                        <td>photo</td>
                                        <td>action</td>
                                    </tr>
                                 </thead>
                        <tbody>
                        <?php foreach ($select_user_trused_result as $index => $users) { ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $users['name'] ?></td>
                                            <td><?= $users['email'] ?></td>
                                            <td>
                                                <img width="50" style="border-radius: 50%;" src="../uplodeds/users/<?= $users['profile_photo'] ?>" alt="">
                                            </td>
                                            <td>
                                                <a href="status.php?id=<?= $users['id'] ?>" type="button" class="btn btn-success">
                                                    Restore</a>
                                                <button name="delete.php?id=<?= $users['id'] ?>" type="button" class="btn btn-danger delele">Delete </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if (mysqli_num_rows($select_user_trused_result) == 0) { ?>
                                        <tr>
                                            <td colspan="4" class="text-center"> No Trash Found </td>
                                        </tr>
                                    <?php } ?>
                        </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
<?php } else{?>
  <div class="alert alert-warning p-3">
        <h3>gorib</h3>
  </div>
<?php }?>


    </div><!-- sl-pagebody -->
</div>
<!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->



<?php require '../dashbord_parts/footer.php'; ?>



<script>
    $('.status').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var link = $(this).attr('name');
                window.location.href = link;
            }
        })
    });
</script>
<script>
    $('.delele').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var link = $(this).attr('name');
                window.location.href = link;
            }
        })
    });
</script>

<?php if (isset($_SESSION['login_msg'])) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Signed in successfully'
        })
    </script>

<?php }
unset($_SESSION['login_msg']) ?>

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