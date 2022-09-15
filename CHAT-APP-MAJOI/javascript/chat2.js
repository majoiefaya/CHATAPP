const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-Field"),
sendBtn = form.querySelector("button");
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) =>{
    e.preventDefault();  //preventing form from submitting
}

sendBtn.onclick = ()=>{
    //let's start Ajax
    let xhr = new XMLHttpRequest(); //creating  XML object
    xhr.open("POST", "php/insert-chats.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE ){
            if(xhr.status === 200){
                inputField.value = "";//once message inserted into database then leave blank the input field
                scrollToBottom();
            } 
        }

    }
    //let send the form data through ajax to php
    let formData = new FormData(form); //creating new formData Object
    xhr.send(formData); //sending the form data to php
}
chatBox.onmouseenter = () =>{
    chatBox.classList.add("active");
}
chatBox.onmouseleave = () =>{
    chatBox.classList.remove("active");
}



//chat-box dynamic
setInterval(()=>{
    //let's start Ajax
    let xhr = new XMLHttpRequest(); //creating  XML object
    xhr.open("POST", "php/get-chats.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE ){
            if(xhr.status === 200){
                let data = xhr.response;
               
                chatBox.innerHTML = data;
               if(!chatBox.classList.contains("active")){// if active class not contains in chatbox the scroll to bottom
                scrollToBottom();
               }
             
                
            } 
        }
    }

    //let send the form data through ajax to php
    let formData = new FormData(form); //creating new formData Object
    xhr.send(formData); //sending the form data to php
     },500 );// this fuction will frequently after 500ms

     function scrollToBottom(){
         chatBox.scrollTop = chatBox.scrollHeight;
     }