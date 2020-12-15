<?php

   $servername = "localhost";
    $username = "USER_NAME";
    $password = "PASSWORD";
    $dbname = "convergesol";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "DELETE FROM employees WHERE email='".$_GET["email"]."'";
   if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
   } else {
   echo "Error: " . $sql . "<br>" . $conn->error;
   };
    $conn->close();

    header("Location: index.php"); 
?>