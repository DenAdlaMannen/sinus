<?php

require_once "addProductsAdmin.php";
require_once 'connection.php';


function HandleUploadForm()
{
    //put the form inputs into variables to later make a returnable array
    if(isset($_POST["color"])) 
    {
        $attributeColor = $_POST["color"];  
    }
    else 
    {
        $attributeColor = "0";
    }

    if(isset($_POST["productName"])) 
    {
        $attributeProductName = $_POST["productName"];
    }
    else
    {
        $attributeProductName = "0";
    }

    if(isset($_POST["category"])) 
    {
        $attributeCategory = $_POST["category"];
    }
    else
    {
        $attributeCategory = "0";
    }

    if(isset($_POST["price"])) 
    {
        $attributePrice = $_POST["price"];
    }
    else 
    {
        $attributePrice = 0;
    }
  

    $currentDirectory = getcwd();
    $uploadDirectory = "/sinusmaterial/sinus assets/products/";

    $errors = []; 

    $AllowedFileEndings = ['jpeg','jpg','png'];

    $fileName = $_FILES['fileToUpload']['name']; 
    $fileSize = $_FILES['fileToUpload']['size'];
    $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
    $fileType = $_FILES['fileToUpload']['type'];
    $tmp = explode('.', $fileName);
    $fileExtension = end($tmp); //gets the last element from the exploded array
      

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

    if (isset($_POST['submit'])) {

      if (! in_array($fileExtension,$AllowedFileEndings)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
      }

      if ($fileSize > 1048576) { //size in bytes
        $errors[] = "Max size for image files is 1MB";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
          echo basename($fileName) . " The product has been added.";
        } else {
          echo "File could not be uploaded. Please call tech.";
        }
      } else {
        foreach ($errors as $error) {
          echo $error . "" . "\n";
        }
      }

    }

    //the product object that will be returnable
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


$newProduct = HandleUploadForm();
$newCategoryID = AddCategoryDB($newProduct);
$confirmation = AddNewProductDB($newProduct, $newCategoryID);

//var_dump($newCategoryID);
//var_dump($newProduct);


?>