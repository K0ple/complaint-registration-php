<!DOCTYPE html>
<head>
    <title>SignUp</title>
</div>
<link rel="stylesheet" type="text/css" href="signupcss.css">
</head>
<?php include('bar.php'); ?>
<body>
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
                        <option value="admin"></option>
                        <option value="authority"></option>
                        <option value="citizen"></option>
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
        $firstname = $lastname = $username = $email = $password = $confirmpassword = $contact = $usertype ="";
        $firstnameErr = $lastnameErr = $usernameErr = $emailErr = $passwordErr = $confirmpasswordErr = $contactErr = "";
        include('config.php');
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["firstname"]))
            {
                $firstnameErr = "First Name cannot be Empty.";
            }
            else
            {
                if(!preg_match("/^[a-zA-Z ]+$/", $_POST["firstname"]))
                {
                    $firstnameErr = "First Name should contain only alphabets and spaces.";
                }
                else
                {
                    $firstname = $_POST["firstname"];   
                }
            }
            if(empty($_POST["lastname"]))
            {
                $lastnameErr = "Last Name cannot be Empty.";
            }
            else
            {  
                if(!preg_match("/^[a-zA-Z ]+$/", $_POST["lastname"]))
                {
                    $lastnameErr = "Last Name should contain only alphabets and spaces.";
                }
                else
                {
                    $lastname = $_POST["lastname"]; 
                }
            }
            if(empty($_POST["username"]))
            {
                $usernameErr = "User Name cannot be Empty.";
            }
            else
            { 
                if(!preg_match("/^[a-zA-Z0-9_ ]+$/", $_POST["username"]))
                {
                    $usernameErr = "User Name should contain only alphabets, numbers, underscores and spaces.";
                }
                else
                {
                    $username = $_POST["username"];  
                }
            }
            if(empty($_POST["contact"]))
            {
                $contactErr = "Contact Number cannot be empty.";
            }
            else
            {
                if(!preg_match("/^[0-9]{10}$/",$_POST["contact"]))
                {
                    $contactErr = "Contact Number Should contain 10 digits";
                }
                else
                {
                    $contact = $_POST["contact"];
                }
            }
            if(empty($_POST["email"]))
            {
                $emailErr = "Email cannot be empty.";
            }
            else
            {
                if(!preg_match("/^[a-zA-Z0-9.-_+%]+@[a-zA-Z]{3,8}\.[a-zA-Z-_]{2,5}$/",$_POST["email"]))
                {
                    $emailErr = "Email format is invalid.";
                }
                else
                {
                    $email = $_POST["email"];
                }
            }
            if(empty($_POST["password"]))
            {
                $passwordErr = "Password cannot be empty";
            }
            else
            {
                if(strlen($_POST["password"])<5)
                {
                    $passwordErr = "Password is too short. It should be more than 5 letters.";
                }
                else
                {
                    $password = $_POST["password"];
                }
            }
            if(empty($_POST["confirm"]))
            {
                $confirmpasswordErr = "Password do not match.";
            }
            else
            {
                if($_POST["confirm"]!= $password)
                {
                    $confirmpasswordErr = "Password and Confirm Password do not match.";   
                }
                else
                {
                    $confirmpassword = $_POST["confirm"];
                }
            }
            $usertype = $_POST['usertype'];
            

            if($usernameErr ==''&&$emailErr ==''&&$firstnameErr ==''&&$lastnameErr==''&&$passwordErr==''&&$confirmpasswordErr==''&&$contactErr=='')
            {
                echo "Connected!!!";
                $sql = "INSERT INTO user_details(firstname, lastname, username, usertype, contact, email, password)
                VALUES ('$firstname', '$lastname', '$username', '$usertype', '$contact', '$email','$password')";
            
                if ($conn->query($sql) == TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
            else
            {
                echo $firstnameErr."<br>";
                echo $lastnameErr."<br>";
                echo $usernameErr."<br>";
                echo $emailErr."<br>";
                echo $passwordErr."<br>";
                echo $confirmpasswordErr."<br>";
                echo $contactErr."<br>";
                
            }
            
            
        }
    ?>
</body>