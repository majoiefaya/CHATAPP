<?php
 session_start();
 if(!isset ($_SESSION['user_id'])){
header("location: login.php");
 }
?>

<?php include_once "header.php";?>


<body>
    <div class="wrapper">
        <section class="chat-area">
     
<header>
        <?php
            include_once "php/config.php";
            $user_id  = mysqli_real_escape_string($conn, $_GET['users_id']);
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id = {$user_id}");
        
            if(mysqli_num_rows($sql)>0){
                $row = mysqli_fetch_assoc($sql);
            }
            ?>

    <a class="back-icon" href="users.php"><i class="fas fa-arrow-left"></i></fas></a>
    <img src="php/image/<?php echo $row['img']?>" alt="">
    <div class="details">
        <span><?php echo $row['lname']. " " .$row['fname']?></span>
        <p><?php echo $row['status']?></p>
    </div>
</header>
<div class="chat-box">
    
    
   
</div>

<form action="" class="typing-area" autocomplete="off">
<input type="text" name ="outgoing_id" value="<?php echo $_SESSION['user_id']; ?>" hidden>
<input type="text" name ="incoming_id" value="<?php echo $user_id; ?>" hidden>
<input type="text" name = "message" class = "input-Field" placeholder="type a message here..." >
<button><i class="fab fa-telegram-plane"></i></button>
</form>
       </section>
    </div>

    <script src="javascript/chat2.js"></script>

</body>
</html>