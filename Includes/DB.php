<?php
  global $connect;
  global $database;

$servername = 'localhost'; //Name of the server
$username = 'root';        //Username of the database this is the default username
$password = "";            //Password of the database
$database = "Portofolio";  //Select the database

// Create connection
$connect = new mysqli($servername, $username, $password, $database);
?>