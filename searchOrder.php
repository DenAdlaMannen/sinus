<table>
    <td class="emptyRow"> <Style>.emptyRow {width: 30vw;}</style>
    </td>
    <td class="formRow"> <Style>.formRow {width: 40vw; text-align:center;}</style>
        <form method="POST">
            <select id="order" name="order" class="btn btn-secondary dropdown-toggle">
                <h3>All available Order ID's</h3>
                <?php $orderIDs = GetOrderIDs();
                foreach ($orderIDs AS $order) { ?>
                    <li><option value="<?php echo $order?>"><?php echo $order?></option></li>
            <?php }?>
            <li><option value="0">None</option></li>
            </select>
            <input type="submit" class="btn btn-primary" value="Get Order">
        </form>
  <td>
  <td class="emptyRow"> <Style>.emptyRow {width: 30vw;}</style>
  </td>
</table>


<!-- RETURNS ALL ORDER IDS -->
<?php Function GetOrderIDs() {
    include_once 'connection.php';
    $conn = Connection::Connection();
  
    $query = "SELECT OrderID
              FROM Orders";
    $result = mysqli_query($conn, $query);
    $orderIDs = array();?>
    
<?php while (($row = mysqli_fetch_assoc($result))) { ?>
    <?php if($row['OrderID'] != Null) { ?> 
      <?php array_push($orderIDs, $row['OrderID']);
    }
  }
  return $orderIDs;
}?>
    





