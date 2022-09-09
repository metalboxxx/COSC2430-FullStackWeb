<?php 
    require_once 'commons/header.php';
?>

<?php

if(isset($_POST["username"],$_POST["password"],$_POST["bsname"],$_POST["bsadd"]))
{
    // check if user exist.
    $file=fopen("../data/account.db","r");
    $finduser = false;
    $bname = false;
    $badd = false;
    while(!feof($file))
    {
        $line = fgets($file);
        $array = explode(";",$line);
        if(trim($array[0]) != "" && trim($array[1]) == $_POST['username']  )
        {
            $finduser=true;
            break;
        }
        if(trim($array[3] ?? '', ' ') == $_POST['bsname'] ){
            $bname = true;
        }
        if(trim($array[0]) == "Vendor" && trim($array[4] ?? '', ' ') == $_POST['bsadd'] ){
            $badd = true;
        }

    }
    fclose($file);
 
    // register user or pop up message
    $target_path = "img/";
    $og_file = $_FILES["profilePicture"]["name"];
    $upload_file = move_uploaded_file($_FILES['profilePicture']['tmp_name'], $target_path.$og_file);

    // $directory = 'uploads/';
    // move_uploaded_file($og_file, $directory);
    if( $finduser)
    {
        echo 'Username: '.$_POST["username"].' ';
        echo ' existed!';
        require_once 'VendorReg.php';
    }
    else if( $bname )
    {
        echo 'Business name: '. $_POST["bsname"].' ';
        echo ' existed!';
        require_once 'VendorReg.php';
    }
    else if( $badd )
    {
        echo 'Business Address: '. $_POST["bsadd"].' ';
        echo 'existed!';
        require_once 'VendorReg.php';
    }
    else
    {
        if(preg_match('/^[a-zA-Z0-9]{8,15}$/', $_POST["username"]) && preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}/', $_POST["password"]) && preg_match('/^.{5,}$/', $_POST["bsname"]) && preg_match('/^.{5,}$/', $_POST["bsadd"]) ){
            $file = fopen("../data/account.db", "a");
            fputs($file,"Vendor;".$_POST["username"].";".password_hash($_POST["password"], PASSWORD_DEFAULT).";".$_POST["bsname"].";".$_POST["bsadd"].";".$og_file."\r\n");
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
    require_once 'VendorReg.php';
}
?>

<body>
    <script src="register.js"></script>
	<div class="container mt-5">
        <div class="row col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Register as Vendor</h1>
                    Create a <a href="CustomerReg.php" class="link-primary">Customer</a> or <a href="ShipperReg.php" class="link-primary">Shipper</a> Account

                </div>
                <div class="panel-body">
                    <form class= "row g-3" onsubmit="return VendorRegisterValidate();"  method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username" class="form-label">Username <span style="color: red;" id="errorUserName">(*)</span></label> 
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password <span style="color: red;" id="errorPassword">(*)</span></label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="bsname" class="form-label">Bussiness Name <span style="color: red;" id="errorBussinessName">(*)</span></label>
                            <input type="text" class="form-control" id="bsname" name="bsname">
                        </div>
                        <div class="form-group">
                            <label for="bsadd" class="form-label">Bussiness Address <span style="color: red;" id="errorBussinessAddress">(*)</span></label>
                            <input type="text" class="form-control" id="bsadd" name="bsadd">
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
    <footer class="container-fluid text-center"  style='position: relative;'>
                <ul class="nav justify-content-center border-bottom pb-1 mb-1 ">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Privacy</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Help</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                </ul>
                <p class="text-center text-muted">© 2022 Copyright: Group 33</p>       
    </footer>
</body>

