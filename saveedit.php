<?php 
session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $cid = $_SESSION["cid"];
        $complaint = $_POST["complaint"];
        $image = $_POST["image"];
        include('config.php');
        $sql = "UPDATE complaints SET msg='$complaint', image='$image' WHERE complaintid='$cid'";
        $conn->query($sql);
        header("location: user_complaints.php");
    }
    ?>