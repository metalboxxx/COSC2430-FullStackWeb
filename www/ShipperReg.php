<?php 
    require_once 'commons/header.php';
    require 'file_handling/hubs_file_handling.php';
?>
<?php
if(isset($_POST["username"],$_POST["password"],$_POST["hub"]))
{
    // check if user exist.
    $file=fopen("../data/account.db","r");
    $finduser = false;
    while(!feof($file))
    {
        $line = fgets($file);
        $array = explode(";",$line);
        if(trim($array[0]) != "" && trim($array[1]) == $_POST['username']  )
        {
            $finduser=true;
            break;
        }
    }
    fclose($file);
 
    
    $target_path = "img/";
    $og_file = $_FILES["profilePicture"]["name"];
    $upload_file = move_uploaded_file($_FILES['profilePicture']['tmp_name'], $target_path.$og_file);

    //Existed username announce
    if( $finduser )
    {
        echo $_POST["username"];
        echo ' existed!';
        require_once 'ShipperReg.php';
    }
    else
    {   //Create account
        if(preg_match('/^[a-zA-Z0-9]{8,15}$/', $_POST["username"]) && preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*,])[A-Za-z\d!@#$%^&*,]{8,20}$/', $_POST["password"]) && $_POST["hub"]){
            $file = fopen("../data/account.db", "a");
            fputs($file,"Shipper;".$_POST["username"].";".password_hash($_POST["password"], PASSWORD_DEFAULT).";".$_POST["hub"].";".$og_file."\r\n");
            fclose($file);
            echo "Shipper account: ".$_POST["username"];
            echo " registered successfully!";  
        }
        else{
            echo "Create account failed";      
        }
 
    }
}
else
{
    require_once 'ShipperReg.php';
}
?>
<html>
<body>
    <script src="register.js"></script>
	<div class="container mt-5">
        <div class="row col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Register as Shipper</h1>
                    Create a <a href="VendorReg.php" class="link-primary">Vendor</a> or <a href="CustomerReg.php" class="link-primary">Customer</a> Account
                </div>
                </br>
                <div class="panel-body">
                    <form class= "row g-3" onsubmit="return ShipperRegisterValidate();"  method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username" class="form-label">Username <span style="color: red;" id="errorUserName">(*)</span></label> 
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password <span style="color: red;" id="errorPassword">(*)</span></label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="profilePicture" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="profilePicture" name ="profilePicture" alt="Profile Image">
                        </div>
                        <div class="form-group">
                            <label for="hub" class="form-label">Choose your Distribution Hub</label>
                            <select class="form-select" aria-label="Default select example" name="hub" id="hub">
                            <?php
                                load_hubs_data();
                                foreach ($_SESSION['hubs'] as $onehub) {
                                    $nameOfHub = $onehub['name'];
                                    echo "<option value=$nameOfHub>$nameOfHub</option>";
                                }
                            ?>
                            </select>
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
</body>
</html>
<?php
require_once 'commons/footer.php'
?>