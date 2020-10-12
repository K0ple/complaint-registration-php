<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen" />
</head>

<body>
<body>
<!-- <div class="messages">
    <div class="log"> 
        <img src="https://www.paceind.com/wp-content/uploads/2016/09/display-14.png">
        <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>" enctype="multipart/form-data" >
            
            <div class="main">
                <div class="left">
                    <input type="text" placeholder="FirstName" name="firstname" required><br>
                    <input type="text" placeholder="LastName" name="lastname" required><br>
                    <input type="text" placeholder="Location" name="location" required><br>
                    <input type='file' accept="application/pdf" name="pdfFile">
                    
                </div>
                <div class="right">
                    <input type="contact" placeholder="Contact Number" name="contact" required><br>
                    <input type="email" placeholder="Email" name="email" required><br>
                    <input type="password" placeholder="Password" name="password" required><br>
                    <input type="password" placeholder="ConfirmPassword" name="confirm" required><br>
                </div> 
        </div>
            <input class="sub" type="submit" value="Sign Up">
        </form>
    </div> -->

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <!-- Image and text -->
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt=""
          loading="lazy" />
        Complaint Registry
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="main.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="complaint.php">Complaint</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.php">Sign Up</a>
            </li>

        </div>
      </div>
    </div>
  </nav>
    <div class="feature-wrapper pt-5 pb-5 mt-5 mt-lg-5">
        <center><h1> Complaint Registration Portal</h1></center>
    </div>

    <div class="row mt-5">
        <div class="col-md-6 m-auto">
            <div class="card card-body mt-5">
                <h1 class="text-center mb-3">
                    <i class="fas fa-user-plus"></i> Register
                </h1>
                <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" id="name" name="name" class="form-control" placeholder="Enter Name"
                            value="" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email"
                            value="" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Create Password"
                            value="" />
                    </div>
                    <div class="form-group">
                        <label for="password2">Confirm Password</label>
                        <input type="password" id="password2" name="password2" class="form-control"
                            placeholder="Confirm Password"
                            value="" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Register
                    </button>
                </form>
                <p class="lead mt-4">Have An Account? <a href="login.php">Login</a></p>
            </div>
        </div>
    </div>

    <?php
        $firstname = $lastname = $location = $email = $password = $confirmpassword = $contact = $addressProof ="";
        $firstnameErr = $lastnameErr = $locationErr = $emailErr = $passwordErr = $confirmpasswordErr = $contactErr = $addressProofErr = "";
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

            if(empty($_POST["location"]))
            {
                $locationErr = "Location cannot be Empty.";
            }
            else
            {  
                if(!preg_match("/^[a-zA-Z ]+$/", $_POST["location"]))
                {
                    $locationErr = "Location should contain only alphabets and spaces.";
                }
                else
                {
                    $location = $_POST["location"]; 
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

            

            if($emailErr ==''&&$firstnameErr ==''&&$lastnameErr==''&&$passwordErr==''&&$confirmpasswordErr==''&&$contactErr=='')
            {
                $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                $user_id = substr(str_shuffle($str_result), 0, 15);
                $dest_file = '';
                if ($_FILES['pdfFile']['type'] == "application/pdf") {
                    $source_file = $_FILES['pdfFile']['tmp_name'];
                    $dest_file = "images/AddressProofs/".$user_id.'.pdf';
    
                    if (file_exists($dest_file)) {
                        print "The file name already exists!!";
                    }
                    else {
                        move_uploaded_file( $source_file, $dest_file )
                        or die ("Error!!");
                        if($_FILES['pdfFile']['error'] == 0) {
                            // print "Pdf file uploaded successfully!";
                            // print "<b><u>Details : </u></b><br/>";
                            // print "File Name : ".$_FILES['pdfFile']['name']."<br.>"."<br/>";
                            // print "File Size : ".$_FILES['pdfFile']['size']." bytes"."<br/>";
                            // print "File location : upload/".$_FILES['pdfFile']['name']."<br/>";
                        }
                    }
                }
                else {
                    if ( $_FILES['pdfFile']['type'] != "application/pdf") {
                        print "Error occured while uploading file : ".$_FILES['pdfFile']['name']."<br/>";
                        print "Invalid  file extension, should be pdf !!"."<br/>";
                        print "Error Code : ".$_FILES['pdfFile']['error']."<br/>";
                    }
                }


                echo "Connected!!!";
                $sql = "INSERT INTO user_details(firstname, lastname, user_id, location, address_proof, usertype, contact, email, password)
                VALUES ('$firstname', '$lastname', '$user_id', '$location', '$dest_file', 'citizen', '$contact', '$email','$password')";
            
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
                echo $locationErr."<br>";
                echo $emailErr."<br>";
                echo $passwordErr."<br>";
                echo $confirmpasswordErr."<br>";
                echo $contactErr."<br>";
                
            }
            
            
        }
    ?>
</body>