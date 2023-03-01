<?php 
if(empty($_SESSION['Cart'])) {
    $_SESSION['Cart']= array();
}
if (isset($_POST['id'])) {
    array_push($_SESSION['Cart'], $_POST['id']);
}
?>
<style>
    .card { border: none; margin: 5em;}
    .card-header { background: white;}
</style>
<div class="card"> 
  <div class="card-header" align="center">
  <h1 class="display-4">Cart updated!</h1>
  </div>
  <div class="card-body" align="center">
    <h5 class="card-title" align="center">Your item has been added to your cart!</h5>
    <p class="card-text" align="center">What do you want to do next?</p>
    <a href="index.php" align="center" class="btn btn-primary">Return to shopping</a>
  </div>
</div>
