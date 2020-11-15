<?php

    class File
    {

        protected $conn;			
        function __construct()
        {
            $this->conn = new Mysqli('localhost','root','','testing');
        }
        
        public function fileupload($userid,$type,$filearray)
        {
			
            $x= 0;
            foreach($filearray['file']['name'] as $key=>$filename){

               
                $filelocation = $_FILES['file']['tmp_name'][$key];
                // $file_size = $_FILES['file']['size'][$key];

               

                $pictures = array('jpg','png','jpeg');
                $audio = array('mp3', 'm4a', 'wma' );
                $video = array('mkv', 'mp4');
                $doc = array('txt', 'pdf',);

                $extension = @end(explode('.',$filename)); 

              

                $error = array();

                if(in_array($extension, $pictures)){
                    $file_format = "pictures";
                }
                if(in_array($extension, $audio)){
                    $file_format = "audio";
                }



                if(in_array($extension, $video)){
                    $file_format = "video";
                }

                if(in_array($extension, $doc)){
                    $file_format = "document";
                }
                
                // if($file_size > 10000){ 
                //     $error[] = "File is too large";
                // }
                
                if(empty($error)){
                    $newname = time().$x++.".".$extension;
                    $dst = "uploads/".$newname;
                    move_uploaded_file($filelocation, $dst);

                  

                    $sql= "INSERT INTO files SET file_location = '$newname', users_id = '$userid', file_type = '$type', file_format = '$file_format' ";  
                    
                   
                    $this->conn->query($sql);
                    $id = $this->conn->insert_id;

                    if ($id > 0) {
                        $_SESSION['user'] = $id;
                        header("location:profile.php?status='uploaded'");
                    }else {
                        header("location:profile.php?status='uploadfailed'");
                    }
                    
                }
                
            }  
				
				
				

				
        }

        public function personalFiles($userid)
        {
            $sql = "SELECT users.firstname, users.lastname,files.id, files.file_type,files.file_format, files.file_location FROM files 
            INNER JOIN users ON users.id = files.users_id
            WHERE users_id = '$userid'";

            $result = $this->conn->query($sql);

            $items=[];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $items[] = $row;
                }
            } 
            return $items;
        }

        function viewuser($userid)
        {
            $sql = "SELECT users.firstname, users.lastname,files.id, files.file_type,files.file_format, files.file_location FROM files 
            INNER JOIN users ON users.id = files.users_id
            WHERE users_id = '$userid' AND files.file_type = 'public'";

            $result = $this->conn->query($sql);

            $items=[];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $items[] = $row;
                }
            } 
            return $items;
        }
        
        function listFilesPublic()
        {
            $sql = "SELECT users.firstname, users.lastname,files.id, files.users_id, files.file_type,files.file_format, files.file_location FROM files 
                    INNER JOIN users ON users.id = files.users_id
                    WHERE file_type = 'public'";

            $result = $this->conn->query($sql);

            $items=[];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $items[] = $row;
                }
            } 
            return $items;
        }

        function downloadFile($path)
        {
            
            $file = $path;

            if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($file).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                ob_clean();
                flush();
                readfile($file);

                
                exit;

                
            }


        }

        function deleteFiles($id, $location)
        {
            $path = "uploads/" . $location;

            unlink($path);


            $sql = "DELETE FROM files WHERE id = '$id'";

            $result = $this->conn->query($sql);



           
            if ($result == true) {
                header("location:profile.php?status='deleted'");
            }else {
                header("location:profile.php?status='deletefailed'");
            }                 
           

        }

        function editFileView($id)
        {
            $sql = "SELECT users.firstname, users.lastname,files.id, files.file_type,files.file_format, files.file_location FROM files 
            INNER JOIN users ON users.id = files.users_id
            WHERE files.id = '$id'";
            
            $result = $this->conn->query($sql);
                
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } 
                
                
            return $row;


        }

      

        function sharedusers($userid,$type,$fileid, $sharedusers)
        {
            if (!empty($sharedusers) || !empty($type)) {

                if ($type == 'public') {
                    $sql = "DELETE FROM sharedusers WHERE file_id = '$fileid'";

                    $result = $this->conn->query($sql);
                }

                
                $sql = "UPDATE files SET file_type = '$type' WHERE id = '$fileid'"; 
                $result = $this->conn->query($sql);

                
                foreach ($sharedusers as $key => $shareduser) {
                    $sql2 = "INSERT INTO sharedusers SET file_id = '$fileid', user_id = '$userid', shareduser_id = '$shareduser'"; 

                    $this->conn->query($sql2);
                    $id = $this->conn->insert_id;
                    
                }

                

                if ($result->affected_rows >= 0|| $id > 0) {
                    header("location:profile.php?status=fileupdatesuccess" );
                } else {
                    header("location:profile.php?status=fileupdatefailed" );
                }
            } 

        }

        function displaySharedUser($userid, $fileid)
        {
            $sql = "SELECT users.firstname, users.lastname, sharedusers.shareduser_id FROM sharedusers 
                    INNER JOIN users ON users.id = sharedusers.shareduser_id
                    WHERE sharedusers.file_id = '$fileid' AND sharedusers.user_id  = '$userid'";

            

            $result = $this->conn->query($sql);

            $items=[];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $items[] = $row;
                }
            } 
            return $items;
        }

        function removeshareduser($shareduserid, $fileid)
        {
            $sql = "DELETE FROM sharedusers WHERE shareduser_id = '$shareduserid' AND file_id = '$fileid'";

            $result = $this->conn->query($sql);

            

            if($result){
                header("location:edit.php?id=$fileid&status=removalsuccess");
            }else {
                header("location:edit.php?id=$fileid&status=removalfailed");
            }   
        }

        function displayprivateFiles($userid)
        {
            $sql = "SELECT users.firstname, users.lastname, sharedusers.shareduser_id, files.file_type, files.file_format, files.file_location, files.id FROM sharedusers 
                    INNER JOIN users ON users.id = sharedusers.user_id
                    INNER JOIN files ON files.id = sharedusers.file_id
                    WHERE sharedusers.shareduser_id  = '$userid'";

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