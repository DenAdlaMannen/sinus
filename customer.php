<?php
 require_once "connection.php";
class Customer
{
 
  public $firstName;
  public $lastName;
  public $country;
  public $city;
  public $zipcode;
  public $street;
  public $phone;
  public $email;


  function __construct($firstName,$lastName,$country, $city,$zipcode,$street,$phone,$email)
  {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->country = $country;
    $this->city = $city;
    $this->zipcode = $zipcode;
    $this ->street = $street;
    $this -> phone  = $phone;
    $this -> email = $email;
  }

  function set_firstName($firstName){$this->firstName = $firstName;}
  function get_firstname(){return $this->firstName;}

  function set_lastName($lastName){$this->lastName = $lastName;}
  function get_lastName(){return $this->lastName;}

  function set_country($country){$this->country = $country;}
  function get_country(){return $this->country;}

  function set_city($city){$this->city = $city;}
  function get_city(){return $this->city;}

  function set_zipcode($zipcode){$this->zipcode = $zipcode;}
  function get_zipcode(){return $this->zipcode;}

  function set_street($street){$this->street = $street;}
  function get_street(){return $this->street;}

  function set_phone($phone){$this->phone = $phone;}
  function get_phone(){return $this->phone;}

  function set_email($email){$this->email = $email;}
  function get_email(){return $this->email;}

public static function CreateCustomer ($firstName,$lastName,$country,$city,$zipcode,$street,$phone,$email)
{

    $NewCustomer = new Customer ($firstName,$lastName,$country,$city,$zipcode,$street,$phone,$email);  
    
    return $NewCustomer;

} 

public static function InsertCustomerDB ($conn, $newCustomer) //add new row to database, table "customers"
{
  $conn = Connection::Connection();

  $stmt = $conn->prepare("INSERT INTO customers (Firstname, Lastname, Country, City, Zipcode, Street, Phone, EmailAddress) VALUES (?,?,?,?,?,?,?,?)");
  $stmt ->bind_param("ssssisss", $firstName, $lastName, $country, $city, $zipcode, $street,$phone,$email);

  $firstName = $newCustomer->firstName;
  $lastName = $newCustomer->lastName;
  $country = $newCustomer->country;
  $city = $newCustomer->city;
  $zipcode = $newCustomer->zipcode;
  $street = $newCustomer->street;
  $phone = $newCustomer->phone;
  $email = $newCustomer->email;

  $stmt->execute();

}

}