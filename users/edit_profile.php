<?php 
session_start();

require '../db.php';
require '../dashbord_parts/header.php';

 ?>

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">Blank Page</span>
    </nav>

    <div class="sl-pagebody">
     
      <div class="container">
          <div class="row">
              <div class="col-lg-8 m-auto">
                  <div class="card">
                     <div class="card-header">
                         <h3>Edit Profile</h3>
                     </div>
                     <div class="card-body">
                         <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                         <div class="mt-5">
                             <label for="">Change Name</label>
                             <input class="form-control" type="hidden" name="id" value="<?=$after_assos_info['id']?>">
                             <input class="form-control" type="text" name="name" value="<?=$after_assos_info['name']?>">
                         </div>
                         <div class="mt-5">
                             <label for="">Change Email</label>
                             <input class="form-control" type="emial" name="email" value="<?=$after_assos_info['email']?>">
                         </div>
                         <div class="mt-5">
                             <label for="">Change Passwors</label>
                             <input class="form-control" type="password" name="password" value="">
                         </div>
                         <div class="mt-5">
                             <label for="">Change Profile Photo</label>
                             <input type="file" class="form-control" name="profile_photo" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                            <img width="50" style="border-radius: 50%;" class="my-4" id="pic" src="/form-validation/uplodeds/users/<?=$after_assos_info['profile_photo']; ?>">
                
                            </div>
                         <div class="mt-3">
                         <button type="submit" class="btn btn-primary">Submit</button>

                            </div>
                            </form>
                     </div>
                  </div>
              </div>
          </div>
      </div>

    </div><!-- sl-pagebody -->
</div>


<?php require '../dashbord_parts/footer.php' ?>