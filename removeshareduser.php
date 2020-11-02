<?php 


if (isset($_GET) and !empty($_GET)) {
   
    $shareduserid = trim(htmlentities($_GET['shareduserid']));
    $fileid = trim(htmlentities($_GET['fileid']));
    require("file.php");

    $obj = new File;

    $obj->removeshareduser($shareduserid, $fileid);


} else {
    header("location: index.php?status='downloadfailed'");
}
