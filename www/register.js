
function validatePassword(){
    let password = document.getElementById("password").value;
    let confirm_password = document.getElementById("repass").value;
    let message = document.getElementById("message");

    console.log(password, confirm_password);
    if(password.length != 0){
        if(password == confirm_password){
            message.textContent = "Password match";
            message.style.backgroundColor = "#3ae374";
        } else{
            message.textContent = "Password do not match";
            message.style.backgroundColor = "#ff4d4d";
        }
    }
    else{
        alert("Empty password!");
        message.textContent="";
    }
}
