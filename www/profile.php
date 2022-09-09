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
            }
            }
      }
      else
      {
          //Print the message if the no value is assigned
          echo "No user is logged in now";
      }
?>