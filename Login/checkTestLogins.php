<?php

//START SESSION
session_start();

//IF LOGOUT
if(isset($_POST['logout']))
{
session_destroy();
unset($_SESSION);
Header("Location: login.php");
exit();
}

//CHECK IF THERE IS NO SESSION THEN REDIRECT
if(!isset($_SESSION['user']))
{
  Header("Location: login.php");
  exit();
}
