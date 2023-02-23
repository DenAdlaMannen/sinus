<?php


   

      $conn = Connection::Connection();

        
        $items = $_POST["search"];

        $query = "select Title, Color, Price, Image from products where Title Like ?;";
        $stmt = $conn->prepare($query);

        $like = "%" . $items . "%";
        $stmt->bind_param("s", $like);
        $stmt->execute();
        $result = $stmt->get_result();

        // var_dump($result);
      

       while ($row = $result->fetch_assoc()) {
          echo $row['Title'] . $row['Color'] . $row['Price'];
          echo'<img height="300" width="300" src="'.$rows['Image'].'">';
      }

      if(1 == 1){
       echo "1 = 1";
      }
    

    echo "You did not search!";