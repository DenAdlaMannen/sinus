

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Info</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<style>
    .flex-container {
        display: flex;
        justify-content: center;
    }
    .flex-container > div {
        height: 10vh;
        width: auto; 
        margin: 1em;
    }
    .cartForm { margin: 2em; }
</style>
</head>
<body>
    <?php
function ViewOtherColors($CategoryID, $ProductID ) {
        $conn = Connection::Connection();
        
        /* create a prepared statement */
        $stmt = $conn->prepare("SELECT  `ProductID`, `Title`, `CategoryID`, `Color`, `Price`, `Image` 
                                FROM `products` 
                                WHERE CategoryID = $CategoryID
                                ;");



            /* execute query */
            $stmt->execute();
            /* bind result variables */
            $result = $stmt->get_result();
            ?>
            <div class="flex-container">
            <?php while($row = $result->fetch_assoc()) { ?>
            
               <?php if ($row['ProductID'] != $ProductID){?>
                        <div> 
                            <img height="100%" src="sinusmaterial/sinus assets/products/<?php echo $row["Image"]?>">
                            <form method="POST" action="productInfo.php"> 
                            <input type="submit" class="btn btn-outline-secondary" value="Details" >
                            <input type="hidden" name="id" value="<?php echo $row["ProductID"]; ?>"/>
                             </form>
                        </div>
                        <?php }} ?>
            
            </div>
            <?php } ?>
             
 





    
   


</body>
</html>


        
    
         
 