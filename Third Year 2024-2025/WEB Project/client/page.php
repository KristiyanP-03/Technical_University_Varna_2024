<?php
    echo "<h1>Testing ...</h1>";

    $servername = "db";
    $username = "kristiyanp";
    $password = "phpproject";
    $dbname = "phpdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn -> connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    echo "Database connected sucessfully";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>