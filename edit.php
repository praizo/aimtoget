<?php

require ("user.php");

require ("file.php");

$obj = new User;

$res = new File;
$files  = $res->editFileView($_GET['id']);
$fileusers  = $res->displaySharedUser($_SESSION['user'], $_GET['id']);

// print_r($sharedusers);
// die();

$users = $obj->users();

$sharedusers = $obj->sharedusers($_GET['id']);


// print_r($files['file_type']);
// print_r($users);

    // if (isset($_SESSION['user'])) {
    //     require ("user.php");

    //     // require ("file.php");

    //     $obj = new User;

    //     // $res = new File;

    //     // $lists  = $res->listFilesPublic();
       
    //     $users = $obj->users();

    //     print_r($users);
        
    // }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class=" h3 text-secondary" href="#">TEST</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link h5 text-primary" href="#">Files</a>
                            </li>

                            <li class="nav-item">
                                <a class=" btn btn-primary" href="register.php">Register</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class=" btn btn-outline-primary" href="login.php">Login</a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-6 mx-auto border p-3 my-2 shadow-sm ">
                        <form method="POST" action="shareduserflow.php">
                            <h3>Edit</h3>
                            <hr>
                            <div class="form-group">
                                <h6>File Type</h6>
                                <hr>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="public" name="type" value="public"
                                        class="custom-control-input" <?php
                                         if ( $files['file_type'] == 'public') {
                                             echo 'checked';
                                         }
                                         
                                         ?> required>
                                    <label class="custom-control-label" for="public">Public</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="private" name="type" value="private"
                                        class="custom-control-input" <?php
                                         if ( $files['file_type'] == 'private') {
                                             echo 'checked';
                                         }
                                         
                                         ?> required>
                                    <label class="custom-control-label" for="private">Private</label>

                                </div>
                                <div class="form-group mt-3" id="selectusers">
                                    <h6 class="text-primary">Users</h6>
                                    <hr>
                                    <label for="users">Example multiple select</label>
                                    <select multiple class="form-control" id="users" name="sharedusers[]">
                                        <option selected value="0">Select Multiple Option</option>
                                        <?php foreach ($users as $key => $user) { ?>
                                        <option value="<?php echo $user['id'] ?>">
                                            <?php echo ucfirst($user['firstname'] . ' ' . ucfirst($user['lastname'])) ?>
                                        </option>
                                        <?php } ?>


                                    </select>
                                    <input type="hidden" name="fileid" value="<?php echo $_GET['id']; ?>">
                                    <input type="hidden" name="userid" value="<?php echo $_SESSION['user'];?>">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 mx-auto border p-3 my-2 shadow-sm ">
                        <h3>Shared Users</h3>
                        <hr>
                        <?php if (!empty($fileusers)) { ?>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($fileusers as $key => $fileuser) {  ?>
                                <tr>
                                    <th scope="row"><?php echo $i++; ?></th>
                                    <td><?php echo ucfirst($fileuser['firstname'] . ' ' . ucfirst($fileuser['lastname'])) ?>
                                    </td>
                                    <td><a href="removeshareduser.php?id=<?php echo $list['id']; ?>"
                                            class="btn btn-outline-info">Remove</a></td>

                                </tr>
                                <?php }?>



                            </tbody>
                        </table>

                        <?php } else{?>

                        <div class="alert alert-primary" role="alert">
                            No file available
                        </div>
                        <?php }?>


                    </div>
                </div>


            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
            integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
        </script>

        <script>
        $(document).ready(function() {

            $(function() {
                $('#selectusers').hide();



                if ($("input[name=type]:radio:checked").val() == "private") {

                    $('#selectusers').show();
                }

                $("input[name=type]:radio").click(function() {

                    if ($(this).is(':checked') && $(this).val() == "private") {
                        $('#selectusers').show();

                    } else {
                        $('#selectusers').hide();
                    }
                });


            });
        });
        </script>
</body>

</html>