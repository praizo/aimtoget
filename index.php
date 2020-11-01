<?php

    require ("user.php");

    require ("file.php");

    $obj = new User;

    $res = new File;
    $lists  = $res->listFilesPublic();

    // print_r($list);


    if (isset($_SESSION['user'])) {
       
        $detail = $obj->getDetail($_SESSION['user']);
        
    }

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

                            <?php if (isset($_SESSION['user'])) { ?>
                            <li class="nav-item">
                                <a class=" btn btn-primary" href="profile.php">Welcome,
                                    <?php echo ucfirst($detail['firstname']) ?></a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class=" btn btn-outline-primary" href="logout.php">Logout</a>
                            </li>
                            <?php } else {?>
                            <li class="nav-item">
                                <a class=" btn btn-primary" href="register.php">Register</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class=" btn btn-outline-primary" href="login.php">Login</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-12">
                <div class="jumbotron bg-mute text-secondary text-center">
                    <h1 class="display-4">Hello,
                        <?php if(isset($_SESSION['user'])){ echo ucfirst($detail['firstname']); } else{?>
                        User <?php }?>

                    </h1>

                    <?php if (isset($_SESSION['user'])) {?>
                    <p class="lead">Upload file here.</p>
                    <hr class="my-4">
                    <form action="uploadflow.php" method="post" enctype="multipart/form-data">

                        <div class="form-row ">
                            <div class="col-12">
                                <div class="custom-file w-25">
                                    <input type="hidden" name="userid" value="<?php echo $detail['id'] ?>">
                                    <input type="file" class="custom-file-input" id="customFile" name="file[]" multiple
                                        required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>

                                </div>
                            </div>
                            <div class="col-12 my-2">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="public" name="type" value="public"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="public">Public</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="private" name="type" value="private"
                                        class="custom-control-input" required>
                                    <label class="custom-control-label" for="private">Private</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Upload file</button>
                    </form>
                    <?php } else {?>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
                        attention to featured content or information.</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger
                        container.</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>

                    <?php } ?>

                </div>
            </div>
            <?php include "alert.php"; ?>

            <div class="col-10 mx-auto">
                <?php if (!empty($lists)) { ?>
                <table class="table table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Author</th>
                            <th scope="col">Type</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                     
                        
                        foreach ($lists as $key => $list) {?>
                        <tr>
                            <th scope="row">1</th>
                            <td><?php echo ucfirst($list['firstname'] . ' ' . ucfirst($list['lastname'])) ?></td>
                            <td><?php echo ucfirst($list['file_format']) ?></td>
                            <td>
                                <span class="badge badge-info"><?php echo ucfirst($list['file_type']) ?></span>
                            </td>
                            <td>
                                <a href="downloadflow.php?location=<?php echo $list["file_location"]?>"
                                    onclick="return confirm('Are you sure?')" class="btn btn-success">Download</a>
                                <?php if(isset($_SESSION['user'])) {?>

                                <a href="edit.php?id=<?php echo $list['id']; ?>" class="btn btn-outline-info">Edit</a>

                                <a href="deleteflow.php?id=<?php echo $list['id'] ?>&location=<?php echo $list["file_location"]?>"
                                    onclick="return confirm('Are you sure?')" class="btn btn-outline-danger">Delete</a>
                                <?php }?>
                            </td>
                        </tr>

                        <?php } ?>


                    </tbody>
                </table>

                <?php } else{?>

                <div class="alert alert-primary" role="alert">
                    No file available
                </div>
                <?php }?>

            </div>`
        </div>
    </div>



</body>

</html>