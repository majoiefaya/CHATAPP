const SearchBar = document.querySelector(".users .search input"),

 SearchBnt = document.querySelector(".users .search button "),

 userList = document.querySelector(".users .users-list ");

//SearchBar animation
 SearchBnt.onclick =()=> {
     SearchBar.classList.toggle("active");
     SearchBar.focus();
     SearchBnt.classList.toggle("active");
     SearchBar.value ="";
 }

//users list searching

SearchBar.onkeyup = ()=> {
    let SearchTerm = SearchBar.value;
    if(SearchTerm !=""){
        SearchBar.classList.add("active");
    }else{
        SearchBar.classList.remove("active");
    }
    // let's start Ajax 
let xhr = new XMLHttpRequest(); //creating  XML object
xhr.open("POST", "Serveur/UserSearch.php", true);
xhr.onload = () =>{
   if(xhr.readyState === XMLHttpRequest.DONE ){
       if(xhr.status === 200){
           let data = xhr.response;
           userList.innerHTML = data;
        
           
       } 
   }
}

xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
xhr.send("SearchTerm=" + SearchTerm);

}


//users list dynamic
 setInterval(()=>{
//let's start Ajax
let xhr = new XMLHttpRequest(); //creating  XML object
xhr.open("GET", "php/users.php", true);
xhr.onload = () =>{
    if(xhr.readyState === XMLHttpRequest.DONE ){
        if(xhr.status === 200){
            let data = xhr.response;
           
            if(!SearchBar.classList.contains("active")){
                userList.innerHTML = data;
               }
         
            
        } 
    }
}

 xhr.send();

 },500 );// this fuction will frequently after 500ms