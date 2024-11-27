<?php
    //echo "<h1>Testing ...</h1>";

    $servername = "db";
    $username = "kristiyanp";
    $password = "phpproject";
    $dbname = "phpdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn -> connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    //echo "Database connected sucessfully";
?>