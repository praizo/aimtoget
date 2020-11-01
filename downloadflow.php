<?php 


if (isset($_GET) and !empty($_GET)) {
        
    $location = trim(htmlentities($_GET['location']));

    $path = "uploads/" . $location;

    require("file.php");

    $obj = new File;

    $obj->downloadFile($path);


} else {
    header("location: index.php?status='downloadfailed'");
}
