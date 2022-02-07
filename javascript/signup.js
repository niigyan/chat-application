const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input");

form.onsumbit = (e)=>{
    e.preventDefault();//preventing the form from submitting
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.onload = ()=>{
        if (xhr.readyState===XMLHttpRequest.DONE && xhr.status===200) {
            let data = xhr.response;
            console.log(data);
        }
    }
    xhr.open("POST","php/signup.php",true);
    // we have to send the form data through ajax to php
    let formData = new FormData(form); // creating new formData object
    xhr.send(formData);
}