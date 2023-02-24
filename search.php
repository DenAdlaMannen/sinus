<?php


   

      $conn = Connection::Connection();

        
        $items = $_POST["search"];

        $query = "select Title, Color, Price, Image, ProductID from products where Title Like ?;";
        $stmt = $conn->prepare($query);

        $like = "%" . $items . "%";
        $stmt->bind_param("s", $like);
        $stmt->execute();



        $users = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); 
        // var_dump($result);
      

       foreach ($users as $row) 
        
        {

      ?>
        <style> 
        .productFlexBox {
            display: flex;
            justify-content: center;
            flex-flow: row-reverse wrap;
            background-color: white;
        } 
        .card {
            margin: 2em;
            border: none;
        }
        </style>

      <div class="card" style="width: 18rem;">
        <img src="sinusmaterial/sinus assets/products/hoodie-fire.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h4 class="card-title"><?php echo $row["Title"]; ?> </h4>
            <hr>
            <h6 class="card-title">Color:<?php echo $row["Color"];?></h6>
            <h6 class="card-title"><?php echo $row["Price"]; ?> kr</h6>
             
             <form method="POST" action="productInfo.php"> 
                <input type="submit" name="Details">
                <input type="hidden" name="id" value="<?php echo $row['ProductID']; ?>"/>
            </form>
        </div>

      </div>
<?php
}
?>