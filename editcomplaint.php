<html>
<?php 
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $_SESSION["cid"] = $_POST["complaintid"];
    $complaintid = $_POST["complaintid"];
    $authorityname = $_POST["authorityname"];
    $complaint = $_POST["complaint"];
    $image = $_POST["image"];
    $status = $_POST["status"];
}
?>
<body>
    <form action="saveedit.php" method="POST">
        Complaint ID : <p><?php echo $complaintid; ?></p><br>
        Authority Name : <p><?php echo $authorityname; ?></p><br>
        Complaint: <textarea id="complaint" name="complaint"></textarea><br>
        Current Image: <img src ="" id="image" height=100 width=200><br>
        Status: <p><?php echo $status;?></p><br>
        <input type="submit" value="Save">
    </form>
    <script>
        document.getElementById('complaint').value = "<?php echo $complaint; ?>";
        document.getElementById('image').src = "<?php echo $image; ?>";
    </script>
</body>
</html>