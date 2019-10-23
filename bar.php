<html>
<?php 
  echo '<ul><li><a href="main.php">Home</a></li>';
  echo '<li><a href="about.php">About</a></li>';
  if(isset($_SESSION['user'])==TRUE)
  {
    echo '<li><a href="edituser.php">Profile</a></li>';
    echo '<li><a href="viewdetailsuser.php">Edit Profile</a></li>';
    echo '<li><a href="logout.php">Logout</a></li></ul>';
  }
  else
  {
    echo '<li><a href="login.php">Login</a></li>';
    echo '<li><a href="signup.php">Sign Up</a></li>';
    echo '<li><a href="login.php">Complaint</a></li></ul>';
  }
?>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color:darkmagenta;
  border: 1px solid ghostwhite;
  border-radius: 40px;
}
li {
  float: left;
}
li a {
  display: block;
  color: wheat;
  text-align: center;
  padding-top: 20px;
  padding-left: 100px;
  padding-bottom: 20px;
  padding-right: 110px;
  text-decoration: none;
  font-size: 18px;
  transition: 0.2s;
}
li a:hover:not(.active) {
  background-color: gold;
  color: black;
  transform: scale(1.3);
}
</style>
<!-- <ul>
  <li><a href="main.php">Home</a></li>
  <li><a href="login.php">Login</a></li>
  <li><a href="signup.php">Sign Up</a></li>
  <li><a href="#a.php">Log out</a></li>
  <li><a href="about.php">About</a></li>
</ul> -->
</html>