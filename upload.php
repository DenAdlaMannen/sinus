<<<<<<< HEAD
<?php
require "addProductsAdmin.php"; //once or just require? We want this page to "stay" in the admin view
require_once 'connection.php';


function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



function HandleUploadForm()
{

  $attributeColor =  $attributeProductName = $attributeCategory = $attributePrice = "0";
  $fileName = ""; //this is the value for image in DB in no file is uploaded

    //put the form inputs into variables to later make a returnable array

    if(isset($_POST["color"]) && empty($_POST["choiceColor"])) //if user have entered own color
    {
        $temporary1 = test_input($_POST["color"]);
        $temporary2 = strtolower($temporary1);//downcases the first letter

        $attributeColor = $temporary2;
    }
    else if (empty($_POST["color"]) && isset($_POST["choiceColor"]) ) //if user have chosen color
    {
      $attributeColor = $_POST["choiceColor"];
    }
     //is user have chosen neither the value is "0" as stated on row 13
  

    if(isset($_POST["productName"])) 
    {
      $temporary1 = test_input($_POST["productName"]);
      $temporary2 = ucfirst($temporary1);//capitalizes the first letter

      $attributeProductName = $temporary2;
    }

    if(isset($_POST["category"]) && empty($_POST["choiceCategory"]) )  //if user have entered own category
    {
      $temporary1 = test_input($_POST["category"]);
      $temporary2 = ucfirst($temporary1);

      $attributeCategory = $temporary2;
    }
    else if (empty($_POST["category"]) && isset($_POST["choiceCategory"]) ) //if user have chosen category
    {
      
      $attributeCategory = $_POST["choiceCategory"];

    }
    //is user have chosen neither, the value is "0" as stated on row 18

    if(isset($_POST["price"])) 
    {
        $temporary1 = test_input($_POST["price"]);
        $attributePrice = $temporary1;
    }

    $currentDirectory = getcwd();
    $uploadDirectory = "/sinusmaterial/sinus assets/products/";

    $errors = []; 

    $AllowedFileEndings = ['jpg','png'];

    if (!empty($_FILES['fileToUpload']['name'])) 
    {
    
      $fileName = $_FILES['fileToUpload']['name']; 
      $fileSize = $_FILES['fileToUpload']['size'];
      $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
      $fileType = $_FILES['fileToUpload']['type'];
      $tmp = explode('.', $fileName);
      $fileExtension = end($tmp); //gets the last element from the exploded array
        
      $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

      if (isset($_POST['submit'])) {

        if (! in_array($fileExtension,$AllowedFileEndings)) {
          $errors[] = "File extension not allowed. Please upload a JPG or PNG file";
        }

        if ($fileSize > 1048576) { //size in bytes
          $errors[] = "Max size for image files is 1MB";
        }

        if (empty($errors)) {
          $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

          if ($didUpload) {
            echo basename($fileName) . " Image + product are added";
          } else {
            echo "File could not be uploaded. Please call tech.";
          }
        } else {
          foreach ($errors as $error) {
            echo $error . "" . "\n";
          }
        }
    }
    }
    if (empty($_FILES['fileToUpload']['name']))
    {
      echo "Product has been added";
    }
   

    //the product array that will be returnable
    $newProduct = array("productName" => $attributeProductName,"category"=> $attributeCategory, "color"=> $attributeColor, "price"=> $attributePrice, "fileToUpload"=> $fileName);
    
    return $newProduct;
    
}

function CheckCategoryExists($newProduct) //Make sure categoryName don't duplicate//Should we really spend time on exception handling for every input the user made?

{
    $conn = Connection::Connection();
}


function AddCategoryDB($newProduct)
{
    $conn = Connection::Connection();

    $stmt = $conn->prepare("INSERT INTO category (CategoryName) VALUES (?)");
    $stmt ->bind_param("s", $param);

    $param = $newProduct['category'];
    $stmt->execute();
    $newCategoryID = $conn->insert_id;

    return $newCategoryID;

}

function AddNewProductDB($newProduct, $newCategoryID)
{
    $conn = Connection::Connection();

    $stmt = $conn->prepare("INSERT INTO products (`Title`, `CategoryID`, `Color`, `Price`, `Image`) VALUES (?,?,?,?,?)");
    $stmt ->bind_param("sssis", $paramTitle, $newCategoryID, $paramColor, $paramPrice, $paramImage );

    $paramTitle = $newProduct['productName'];
    $paramColor = $newProduct['color'];
    $paramPrice = $newProduct['price'];
    $paramImage = $newProduct['fileToUpload'];

    $stmt->execute();
    
    $confirmation = "Successfully added to database";

    return $confirmation;
}

//Run functions

$newProduct = HandleUploadForm();
$newCategoryID = AddCategoryDB($newProduct);
$confirmation = AddNewProductDB($newProduct, $newCategoryID);

