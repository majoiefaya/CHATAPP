const pswrdFild = document.querySelector(".form input[type='password'] ");
toggleBtn = document.querySelector(".form .field i");

toggleBtn.onclick =()=>{
    if (pswrdFild.type == "password"){
        pswrdFild.type = 'text';
        toggleBtn.classList.add("active");
    }
     
    else{
        pswrdFild.type = 'password';
        toggleBtn.classList.remove("active");
    }
}