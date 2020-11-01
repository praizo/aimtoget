<?php



if (isset($_POST) and !empty($_POST)) {
    $id = trim(htmlentities($_POST['userid']));
    $type = trim(htmlentities($_POST['type']));
    $filearray = $_FILES;
    

    require("file.php");

    $obj = new File;

    $obj->fileupload($id,$type,$filearray);


}

?>