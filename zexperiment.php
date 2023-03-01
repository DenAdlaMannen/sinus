
<?php Function viewFilterCategories() {
    include_once 'connection.php';
    $connMenu = Connection::Connection();
  
    $query = "SELECT DISTINCT CategoryName
              FROM category";
    $result = mysqli_query($connMenu, $query);
    $categories = array();?>
    

  <?php while (($row = mysqli_fetch_assoc($result))) { ?>
    <?php if($row['CategoryName'] != Null) { ?> 
      <?php array_push($categories, $row['CategoryName']);
    }
  }
  return $categories;
}?>


<?php Function viewFilterColors() { 
$connMenu = Connection::Connection();

$query = "SELECT DISTINCT Color
               FROM Products";
$result = mysqli_query($connMenu, $query);
$colors = array();?>

<!-- FETCH COLORS -->
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
  <?php if($row['Color'] != Null) { ?>   
    <?php array_push($colors, $row['Color']);?>
  <?php } 
  }
  return $colors; 
}?>