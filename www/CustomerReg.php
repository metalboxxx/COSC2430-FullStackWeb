<?php 
    require_once 'commons/header.php';

   
?>

<body>
    <script src="register.js"></script>
	<div class="container mt-5">
        <div class="row col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Register as Customer</h1>
                </div>
                <div class="panel-body">
                    <form class= "row g-3" onsubmit="return FormValidate();" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username" class="form-label">Username <span style="color: red;" id="errorUserName">(*)</span></label> 
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password <span style="color: red;" id="errorPassword">(*)</span></label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Name <span style="color: red;" id="errorName">(*)</span></label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email <span style="color: red;" id="errorEmail">(*)</span></label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="address" class="form-label">Address <span style="color: red;" id="errorAddress">(*)</span></label>
                            <input type="text" class="form-control" id="address" name = "address">
                        </div>
                        
                        <div class="form-group">
                            <label for="profilePicture" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="profilePicture" name ="profilePicture">
                        </div>
                       
                        <div class="col-md-14">
                            <button type="submit" class="btn btn-primary" id="submit">Create account</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </form>
                </div>               
            </div>
        </div>   
    </div>
    <footer class="container-fluid text-center">
    <p>© 2022 Copyright: Group 33</p>
</body>


<?php

if(isset($_POST["username"],$_POST["password"],$_POST["name"],$_POST["email"],$_POST["address"]))
{
    // check if user exist.
    $file=fopen("database/account.db","r");
    $finduser = false;
    while(!feof($file))
    {
        $line = fgets($file);
        $array = explode(";",$line);
        if(trim($array[1]) == $_POST['username'] && trim($array[0]) != "" )
        {
            $finduser=true;
            break;
        }
    }
    fclose($file);
 
    // register user or pop up message
    $target_path = "uploads/";
    $og_file = $_FILES["profilePicture"]["name"];
    $upload_file = move_uploaded_file($_FILES['profilePicture']['tmp_name'], $target_path.$og_file);

    // $directory = 'uploads/';
    // move_uploaded_file($og_file, $directory);
    if( $finduser )
    {
        echo $_POST["username"];
        echo ' existed!';
        require_once 'CustomerReg.php';
    }
    else
    {
        if(preg_match('/^[a-zA-Z0-9]{8,15}$/', $_POST["username"]) && preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}/', $_POST["password"]) && preg_match('/^.{5,}$/', $_POST["name"]) && preg_match('/^.{5,}$/', $_POST["email"]) && preg_match('/^.{5,}$/', $_POST["address"])){
            $file = fopen("database/account.db", "a");
            fputs($file,"customer;".$_POST["username"].";".password_hash($_POST["password"], PASSWORD_DEFAULT).";".$_POST["name"].";".$_POST["email"].";".$_POST["address"].";".$og_file."\r\n");
            fclose($file);
            echo $_POST["username"];
            echo " registered successfully!";  
        }
        else{
            echo "Create account failed";      
        }
 
    }
}
else
{
    require_once 'CustomerReg.php';
}
?>