
let pass1 = document.getElementById("password");
let pass2 = document.getElementById("confirm-password");

let displayValidStatus = () =>{
    let status = document.createElement('p');
    status.id="password-status"; //could be wrong
    let message = document.createTextNode("Passwords Match");
    status.appendChild(message);
    pass2.insertAdjacentElement("afterend", status);
   
}

let hideValidStatus = () =>{
    let pass = document.getElementById("password-status");
    if(pass != undefined){
        pass.remove();
    }
}

let colorStatus = () =>{
    let status = document.getElementById("password-status");
    if(status != undefined){
        let pass1Value = document.getElementById("password").value;
        let pass2Value = document.getElementById("confirm-password").value;
        if(pass1Value != pass2Value){
            status.style.color = "red";
        }
        else{
            status.style.color = "green";
        }
}
}


pass2.addEventListener("focusin", displayValidStatus);
pass2.addEventListener("focusout", hideValidStatus);
pass2.addEventListener("input", colorStatus);

function compare(e) {
    let pass1 = document.getElementById("password").value;
    let pass2 = document.getElementById("confirm-password").value;
    console.log(pass1, pass2);
    if(pass1 != pass2){
        e.preventDefault();
    }
}

//check if password and confirm password fields match
let registerForm = document.getElementById("registration-form");

if (registerForm) {
    registerForm.addEventListener("submit", function(e){
        let pass1 = document.getElementById("password").value;
        let pass2 = document.getElementById("confirm-password").value;
        if(pass1 != pass2){
            e.preventDefault();
        }
    });
}

let changePassForm = document.getElementById('change-password-form');
if (changePassForm) {
    changePassForm.addEventListener("submit", function(e) {
        let pass1 = document.getElementById("password").value;
        let pass2 = document.getElementById("confirm-password").value;
        if(pass1 != pass2){
            e.preventDefault();
        }
    });
}