<?php 
 $host = "localhost";
 $username = "root";
 $password = "";
 $database = "phpecom";

 // creating database connection
 $con = mysqli_connect($host, $username, $password, $database);

 // checking connection
    if(!$con){
        die("Connection failed: ".mysqli_connect_error());
    } 

?>