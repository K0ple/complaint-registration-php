<!DOCTYPE html>
<?php include "bar.php"; ?>
<head>
    <title>SignUp</title>
</div>
<link rel="stylesheet" type="text/css" href="signupcss.css">
</head>

<body>
<div class="messages">
    <div class="log"> 
        <img src="https://www.paceind.com/wp-content/uploads/2016/09/display-14.png">
        <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
            
            <div class="main">
                <div class="left">
                    <input type="text" placeholder="FirstName" name="firstname"><br>
                    <input type="text" placeholder="LastName" name="lastname"><br>
                    <input type="text" placeholder="UserName" name="username"><br>
                    <input type="text" placeholder="UserType" name="usertype" list="usertypes"><br>
                    <datalist id="usertypes">
                        <option value="Admin"></option>
                        <option value="Authority"></option>
                        <option value="Citizen"></option>
                    </datalist>
  
                </div>
                <div class="right">
                    <input type="contact" placeholder="Contact Number" name="contact"><br>
                    <input type="email" placeholder="Email" name="email"><br>
                    <input type="password" placeholder="Password" name="password"><br>
                    <input type="password" placeholder="ConfirmPassword" name="confirm"><br>
                </div> 
        </div>
            <input class="sub" type="submit" value="Sign Up">
        </form>
    </div>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "iwp_project1";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else
            echo "Connected!!!";
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $firstname = $_POST["firstname"];
        $lastname=$_POST['lastname'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirmpassword=$_POST['confirm'];
        
        if($username !=''||$email !=''||$firstname!=''|| $password!=''||$confirmpassword!=''){
            $sql = "INSERT INTO signup(firstname, lastname,username, email,password,confirmpassword)
            VALUES ('$firstname', '$lastname', '$username','$email','$password','$confirmpassword')";
        
            if ($conn->query($sql) == TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        }
        $conn->close();
    ?>
</body>