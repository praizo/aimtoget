<?php


    if (isset($_POST) and !empty($_POST)) {
        
        $password = trim(htmlentities($_POST['password']));
        $email = trim(htmlentities($_POST['email']));

        require("user.php");

        $obj = new User;

        $obj->login($password,$email);


    } else {
        header("location: login.php?status='loginfail'");
    }

    


?>