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
    
    $sql = "UPDATE employees SET name='".$_POST["name"]."', mobile='".$_POST["mobile"]."', gender='".$_POST["gender"]."', post='".$_POST["post"]."' WHERE email='".$_POST["email"]."'";
   //  $result = $conn->query($sql);
   if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
   } else {
   echo "Error: " . $sql . "<br>" . $conn->error;
   };
    $conn->close();

    header("Location: index.php"); 
?>