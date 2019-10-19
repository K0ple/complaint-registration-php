<?php 
    include('config.php');
    $complaintid;
    $reviewid;
    if(isset($_POST['submit1']))
    {
        $complaintid = $_POST['complaintid'];
        
        include('config.php');
        $sql = "DELETE FROM complaints where complaintid=$complaintid";
        $conn->query($sql);
    }
    if(isset($_POST['submit2']))
    {
        $reviewid = $_POST['reviewid'];
        $sql = "DELETE FROM reviews where reviewid=$reviewid";
        $conn->query($sql);
    }
    header("location:user_dashboard.php");
?>