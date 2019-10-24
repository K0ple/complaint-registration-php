<?php session_start();
    include('bar.php');
?>
<!DOCTYPE html>
<head>
    <title>Login</title>
<link rel="stylesheet" type="text/css" href="logincss1111.css">
</head>

<body>
    <div class="log"> 
        <img src="https://www.paceind.com/wp-content/uploads/2016/09/display-14.png">
       
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <input type="text" placeholder="Username" name="username"><br>
            <input type="password" placeholder="Password" name="password"><br>
            <input class="sub" type="submit" value="Login">
        </form>
        <a href="signup.php">Not a User? Sign Up here</a>
    </div>
    <?php
        include("config.php");        

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            include("config.php");

            $myusername=$_POST['username'];
            $mypassword=$_POST['password'];
            $sql = "SELECT username,password,usertype FROM user_details WHERE username='$myusername'";
            $result = $conn->query($sql);
            if($result->num_rows>0)
            {
                while($row = $result->fetch_assoc()) {
                    if($row["password"]==$mypassword && $row["username"]==$myusername)
                    {
                        $usertype = $row['usertype'];
                        $_SESSION['user']=$myusername;
                        $_SESSION['password']=$mypassword;
                        $_SESSION['usertype']=$usertype;
                        if($usertype=='citizen')
                            header("location:user_db.php");
                        else if($usertype=='admin')
                            header("location:adminchiru.php");
                        else if($usertype=='authority')
                            header("location:authoritychiru.php");
                    }
                    else
                        echo "INVALID CREDITIANTIALS!!!<br>  TRY AGAIN!!!";
                        echo "username: ".$row['username'];
                }
            }
            $conn->close();
        }
           
    ?>
</body>