<html>
<?php 
  echo '<ul class="ul1"><li class="li1"><a href="main.php">Home</a></li>';
  echo '<li class="li1"><a href="about.php">About</a></li>';
  if(isset($_SESSION['user'])==TRUE)
  {
    echo '<li class="li1"><a href="viewdetailsuser.php">Profile</a></li>';
    echo '<li class="li1"><a href="edituser.php">Edit Profile</a></li>';
    echo '<li class="li1"><a href="logout.php">Logout</a></li></ul>';
  }
  else
  {
    echo '<li class="li1"><a href="login.php">Login</a></li>';
    echo '<li class="li1"><a href="signup.php">Sign Up</a></li>';
    echo '<li class="li1"><a href="complaint.php">Complaint</a></li></ul>';
  }
?>
<style>
.ul1 {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color:DarkOrchid;
  border: 1px solid ghostwhite;
  border-radius: 40px;
}
.li1 {
  float: left;
}
.li1 a {
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
.li1 a:hover:not(.active) {
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