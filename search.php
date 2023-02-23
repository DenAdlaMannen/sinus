<?php


   
    if(isset($_POST["search"]))
    {
      $conn = Connection::Connection();
      
      if($conn){
        echo "connected!";
      }
    }

    echo "You did not search!";

  

  

