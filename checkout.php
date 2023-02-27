<?php require_once 'connection.php';?>
<?php session_start(); ?>

<?php
if(isset($_POST["sessionCart"]))
{
    if(!empty($_SESSION['Cart'])) {
        $unpackCart = implode(',', $_SESSION['Cart']);
    
        $conn = Connection::Connection();
        $calcTotalPrice = 0;
    
        foreach ($_SESSION['Cart'] as $item) {
            $stmt = $conn->prepare("SELECT *
            FROM Products
            WHERE ProductID=?;");
    
        $stmt->bind_param("s", $item);
    
        $stmt->execute();
    
        $result = $stmt->get_result();
       
        while($row = $result->fetch_assoc()) { ?>
         <tr>
          <th scope="row">1</th>
          <td><?php echo $row['Title'];?></td>
          <td><?php echo $row['Color'];?></td>
          <td><?php echo $row['Price'];?> kr</td>
        </tr> 
    <?php  $calcTotalPrice = $calcTotalPrice + $row['Price'];
        }
     } 
    }
}
?>