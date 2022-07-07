
let registerForm = document.getElementById("registration-form");
let pass1 = document.getElementById("password");
let pass2 = document.getElementById("confirm-password");

let displayValidStatus = () =>{
    let status = document.createElement('p');
    status.id="password-status"; //could be wrong
    let message = document.createTextNode("Passwords Match");
    status.appendChild(message);
    pass2.insertAdjacentElement("afterend", status);
    let pass1Value = document.getElementById("password").value;
    let pass2Value = document.getElementById("confirm-password").value;
    if(pass1Value != pass2Value){
        status.style.color = "red";
    }
    else{
        status.style.color = "green";
    }
}

let hideValidStatus = () =>{
    let pass = document.getElementById("password-status");
    if(pass != undefined){ //could be wrong
        pass.remove();
    }
}




pass2.addEventListener("focusin", displayValidStatus);
pass2.addEventListener("focusout", hideValidStatus);
pass2.addEventListener("input", displayValidStatus);

//check if password and confirm password fields match
registerForm.addEventListener("submit", function(e){
    let pass1 = document.getElementById("password").value;
    let pass2 = document.getElementById("confirm-password").value;
    if(pass1 != pass2){
        e.preventDefault();
    }
});


