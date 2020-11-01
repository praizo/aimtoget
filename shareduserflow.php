<?php
    // print_r($_POST);
    // die();

    if (isset($_POST) and !empty($_POST)) {
        $userid = trim(htmlentities($_POST['userid']));
        $fileid = trim(htmlentities($_POST['fileid']));
        $sharedusers = $_POST['sharedusers'];
        $type = trim(htmlentities($_POST['type']));

        require("file.php");

        $obj = new File;

       
    
        $obj->sharedusers($userid,$type,$fileid, $sharedusers);
    }

   


?>