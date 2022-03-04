<?php 
 session_start();
 include_once "config.php";
 $fname = mysqli_real_escape_string($conn,$_POST["fname"]);
 $lname = mysqli_real_escape_string($conn,$_POST["lname"]);
 $email = mysqli_real_escape_string($conn,$_POST["email"]);
 $password = mysqli_real_escape_string($conn,$_POST["password"]);

 if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
     //let us check user email is valid or not 
     if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
         //let check that email already exist in the database or not 
         $sql = mysqli_query($conn,"SELECT email FROM users  WHERE email = '{$email}' ");
         if (mysqli_num_rows($sql)>0) {// if email already exists
             echo "$email - This email already exists";
         }
          else {
             //let us check user upload file or not
             if (!basename($_FILES["image"]["name"])==null) {
                   $img_name = $_FILES['image']['name'];//getting user uploaded img name
                   $tmp_name = $_FILES['image']['tmp_name'];// this temporary name is used to save or move file in our folder

                   //let us explode iage and get the last extension like jpeg png
                   $img_name1 = "images/" . basename($_FILES["image"]["name"]);
                   $img_ext = strtolower(pathinfo($img_name1,PATHINFO_EXTENSION));//getting the extension of the file
                   

                   $extensions = ['png','jpeg','jpg']; //these are some valid img ext  stored in an array

                   if (in_array($img_ext, $extensions)==true) { // if the user upload extensions are matched
                        $time = time();//returns the current time
                    //the time will used to rename the file in the folder making all the file to have a unique name
                    $new_img_name = $time.$img_name;
                    if (move_uploaded_file($tmp_name, "images/".$new_img_name)) {//if user upload the img successful to the folder
                        $status = "Active now";//once user signed up then his status will be active now
                        $random_id = rand(time(),10000000);//creating a random id for the user

                        //inserting data into the user table
                        $sql2=mysqli_query($conn,"INSERT INTO users (unique_id, fname, lname, email, password, img, status) 
                          VALUES ('{$random_id}', '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                        if ($sql2) {//data is inserted

                              $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' ");
                              if (mysqli_num_rows($sql3) > 0) {
                                  $row = mysqli_fetch_assoc($sql3);
                                  $_SESSION['unique_id'] = $row['unique_id'];
                                  echo "success";
                              } 
                              
                        } else {
                            echo "Something went wrong!";
                        }
                        
                    } 
        
                       
                   } else {
                       echo " Please select an Image file - png, jpeg, jpg!!";
                   }


             } else {
                  echo "Please select an image file";
             }

            }

     } else {
         echo "$email  - This is not a valid email";
     }
 } else {
     echo "All input field are required!";
 }

?>