<html>
<?php 
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $_SESSION["rid"] = $_POST["reviewid"];
    $reviewid = $_POST["reviewid"];
    $authorityname = $_POST["authorityname"];
    $text = $_POST["text"];
}
?>
<body>
    <form action="saveeditreview.php" method="POST">
        Review ID : <p><?php echo $reviewid; ?></p><br>
        Authority Name : <p><?php echo $authorityname; ?></p><br>
        Text: <textarea id="text" name="text"></textarea><br>
        <input type="submit" value="Save">
    </form>
    <script>
        document.getElementById('text').value = "<?php echo $text; ?>";
    </script>
</body>
</html>