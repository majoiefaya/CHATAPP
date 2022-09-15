<?php 
 session_start();
 if(isset($_SESSION['user_id'])){// if user is logged in
   header("location: users.php");

 }
?>
<?php include_once "header.php";
?>
<body>

    <div class="wrapper">
        <section class="form login">
            
            <header>Realtime chat App</header>
            
                <form action="#">

                    <div class="error-txt">this is an error message!</div>
                   
                        <div class="field input">
                            <label>Email Address</label>
                            <input name= "email" type="text" placeholder="Enter your Email">
                        </div>
                    
                        <div class="field input">
                            <label >Password</label>
                            <input  name= "password" type="password" placeholder="Enter your password">
                            <i class="fa-solid fa-eye"></i>
                        </div>        

                   
                         <div class="field button">
                             <input  type="submit" value="continue to Chat">
                         </div>
                </form>
                <div class="link">no yet signed up? <a href="index.php">Sign up now</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>