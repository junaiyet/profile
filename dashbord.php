<?php
session_start();
require 'db.php'; 
require 'dashbord_parts/header.php'; 
?>


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">Blank Page</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Welcome Mr.x</h5>

        </div><!-- sl-page-title -->

    </div><!-- sl-pagebody -->
</div>
<!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->



<?php require 'dashbord_parts/footer.php'; ?>