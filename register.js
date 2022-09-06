

function FormValidate(){
    var username = document.getElementById('username').value;
    var errorUserName = document.getElementById('errorUserName');
    var regexName = /^[a-zA-Z0-9]{8,15}$/;

    var name = document.getElementById('name').value;
    var errorName = document.getElementById('errorName');

    var password = document.getElementById('password').value;
    var errorPassword = document.getElementById('errorPassword');
    var regexPassword = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}/;

    var address = document.getElementById('address').value;
    var errorAddress = document.getElementById('errorAddress');

    var email = document.getElementById('email').value;
    var errorEmail = document.getElementById('errorEmail');
    var reGexChar = /^.{5,}$/;


 
    
    if (username == '' || username == null) {
        errorUserName.innerHTML = "Please fill in this field!";
        return false;

    }else if(!regexName.test(username)){
        errorUserName.innerHTML = "Your username must contain only letters (lower and upper case) and digits, has a length from 8 to 15 characters";
        return false;
    }else{
        errorUserName.innerHTML = '';
    }
    
    if (password == '' || password == null) {
        errorPassword.innerHTML = "Empty Password!";
        return false;

    }else if(!regexPassword.test(password)){
        errorPassword.innerHTML = "Password must be from 8 to 20 characters. Each password must contain at least 1 lower case letter, at least 1 upper case letter, at least 1 digit!";
        return false;
    }else{
        errorPassword.innerHTML = '';
    }

    if (name == '' || name == null) {
        errorName.innerHTML = "Empty Name!";
        return false;

    }else if(!reGexChar.test(name)){
        errorName.innerHTML = "Your name must be more than 5 characters";
        return false;
    }else{
        errorName.innerHTML = '';
    }



    if (email == '' || email == null) {
        errorEmail.innerHTML = "Empty Email!";
        return false;

    }else if(!reGexChar.test(email)){
        errorEmail.innerHTML = "Please type the correct form of email!";
        return false;
    }else{
        errorEmail.innerHTML = '';
    }

    if (address == '' || address == null) {
        errorAddress.innerHTML = "Empty Address!";
        return false;
    }else if(!reGexChar.test(address)){
        errorAddress.innerHTML = "5 or more characters required!";
        return false;
    }else{
        errorAddress.innerHTML = '';
    }


    if (username && name && email && password) {
        // Người dùng đã nhập đúng thông tin
        alert("Created account successfully!");
        window.location.href= "CustomerReg.php";

        return true;
    }else{

    }

    return false;
}