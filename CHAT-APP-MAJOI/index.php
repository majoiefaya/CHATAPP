<?php include_once "header.php";
?>
<body>
    <i class="eye"></i>
    <div class="wrapper">
        <section class="form signup">
            <header>Realtime chat App</header>
                <form action="#" enctype='multipart/form-data'>
                    <div class="error-txt"></div>
                    <div class="name-details">
                        <div class="field input">
                            <label>First Name</label>
                            <input name="fname" type="text" placeholder="First Name" required>
                        </div>
                    
                        <div class="field input">
                            <label >Last Name</label>
                            <input  type="text" placeholder="Last Name" name="lname" required>
                        </div>
                    </div>
                        <div class="field input">
                            <label>Email Address</label>
                            <input  type="text" placeholder="Enter your Email" name="email" required>
                        </div>
                    
                        <div class="field input">
                            <label >Password</label>
                            <input  type="password" placeholder="Enter your password"  name="password" required>
                            <i class="fa-solid fa-eye"></i>
                        </div>        

                   
                        <div class="field image" require>
                            <label >Select Image</label>
                             <input type="file"  name="image" >
                        </div>

                         <div class="field button">
                             <input type="submit" value="continue to Chat">
                         </div>
                </form>
                <div class="link">Already signed up? <a href="login.php">login now</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>
</body>
</html>