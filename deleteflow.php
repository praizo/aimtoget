<?php 


if (isset($_GET) and !empty($_GET)) {
        
    $id = trim(htmlentities($_GET['id']));
    $location = trim(htmlentities($_GET['location']));

    require("file.php");

    $obj = new File;

    $obj->deleteFiles($id, $location);


} else {
    header("location: index.php?status='deletefailed'");
}
