<!DOCTYPE html>
<html>


<body>



<?php require_once 'connection.php';?>
<?php session_start(); ?>

<?php require_once 'connection.php';?>

<h3>You have chosen the follwing items:</h3>

<?php
function getItemsInCartList($sessionCart) {
    $itemsInCartList = array();
    

    if (!empty($sessionCart)) {
        $unpackCart = implode(',', $sessionCart);

        $conn = Connection::Connection();
        $calcTotalPrice = 0;

        foreach ($sessionCart as $item) {
            $stmt = $conn->prepare("SELECT *
                FROM Products
                WHERE ProductID=?;");

            $stmt->bind_param("s", $item);

            $stmt->execute();

            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $itemsInCartList[] = $row; // saves query result as array
                $calcTotalPrice = $calcTotalPrice + $row['Price'];
                echo  "<br>" . $row["Title"].  " " . $row['Color'] .  " ". $row['Price']. " SEK" . "<br>";

            }
            
        }
    }echo "<h4>total price for order:   $calcTotalPrice SEK</h4>";

    return $itemsInCartList;
}
?>

<?php
$itemsInCartList = getItemsInCartList($_SESSION['Cart']);
$orderLineLength = sizeof($itemsInCartList);

//var_dump($orderLineLength);


/*echo "<pre>";
echo print_r($itemsInCartList);
echo "</pre>";*/

//print_r($itemsInCartList);

$firstName = $lastName = $country = $city = $zipcode = $street = $phone = $email = "";

if ($_SERVER["REQUEST_METHOD"] ==  "POST") {


    if (isset($_POST['firstname'])) {
        $firstName = test_input($_POST["firstname"]);
    }
    if (isset($_POST['lastname'])) {
        $lastName = test_input($_POST["lastname"]);
    }
    if (isset($_POST['country'])) {
        $country = test_input($_POST["country"]);
    }
    if (isset($_POST['city'])) {
        $city = test_input($_POST["city"]);
    }
    if (isset($_POST['zipcode'])) {
        $zipcode = test_input($_POST["zipcode"]);
    }
    if (isset($_POST['street'])) {
        $street = test_input($_POST["street"]);
    }
    if (isset($_POST['city'])) {
        $city = test_input($_POST["city"]);
    }
    if (isset($_POST['tel'])) {
        $phone = test_input($_POST["tel"]);
    }
    if (isset($_POST['email'])) {
        $email = test_input($_POST["email"]);
    }

    
}


function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<fieldset>
    <legend>Checkout</legend>
    <form method="post">
        <input type="hidden" name="action" value="checkout">
        <label for="FirstName">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>
        <br>
        <label for="LastName">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required>
        <br>
        <br>
        <label for="country">Country:</label>
        <select name="country" required>
            <option value="" disabled selected>Choose Country</option>
            <option value="Denmark">Denmark</option>
            <option value="Finland">Finland</option>
            <option value="Norway">Norway</option>
            <option value="Sweden">Sweden</option>
        </select>

        <label for="City">City:</label>
        <input type="text" id="city" name="city" required>

        <label for="FirstName">Zipcode:</label>
        <input type="text" id="zipcode" name="zipcode" required>

        <label for="Street">Street name:</label>
        <input type="text" id="street" name="street" required>
        <br>
        <br>
        <label for="phone">Mobile phone Number:</label>
        <input type="tel" id="tel" name="tel" pattern="[0-9]{3}-[0-9]{7}" required> 
        <br>
        <small>In the following format: 123-4567890</small>
        </select>
        <br>
        <br>
        <label for="email">Email address:</label>
        <input type="email" id="email" name="email" required>
        
        <br>
        <br>
        <br>
        <h2>Payment method</h2>
        <input type="radio" name="card" value="Visa" required>Visa debit card
        <br>
        <input type="radio" name="card" value="Mastercard">Mastercard
        <br>
        <br>
        Card Number: <input type="text" name="namn" required>
        <br>
        CVV Numbers <input type="text" name="cvv" required>
        <br>
        <br>
        <button>Submit Order</button>
    </form>
</fieldset>


<?php
include_once "customer.php";
require_once "connection.php";
include_once "orderFunctions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["country"]) && !empty($_POST["city"]) && !empty($_POST["zipcode"]) && !empty($_POST["street"]) && !empty($_POST["tel"]) && !empty($_POST["email"]) )

{


$newCustomer = New Customer ($_POST["firstname"], $_POST["lastname"],$_POST["country"],$_POST["city"],$_POST["zipcode"],$_POST["street"],$_POST["tel"],$_POST["email"]);

$conn = Connection::Connection();
$customerID = Customer::InsertCustomerDB($conn, $newCustomer); //creates a customer in db
$order_ID = OrderFunctions::CreateOrder($customerID); //creates an order in db, linking customer
OrderFunctions::CreateOrderLine($order_ID, $orderLineLength, $itemsInCartList);

//echo "THIS IS ORDER ID: " . $order_ID;

//var_dump($newCustomer);
}
?>


<?php if (count($_POST)>0) echo '<h1>Thank you for shopping at Sinus!</h1>';
echo "Your ordernumber is: #" . $order_ID;
?>

</body>
</html>