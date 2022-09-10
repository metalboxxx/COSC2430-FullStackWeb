function productValidate(){
    var name = document.getElementById('name_product_input').value;
    var errorName = document.getElementById('errorName');
    var price = document.getElementById('price_product_input').value;
    var errorPrice = document.getElementById('errorPrice');
    var regexName = /^[a-zA-Z]{10,20}$/;

    if (name == '' || name == null) {
        errorName.innerHTML = "Please fill in this field!";
        return false;

    }else if(!regexName.test(name)){
        errorName.innerHTML = "Your product name must contain only letters (lower and upper case), has a length from 10 to 20 characters";
        return false;
    }else{
        errorName.innerHTML = '';
    }

    if (price == '' || price == null) {
        errorPrice.innerHTML = "Please fill in this field!";
        return false;
    } else if(price <= 0){
        errorPrice.innerHTML = "Price must be bigger than 0";
        return false;
    } else {
        errorPrice.innerHTML = '';
    }

    if (name && price) {
        // Người dùng đã nhập đúng thông tin
        window.location.href= "VendorViewProducts.php";

        return true;
    }else{
        return false;
    }

    
}