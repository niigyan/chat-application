const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.addEventListener("submit",function(event) {
    event.preventDefault();
});

continueBtn.onclick = ()=>{
    //the code for the ajax  starts here
    let xhr = new XMLHttpRequest();
    xhr.onload = ()=>{
        if (xhr.readyState===4 && xhr.status===200) {
            let data = xhr.response;
            if (data == "success") {
                 location.href = "users.php";  
                
            } else {
              errorText.textContent = data;
              errorText.style.display = "block";
              
            }
        }
    }
    xhr.open("POST","php/login.php",true);
    // we have to send the form data through ajax to php
    let formData = new FormData(form); // creating new formData object
    xhr.send(formData);
}