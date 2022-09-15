<?php
    session_start();
    include_once "config.php";

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
     
    if (!empty($email) && !empty($email)){
       //lets check users entered email & password matched
       $sql = mysqli_query($conn, " SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
       if(mysqli_num_rows($sql) > 0){//if users macted
            $row = mysqli_fetch_assoc($sql);
            $status = "Active now";
            // updating users status to onnline if user login successfully
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE user_id = {$row['user_id']} ");
            if ($sql2){
            $_SESSION['user_id'] = $row['user_id']; //using this session we used user id in other php files
            echo "success";
        }
        
       }else{
           echo"Email or password incorect!";
       }
        
    }else{

        echo"all input field required!";
    }

    ?>