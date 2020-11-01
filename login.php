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
                    <div class="col-4 mx-auto border p-3 my-2 shadow-sm ">
                        <form method="POST" action="loginflow.php">
                            <h3 class="text-primary">Login</h3>
                            <hr>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                

            </div>
        </div>



</body>

</html>