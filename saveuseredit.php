<?php   
    $firstname = $lastname = $username = $email = $password = $contact = $usertype ="";
        $firstnameErr = $lastnameErr = $usernameErr = $emailErr = $passwordErr = $contactErr = "";
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
            $usertype = $_POST['usertype'];
            

            if($usernameErr ==''&&$emailErr ==''&&$firstnameErr ==''&&$lastnameErr==''&&$passwordErr==''&&$contactErr=='')
            {
                $sql = "UPDATE user_details SET firstname='$firstname', lastname='$lastname', username='$username', contact='$contact', email='$email', password='$password' WHERE username='$username'";
                if ($conn->query($sql) == TRUE) {
                    echo "Saved successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
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
        $conn->close();                
?>
