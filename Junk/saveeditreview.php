<?php 
session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $rid = $_SESSION["rid"];
        $text= $_POST["text"];
        include('config.php');
        $sql = "UPDATE reviews SET review='$text' WHERE review_id='$rid'";
        $conn->query($sql);
        header("location: user_reviews.php");
    }
    ?>