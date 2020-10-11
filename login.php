
<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen" />
</head>

<body>
    <div class="feature-wrapper pt-5 pb-5 mt-5 mt-lg-5">
        <center><h1> Complaint Registration Portal</h1></center>
    </div>
    
    <div class="row mt-5">
        <div class="col-md-6 m-auto">
            <div class="card card-body mt-5">
                <h1 class="text-center mb-3"><i class="fas fa-sign-in-alt"></i> Login</h1>
    
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Enter Password" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                <p class="lead mt-4">
                    No Account? <a href="signup.php">Register</a>
                </p>
            </div>
        </div>
    </div>
    <?php
        include("config.php");        

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            include("config.php");

            $email=$_POST['email'];
            $mypassword=$_POST['password'];
            $sql = "SELECT user_id, email, password, usertype FROM user_details WHERE email='$email'";
            $result = $conn->query($sql);
            if($result->num_rows>0)
            {
                while($row = $result->fetch_assoc()) {
                    if($row["password"]==$mypassword && $row["email"]==$email)
                    {
                        $usertype = $row['usertype'];
                        $user_id = $row['user_id'];
                        $_SESSION['user_id']=$user_id;
                        $_SESSION['usertype']=$usertype;
                        if($usertype=='citizen')
                            header("location:user_main.php");
                        else if($usertype=='admin')
                            header("location:admin_main.php");
                        else if($usertype=='local_admin')
                            header("location:local_admin_main.php");
                        else if($usertype=='authority')
                            header("location:authority_main.php");
                    }
                    else
                    {
                        echo "INVALID CREDITIANTIALS!!!<br>  TRY AGAIN!!!";
                        echo "Email: ".$row['email'];
                    }
                        
                }
            }
            else
            {
                echo "INVALID CREDITIANTIALS!!!<br>  TRY AGAIN!!!";
                echo "Email: ".$_POST['email'];
            }
            $conn->close();
        }
           
    ?>
</body>