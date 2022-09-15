<?php
    session_start();
    $outgoing_id = $_SESSION['user_id'];

   include_once "config.php";
 
   $SearchTerm = mysqli_real_escape_string($conn, $_POST['SearchTerm']);
   $output ="";

   $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT user_id = {$outgoing_id} AND (fname LIKE '%{$SearchTerm}%' OR lname LIKE '%{$SearchTerm}%') ");
    if(mysqli_num_rows($sql) >0 ){
      include "data.php";

    }else{
       $output .='No users found related to your search term';
    }
    echo $output;
?>