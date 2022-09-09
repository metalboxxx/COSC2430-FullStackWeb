<?php 
    require_once 'header.php'
?>
<?php
if(isset($_POST["username"],$_POST["password"],$_POST["hub"]))
{
    // check if user exist.
    $file=fopen("database/account.db","r");
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
        require_once 'ShipperReg.php';
    }
    else
    {
        if(preg_match('/^[a-zA-Z0-9]{8,15}$/', $_POST["username"]) && preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}/', $_POST["password"]) && $_POST["hub"]){
            $file = fopen("database/account.db", "a");
            fputs($file,"Shipper;".$_POST["username"].";".password_hash($_POST["password"], PASSWORD_DEFAULT).";".$_POST["hub"].";".$og_file."\r\n");
            fclose($file);
            echo "Shipper account".$_POST["username"];
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

<body>
    <script src="register.js"></script>
	<div class="container mt-5">
        <div class="row col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Register as Shipper</h1>
                </div>
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
                                <option value="HUB 1">One</option>
                                <option value="HUB 2">Two</option>
                                <option value="HUB 3">Three</option>
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
    <footer class="container-fluid text-center">
    <p>© 2022 Copyright: Group 33</p>
</body>
