<?php
    require("utility.php");

    class User extends utility
    {
        function register($firstname,$lastname,$password,$email)
        {
            $encrypt = md5($password);

            $sql= "INSERT INTO users SET firstname = '$firstname', lastname= '$lastname', pwd = '$encrypt', email = '$email'";   
           
            $this->conn->query($sql);
    
    
            $id = $this->conn->insert_id;

            if ($id > 0) {
                $_SESSION['user'] = $id;
                header("location:profile.php?status=registered");
            }else {
                header("location:register.php?status=registerationfailed");
            }
    
            
        }


        function login($password,$email)
        {
            $encrypted = md5($password);

            $sql= "SELECT * FROM users WHERE pwd = '$encrypted' AND email = '$email' LIMIT 1";

            $result = $this->conn->query($sql);
            $details=[];

            if ($result->num_rows == 1) { //==1 valid details
                $details = $result->fetch_assoc();
                $_SESSION['user'] = $details['id'];

                               

                header("location: profile.php?status=loggedin");
                
            } else {
                header("location: login.php?status='loginfailed'");
            }
        }


        function getDetail($id)
        {
            $sql = "SELECT * FROM users WHERE id = '$id'";
            $result = $this->conn->query($sql);
    
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } 
                
                
            return $row;
        }

        function users()
        {
            $sql = "SELECT * FROM users";
            $result = $this->conn->query($sql);

            $items=[];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $items[] = $row;
                }
            } 
            return $items;
        }

        function sharedusers($fileid)
        {
            
            $sql = "SELECT * FROM sharedusers WHERE file_id = '$fileid'";

            // echo $sql;
            // die();
            $result = $this->conn->query($sql);

           

            $items=[];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $items[] = $row;
                }
            } 
            return $items;
        }

       
    }


?>