<?php


   
    if(isset($_POST["search"]))
    {
      $conn = Connection::Connection();
      
      if($conn){
        
        $items = $_POST["search"];
        $query = "select * from products where Title Like ?;";
        $run = $mysqli->prepare($conn, $query);

        if($run == TRUE)
        {

        }

      }
    }

    echo "You did not search!";