<?php

session_start();

require_once 'commons/header.php';

      if(isset($_SESSION['use']))
      {
        $file = fopen("../data/account.db", "r");
        while(!feof($file)){
            $line = fgets($file);
            $arr = explode(";",$line);
            //Display customer profile after logged in
            if(strpos($line, $_SESSION['use'])  !== false && $arr[0] == 'Customer' ){
                $filepath = "../img/".$arr[6];
                echo '<img src="'.$filepath.'" style="width: 300px; height: 300px; background-size: cover; border-radius: 50%;">'."<br>" ;
                echo "<strong> Role: </strong>". $arr[0]."<br>";
                echo "<strong>Username: </strong>" .$arr[1]."<br>";
                echo "<strong>Name: </strong>" .$arr[3]."<br>";
                echo "<strong>Email: </strong>" .$arr[4]."<br>";
                echo "<strong>Address: </strong>" .$arr[5]."<br>";
                echo "<br>";
                echo '<button type="button" class="btn btn-danger"><a class="link-light" href="logout.php">Log Out</a></li></button>';
                $_SESSION['user']['username'] = $arr[1];
                $_SESSION['user']['address'] = $arr[5];
            }
            //Display vendor profile after logged in
            if(strpos($line, $_SESSION['use'])  !== false && $arr[0] == 'Vendor' ){
                $filepath = '../img/'.$arr[5];
                echo '<img src="'.$filepath.'" style="width: 300px; height: 300px; background-size: cover; border-radius: 50%;">'."<br>" ;
                echo "<strong> Role: </strong>". $arr[0]."<br>";
                echo "<strong>Username: </strong>" .$arr[1]."<br>";
                echo "<strong>Business Name: </strong>" .$arr[3]."<br>";
                echo "<strong>Bussiness Address: </strong>" .$arr[4]."<br>";
                echo "<br>";
                echo '<button type="button" class="btn btn-danger"><a class="link-light" href="logout.php">Log Out</a></button>';
                $_SESSION['user']['username'] = $arr[1];
                $_SESSION['user']['address'] = $arr[4];
            }
            //Display shipper profile after logged in
            if(strpos($line, $_SESSION['use'])  !== false && $arr[0] == 'Shipper' ){
                $filepath = '../img/'.$arr[4];
                echo '<img src="'.$filepath.'" style="width: 300px; height: 300px; background-size: cover; border-radius: 50%;">'."<br>" ;
                echo "<strong> Role: </strong>". $arr[0]."<br>";
                echo "<strong>Username: </strong>" .$arr[1]."<br>";
                echo "<strong>Distribution Hub: </strong>" .$arr[3]."<br>";
                echo "<br>";
                echo '<button type="button" class="btn btn-danger"><a class="link-light" href="logout.php">Log Out</a></li></button>';
                $_SESSION['user']['username'] = $arr[1];
                $_SESSION['user']['hub'] = $arr[3];
            }
            }
      }
      else
      {
          //Print the message if the no value is assigned
          echo "No user is logged in now";
      }
?>
<footer class="container-fluid text-center">
                <ul class="nav justify-content-center border-bottom pb-1 mb-1">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Privacy</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Help</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                </ul>
                <p class="text-center text-muted">© 2022 Copyright: Group 33</p>
</footer>