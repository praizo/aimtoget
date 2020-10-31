<?php
    require("utility.php");

    class User extends utility
    {
        
        public function fileupload($filearray)
        {
			
                $x= 0;
                foreach($filearray['designPic']['name'] as $key=>$picturename){

                    
                    $picturelocation = $_FILES['designPic']['tmp_name'][$key];
                    $picture_size = $_FILES['designPic']['size'][$key];
    
                    // $allowed_extensions = array('jpg','png','jpeg');
                    $extension = @end(explode('.',$picturename)); 

                    $error = array();

                    // if(!in_array($extension, $allowed_extensions)){
                    //     $error[] = "This extension is not allowed";
                    // }
                   
                    if($picture_size > 10000){ 
                        $error[] = "File is too large";
					}
					
                    if(empty($error)){
                        $newname = time().$x++.".".$extension;
						$dst = "designUpload/".$newname;
						move_uploaded_file($picturelocation, $dst);

						$photo[] = $newname;
						
					}
					
				}  
				
				
				

				
        }
    }


?>