<?php 



if (isset($_POST) and !empty($_POST)) {
    $firstname = trim(htmlentities($_POST['fname']));
    $lastname = trim(htmlentities($_POST['lname']));
    $password = trim(htmlentities($_POST['password']));
    $password_confirmation = trim(htmlentities($_POST['password_confirmation']));
    $email = trim(htmlentities($_POST['email']));

    if ($password == $password_confirmation) { 

        require("user.php");

        $obj = new User;

        $obj->register($firstname,$lastname,$password,$email);




    } else {
        header("location: register.php?status='pwdfail'");
    }
}

    

?>