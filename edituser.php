<!DOCTYPE html>
<html>
<?php 
    session_start(); 
    // $user = $_SESSION['user'];
    $user = 'nicky';
    include('config.php');
    $sql = "SELECT * from user_details where username='$user'";
    $result = $conn->query($sql);
    if($result->num_rows>0)
        {
            while($row = $result->fetch_assoc())
            {
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $username = $row['username'];
                $usertype = $row['usertype'];
                $contact = $row['contact'];
                $email = $row['email'];
                $password = $row['password'];
                $confirm = $row['password'];
            }
        }
?>
<head>
    <title>Edit Details</title>
</div>
<link rel="stylesheet" type="text/css" href="signupcss.css">
</head>

<body>
<div class="messages">
    <div class="log"> 
        <img src="https://www.paceind.com/wp-content/uploads/2016/09/display-14.png">
        <form method="post" action="saveuseredit.php">
            <div class="main">
                <div class="left">
                    <input type="text" value="<?php echo $firstname; ?>" name="firstname"><br>
                    <input type="text" value="<?php echo $lastname; ?>" name="lastname"><br>
                    <input type="text" value="<?php echo $username; ?>" name="username"><br>
                    <input type="text" value="<?php echo $usertype; ?>" name="usertype"><br>
                </div>
                <div class="right">
                    <input type="contact" value="<?php echo $contact; ?>" name="contact"><br>
                    <input type="email" value="<?php echo $email; ?>" name="email"><br>
                    <input type="password" value="<?php echo $password; ?>" name="password"><br>
                </div> 
        </div>
            <input class="sub" type="submit" value="Save">
        </form>
    </div>
</body>
</html>