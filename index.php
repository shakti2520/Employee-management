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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ConvergeSol</title>

    <style>
        table{
            margin-top: 10px;
            border:1px solid black;
        }
        table, tr, td{
            padding:6px 10px;
            border-left: 1px solid black;
            border-right: 1px solid black;
            border-collapse: collapse;
            font-size: 16px;
        }
        table thead tr{
            background-color: lightgrey; 
            font-family: sans-serif;
            padding:    
        }
    </style>

</head>

<body>

    <section id="emploee-details">
        <h1>List os Applications</h1>
        <button onclick="location.href = 'AddEmployee.html';" id="addNew">
				Add New
			</button>

        <table>
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Email ID</td>
                    <td>Mobile</td>
                    <td>Gender</td>
                    <td>Post</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                    <?php
                        $sql = "SELECT name, email, mobile, gender, post FROM employees";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr> 
                            <td>".$row["name"]."
                             </td><td>" .$row["email"]."
                             </td><td>". $row["mobile"]." 
                             </td> <td>".$row["gender"]."
                             </td><td>".$row["post"]."</td>";
                            $email=  $row["email"] ;
                        ?>
      
                        <td>
                            <button class="edit" onclick="location.href = 'updateEmployee.php?name=<?php echo $email ?>'">Edit</button>
                            <a href="deleteEmployee.php?email=<?php echo $row["email"] ?>" class="delete"><button class="delete" name="<?php echo $row["email"] ?>">
                                    Delete
                                </button></a>
                        </td> 
                        </tr>
                    <?php
                    }
                        } else {
                        echo "NO entries";
                        }
                    ?>
                
            </tbody>
        </table>
    </section>

    <!-- <div class="model">
        <h4>Are you sure?</h4>
        <br>
        <button>YES</button>
        <button>NO</button>
    </div> -->

    <?php
        $conn->close();
    ?>
</body>

</html>