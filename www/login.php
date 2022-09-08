
<?php
require_once 'commons/header.php';
if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    require_once 'Index.php';
 }
else
{
    require_once 'login.php';
}
 
if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
{
     $user = $_POST['username'];
     $pass = $_POST['password'];
 
    if(isset($_POST["username"]) && isset($_POST["password"])){
    $file = fopen('database/account.db', 'r');
    $good=false;
    while(!feof($file)){
        $line = fgets($file);
        $array = explode(";",$line);
    if(trim($array[0]) == $_POST['username'] && password_verify($_POST['password'], trim($array[1]))){
            $good=true;
            break;
        }
    }
 
    if($good){
    $_SESSION['user'] = $user;
        echo '<script type="text/javascript"> window.open("Index.php","_self");</script>';  
    }else{
        echo "invalid UserName or Password";
    }
    fclose($file);
    }
    else{
        require_once 'login.php';
    }
 
}
?>




<div class="container mt-5">
    <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1>Please Login</h1>
            </div>
            <div class="panel-body">
                <form class= "row g-3" action="" method="post">
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username"  id="username" placeholder="Your Username" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Your Password" required>
                    </div>
                    <div class="col-md-14">
                        <button type="submit" name="login" value="LOGIN" class="btn btn-primary">Log In</button>
                    </div>
                </form>                        
            </div>
        </div>
    </div>
</div>
<footer class="container-fluid text-center">
        <p>© 2022 Copyright: Group 33</p>
</footer>





 
