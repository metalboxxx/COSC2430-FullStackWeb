<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css" type="text/css">
</head>


<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>                       
        </button>
            <a class="navbar-brand" href="#">LAZADA</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="ViewProducts.php">Shopping</a></li>
                    <?php
                        if (isset($_SESSION["use"])) {
                            echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="profile.php">Profile</a></li>';
                            echo '<li class="nav-item"><a class="nav-link active" href="logout.php">Log Out</a></li>';
                        } else{
                            echo '<li class="nav-item"><a class="nav-link active" href="login.php">Login</a></li>';
                            echo '<li class="nav-item"><a class="nav-link active" href="CustomerReg.php">Register</a></li>';
                        }
                    ?>                  
                </ul>
        </div>
    </div>
</nav>







