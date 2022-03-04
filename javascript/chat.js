 const  form = document.querySelector(".typing-area"),
 inputField = form.querySelector(".input-field"),
 chatBox = document.querySelector(".chat-box");
 sendBtn = form.querySelector("button");

 form.addEventListener("submit",function(event) {
    event.preventDefault();
});

 sendBtn.onclick = ()=>{
     let xhr = new XMLHttpRequest();
    xhr.onload = ()=>{
        if (xhr.readyState===4 && xhr.status===200) {
               inputField.value = ""; // once message inserted into database the input field becomes empty
              
            }
        }
    
    xhr.open("POST","php/insert-chat.php",true);
    // we have to send the form data through ajax to php
    let formData = new FormData(form); // creating new formData object
    xhr.send(formData);
}


setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.onload = ()=>{
        if (xhr.readyState===4 && xhr.status===200) {
            let data = xhr.response;
            chatBox.innerHTML = data;
           
        }
    } 
    xhr.open("POST","php/get-chat.php",true);
    let formData = new FormData(form); // creating new formData object
    xhr.send(formData);
},500 );