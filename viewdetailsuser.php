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
    <title>View Details</title>
</div>
<link rel="stylesheet" type="text/css" href="signupcss.css">
</head>

<body>
<div class="messages">
    <div class="log"> 
        <img src="https://www.paceind.com/wp-content/uploads/2016/09/display-14.png">
            <div class="main">
                <div class="left">
                    <input type="text" value="<?php echo $firstname; ?>" name="firstname" readonly><br>
                    <input type="text" value="<?php echo $lastname; ?>" name="lastname" readonly><br>
                    <input type="text" value="<?php echo $username; ?>" name="username" readonly><br>
                    <input type="text" value="<?php echo $usertype; ?>" name="usertype" readonly><br>
                </div>
                <div class="right">
                    <input type="contact" value="<?php echo $contact; ?>" name="contact"><br>
                    <input type="email" value="<?php echo $email; ?>" name="email"><br>
                    <input type="password" value="<?php echo $password; ?>" name="password"><br>
                </div> 
        </div>
    </div>
</body>
</html>