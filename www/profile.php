<?php
session_start();
require_once 'commons/header.php';

      if(isset($_SESSION['use']))
      {
        $file = fopen('../data/account.db', 'r');
        while(!feof($file)){
            $line = fgets($file);
            $arr = explode(";",$line);
            if(strpos($line, $_SESSION['use'])  !== false && $arr[0] == 'customer' ){
                $filepath = 'uploads/'.$arr[6];
                echo '<img src="'.$filepath.'" style="width: 300px; height: 300px; background-size: cover; border-radius: 50%;">'."<br>" ;
                echo "<strong> Role: </strong>". $arr[0]."<br>";
                echo "<strong>Username: </strong>" .$arr[1]."<br>";
                echo "<strong>Name: </strong>" .$arr[3]."<br>";
                echo "<strong>Email: </strong>" .$arr[4]."<br>";
                echo "<strong>Address: </strong>" .$arr[5]."<br>";
            }
            }
      }
      else
      {
          //Print the message if the no value is assigned
          echo "No user is logged in now";
      }
?>
