<?php
        include('config.php');
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $firstname = $_POST["firstname"];
        $lastname=$_POST['lastname'];
        $username=$_POST['username'];
        $contact = $_POST['contact'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirmpassword=$_POST['confirm'];
        
        if($username !=''||$email !=''||$firstname!=''|| $password!=''||$confirmpassword!=''){
            $sql = "UPDATE user_details SET firstname='$firstname', lastname='$lastname', username='$username', contact='$contact', email='$email', password='$password' WHERE username='$username'";
            if ($conn->query($sql) == TRUE) {
                echo "Saved successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        }
        $conn->close();
    ?>