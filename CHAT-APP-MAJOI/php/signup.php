<?php
    session_start();
    include_once "config.php";

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
    //let's check user email is valid or not

   if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //if email valid
          //  let's check that email already exist in database or not
          $sql = mysqli_query($conn, "SELECT email from users where email = '{$email}' " );

          if(mysqli_num_rows($sql) > 0){ //if email already exist
               echo "$email already exist";
          }else {
              //let's check user upload file or not
              if(isset($_FILES['image'])){//if file is uploaded
                 $img_name =  $_FILES['image']['name']; //getting user uploaded img name
                 $img_type =  $_FILES['image']['type']; //getting user uploaded img type
                 $tmp_name =  $_FILES['image']['tmp_name'];// this temporary name is used to save/move file in our folder
 
                  //let's explode image and get the last  like jpj png
                  $img_explode = explode('.', $img_name);
                  $img_ext = end($img_explode);//here we get the extension of an user uploaded img file
                  
                  $extensions = ['png','jpg', 'jpeg'];//these are some valid img ext and we've store them in array
                if(in_array( $img_ext, $extensions)=== true){//if user uploaded img ext is matched with any array extensions
                     $time = time();   //this will return current time
                                       //we need this time 'cause when you uploadind user img to in oure folder we rename user file with current time
                                       //so all the image file will have a unique name
                                        //let's move the user uploded img to our particular folder

                            $new_img_name = $time.$img_name;

                           if( move_uploaded_file($tmp_name, "image/". $new_img_name)){ //if user upload img move in our folder successfully           
                                $status = 'Active now'; //once user signed up then his status will be active now
                                $random_id = rand (time(),10000);//creating random id for user

                                // let's  insert all user data inside table
                                $sql2 = mysqli_query($conn, "INSERT INTO users (user_id,fname,lname,email,password,img,status) 
                                                    VALUES ('{$random_id}','{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}') ") ;
                                if($sql2){// if data inserted 
                                    
                                    $sql3 = mysqli_query($conn, "SELECT * FROM  users WHERE  email = '{$email}'");
                                    if(mysqli_num_rows($sql3) >0 ){
                                     $row = mysqli_fetch_assoc($sql3);
                                     $_SESSION['user_id'] = $row['user_id']; //using this session we used user id in other php files
                                     
                                     echo 'success'; 
                                    }

                                }else{
                                    echo "somthing went wrong";
                                   }
                             }
                     }else{
                        echo "select an image file -jpeg, jpg, png";
                  }
                      
             }else{
                  echo "Please upload image files";
                }
          }
   }else{
         echo "$email is not a valid email";
        }

 }else
  {
    echo" all input field are riquired!";
  }



?>
