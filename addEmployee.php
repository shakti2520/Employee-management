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
   
   $sql = "insert into `employees`  (`name`, `email`, `mobile`, `gender`, `post`) VALUES ('".$_POST["name"]."', '".$_POST["email"]."', '".$_POST["mobile"]."', '".$_POST["gender"]."', '".$_POST["post"]."')";
   $result = $conn->query($sql);

   // if ($conn->query($sql) === TRUE) {
   //    echo "New record created successfully";
   // } else {
   // echo "Error: " . $sql . "<br>" . $conn->error;
   // }
      $conn->close();

    header("Location: index.php"); 
?>