//var_dump($newCategoryID);
//var_dump($newProduct);
=======
<?php
require "addProductsAdmin.php"; //once or just require? We want this page to "stay" in the admin view
require_once 'connection.php';


function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



function HandleUploadForm()
{

  $attributeColor =  $attributeProductName = $attributeCategory = $attributePrice = "0";
  $fileName = ""; //this is the value for image in DB in no file is uploaded

    //put the form inputs into variables to later make a returnable array

    if(isset($_POST["color"]) && empty($_POST["choiceColor"])) //if user have entered own color
    {
        $temporary1 = test_input($_POST["color"]);
        $temporary2 = strtolower($temporary1);//downcases the first letter

        $attributeColor = $temporary2;
    }
    else if (empty($_POST["color"]) && isset($_POST["choiceColor"]) ) //if user have chosen color
    {
      $attributeColor = $_POST["choiceColor"];
    }
     //is user have chosen neither the value is "0" as stated on row 13
  

    if(isset($_POST["productName"])) 
    {
      $temporary1 = test_input($_POST["productName"]);
      $temporary2 = ucfirst($temporary1);//capitalizes the first letter

      $attributeProductName = $temporary2;
    }

    if(isset($_POST["category"]) && empty($_POST["choiceCategory"]) )  //if user have entered own category
    {
      $temporary1 = test_input($_POST["category"]);
      $temporary2 = ucfirst($temporary1);

      $attributeCategory = $temporary2;
    }
    else if (empty($_POST["category"]) && isset($_POST["choiceCategory"]) ) //if user have chosen category
    {
      
      $attributeCategory = $_POST["choiceCategory"];

    }
    //is user have chosen neither, the value is "0" as stated on row 18

    if(isset($_POST["price"])) 
    {
        $temporary1 = test_input($_POST["price"]);
        $attributePrice = $temporary1;
    }

    $currentDirectory = getcwd();
    $uploadDirectory = "/sinusmaterial/sinus assets/products/";

    $errors = []; 

    $AllowedFileEndings = ['jpg','png'];

    if (!empty($_FILES['fileToUpload']['name'])) 
    {
    
      $fileName = $_FILES['fileToUpload']['name']; 
      $fileSize = $_FILES['fileToUpload']['size'];
      $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
      $fileType = $_FILES['fileToUpload']['type'];
      $tmp = explode('.', $fileName);
      $fileExtension = end($tmp); //gets the last element from the exploded array
        
      $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

      if (isset($_POST['submit'])) {

        if (! in_array($fileExtension,$AllowedFileEndings)) {
          $errors[] = "File extension not allowed. Please upload a JPG or PNG file";
        }

        if ($fileSize > 1048576) { //size in bytes
          $errors[] = "Max size for image files is 1MB";
        }

        if (empty($errors)) {
          $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

          if ($didUpload) {
            echo basename($fileName) . " Image + product are added";
          } else {
            echo "File could not be uploaded. Please call tech.";
          }
        } else {
          foreach ($errors as $error) {
            echo $error . "" . "\n";
          }
        }
    }
    }
    if (empty($_FILES['fileToUpload']['name']))
    {
      echo "Product has been added";
    }
   

    //the product array that will be returnable
    $newProduct = array("productName" => $attributeProductName,"category"=> $attributeCategory, "color"=> $attributeColor, "price"=> $attributePrice, "fileToUpload"=> $fileName);
    
    return $newProduct;
    
}

function CheckCategoryExists($newProduct) //Make sure categoryName don't duplicate//Should we really spend time on exception handling for every input the user made?

{
    $conn = Connection::Connection();
}


function AddCategoryDB($newProduct)
{
    $conn = Connection::Connection();

    $stmt = $conn->prepare("INSERT INTO category (CategoryName) VALUES (?)");
    $stmt ->bind_param("s", $param);

    $param = $newProduct['category'];
    $stmt->execute();
    $newCategoryID = $conn->insert_id;

    return $newCategoryID;

}

function AddNewProductDB($newProduct, $newCategoryID)
{
    $conn = Connection::Connection();

    $stmt = $conn->prepare("INSERT INTO products (`Title`, `CategoryID`, `Color`, `Price`, `Image`) VALUES (?,?,?,?,?)");
    $stmt ->bind_param("sssis", $paramTitle, $newCategoryID, $paramColor, $paramPrice, $paramImage );

    $paramTitle = $newProduct['productName'];
    $paramColor = $newProduct['color'];
    $paramPrice = $newProduct['price'];
    $paramImage = $newProduct['fileToUpload'];

    $stmt->execute();
    
    $confirmation = "Successfully added to database";

    return $confirmation;
}

//Run functions

$newProduct = HandleUploadForm();
$newCategoryID = AddCategoryDB($newProduct);
$confirmation = AddNewProductDB($newProduct, $newCategoryID);

//var_dump($newCategoryID);
//var_dump($newProduct);
>>>>>>> 9432d6414ea16c0e09be5580a6c37b068fde032c
?>