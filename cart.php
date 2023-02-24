<?php require_once 'connection.php';?>
<?php session_start(); 
 $_SESSION['activeCart']= array();
 ?>

<?php 
function ViewCart() {
    if (empty($_SESSION['activeCart'])) {
        echo "Cart is empty"; }
    else {
        foreach ($_SESSION['activeCart'] as $item) {
            echo $item;
        }
    }
}

function AddToCart($id) {
    if (empty($_SESSION['activeCart'])) {
        array_push($_SESSION['activeCart'], $id);
    }

    else {
        array_push($_SESSION['activeCart'], $id);
    }
}
?>