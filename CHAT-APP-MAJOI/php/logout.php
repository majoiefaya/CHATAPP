<?php
    session_start();
    if(isset($_SESSION['user_id'])){// if user is logged out then cometothis page otherwise go to login page 
         include_once "config.php";
         $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
         if(isset($logout_id)){//if logout is set
            $status = "offline now";
            //once user logout the will update  this status to offline and in the login form
            // we'll again update the staus to active if user logged in successfully
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE user_id = {$logout_id} ");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
        
        }else{
            header("location: ../users.php");
        }

    }else{
        header("location: ../login.php");
    }

?>