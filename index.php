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
                <div class="jumbotron bg-dark text-white">
                    <h1 class="display-4">Hello, world!</h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
                        attention to featured content or information.</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger
                        container.</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                </div>
            </div>
            <div class="col-10 mx-auto">
                <table class="table table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>example</td>
                            <td>audio</td>
                            <td>
                                <span class="badge badge-info">public</span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-success">Download</a>
                                <a href="#" class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>example</td>
                            <td>audio</td>
                            <td>
                                <span class="badge badge-warning">private</span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-success">Download</a>
                                <a href="#" class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>



</body>

</html>