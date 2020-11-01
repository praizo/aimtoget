<?php  

    if(isset($_GET['status']) and $_GET['status'] == "registered"){?>

    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Registration was succesfull.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>

<?php

    if(isset($_GET['status']) and $_GET['status'] == "registerationfailed"){?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Registration failed.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>

