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
    <title>Document</title>
</head>

<body>
    <?php
        $sql = "SELECT name, email, mobile, gender, post FROM employees where email='".$_GET["name"]."'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
    ?>
    <h1>Application Form</h1>
    <form action="updateToSQL.php" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <br />
            <input type='text' name='name' id='name' value='<?php echo $row["name"] ?>' required />
            
        </div>
        <div class="form-group">
            <label for="email">Email ID:</label>
            <br />
             <input type='email' id='email' value='<?php echo $row["email"] ?>' required disabled/>
             <input type='hidden' name="email" id='email' value='<?php echo $row["email"] ?>' required/>
            
        </div>
        <div class="form-group">
            <label for="mobile">Contact number:</label>
            <br />
            <input type='number' name='mobile' id='mobile' maxlength='10'  value='<?php echo $row["mobile"] ?>' required />
            
        </div>
        <div class="form-group">
            <label for="">Gender:</label>
            <br />
            <input type="radio" id="male" name="gender" value="male" <?php if(strcmp($row["gender"],'male') == 0) {echo 'checked';} ?> required />
            <label for="male ">Male</label>
            <br />
            <input type="radio" id="female" name="gender" value="female" <?php if(strcmp($row["gender"],'female')==0){echo 'checked';} ?>  required />
            <label for="female ">Female</label>
        </div>

        <div class="form-group">
            <label for="post">Application for post:</label>
            <br />
            <select name="post" id="post">
					<option <?php if(strcmp($row["post"],'intern')==0){echo 'selected';} ?>  value="intern">Intern</option>
					<option <?php if(strcmp($row["post"],'.net developer')==0){echo 'selected';} ?> value=".net Developer">.net Developer</option>
					<option <?php if(strcmp($row["post"],'angular developer')==0){echo 'selected';} ?> value="Angular Developer">Angular Developer</option>
				</select>
        </div>
        <br />
        <input type="submit" id="submit" value="Update" />
        <input type="button" id="cancel" onclick="location.href = 'index.php';"  value="Cancel" />
    </form>

    <?php
    }
        } else {
        echo "0 results";
        }
    $conn->close(); ?>
</body>

</html>