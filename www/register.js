

function FormValidate(){
    var username = document.getElementById('username').value;
    var errorUserName = document.getElementById('errorUserName');
    var regexName = /^[a-zA-Z0-9]{8,15}$/;

    var name = document.getElementById('name').value;
    var errorName = document.getElementById('errorName');

    var password = document.getElementById('password').value;
    var errorPassword = document.getElementById('errorPassword');
    var regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*,])[A-Za-z\d!@#$%^&*,]{8,20}$/;

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
        errorPassword.innerHTML = "Contains at least one upper case letter, at least one lower case letter, at least one digit, at least one special letter in the set !@#$%^&*, and has a length from 8 to 20 characters";
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
        // Ng?????i d??ng ???? nh???p ????ng th??ng tin
        window.location.href= "CustomerReg.php";

        return true;
    }else{

    }

    return false;
}


function VendorRegisterValidate(){
    var username = document.getElementById('username').value;
    var errorUserName = document.getElementById('errorUserName');
    var regexName = /^[a-zA-Z0-9]{8,15}$/;
    var password = document.getElementById('password').value;
    var errorPassword = document.getElementById('errorPassword');
    var regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*,])[A-Za-z\d!@#$%^&*,]{8,20}$/;
    var bname = document.getElementById('bsname').value;
    var errorBussinessName = document.getElementById('errorBussinessName');
    var badd = document.getElementById('bsadd').value;
    var errorBussinessAddress = document.getElementById('errorBussinessAddress');

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
        errorPassword.innerHTML = "Contains at least one upper case letter, at least one lower case letter, at least one digit, at least one special letter in the set !@#$%^&*, and has a length from 8 to 20 characters";
        return false;
    }else{
        errorPassword.innerHTML = '';
    }

    if (bname == '' || bname == null) {
        errorBussinessName.innerHTML = "Empty Name!";
        return false;

    }else if(!reGexChar.test(bname)){
        errorBussinessName.innerHTML = "Your bussiness name must be more than 5 characters";
        return false;
    }else{
        errorBussinessName.innerHTML = '';
    }
    if (badd == '' || badd == null) {
        errorBussinessAddress.innerHTML = "Empty Address!";
        return false;
    }else if(!reGexChar.test(badd)){
        errorBussinessAddress.innerHTML = "5 or more characters required!";
        return false;
    }else{
        errorBussinessAddress.innerHTML = '';
    }
    if (username && bname && badd && password) {
        // Ng?????i d??ng ???? nh???p ????ng th??ng tin
        alert("Created account successfully!");
        window.location.href= "VendorReg.php";
        return true;
    }else{

    }
    return false;
}

function ShipperRegisterValidate(){
    var username = document.getElementById('username').value;
    var errorUserName = document.getElementById('errorUserName');
    var regexName = /^[a-zA-Z0-9]{8,15}$/;
    var password = document.getElementById('password').value;
    var errorPassword = document.getElementById('errorPassword');
    var regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*,])[A-Za-z\d!@#$%^&*,]{8,20}$/;

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
        errorPassword.innerHTML = "Contains at least one upper case letter, at least one lower case letter, at least one digit, at least one special letter in the set !@#$%^&*, and has a length from 8 to 20 characters";
        return false;
    }else{
        errorPassword.innerHTML = '';
    }
    if (username && password) {
        window.location.href= "ShipperReg.php";
        return true;
    }else{

    }
    return false;
}