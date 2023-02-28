<?php

require_once "addProductsAdmin.php";

function UploadNewProduct()
{
    
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

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg','jpg','png']; // These will be the only file extensions allowed 

    $fileName = $_FILES['fileToUpload']['name']; //needs to be stored in the object
    $fileSize = $_FILES['fileToUpload']['size'];
    $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
    $fileType = $_FILES['fileToUpload']['type'];
    //$fileExtension = strtolower(end(explode('.',$fileName)));
    $tmp = explode('.', $fileName);
    $fileExtension = end($tmp); //gets the last element from the exploded array
    
  

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

    if (isset($_POST['submit'])) {

      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
      }

      if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
          echo "The file " . basename($fileName) . " has been uploaded";
        } else {
          echo "An error occurred. Please contact the administrator.";
        }
      } else {
        foreach ($errors as $error) {
          echo $error . "These are the errors" . "\n";
        }
      }

    } //ej sätta else ? Nu har img ej värde i arrayen (fileToUpload)

    $newProduct = array("productName" => $attributeProductName,"category"=> $attributeCategory, "color"=> $attributeColor, "price"=> $attributePrice, "fileToUpload"=> $fileName);
    //the product object that will be returnable

    return $newProduct;
    
}

$newProduct = UploadNewProduct();

var_dump($newProduct);


?>