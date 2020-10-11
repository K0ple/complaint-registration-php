<html>
<?php 
    session_start();
    echo $_SESSION['user'].'<br>';
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $_SESSION['type'] = $_POST['type'];
        echo $_SESSION['type'].'<br>';
    }
?>
<head>
        <title>ADD Complaint</title>
        <style>
            body{
                background-image: url(sendmessagebackground.jpg);
                background-repeat: no;
                background-size: cover;
            }
            .main
            { 
                margin-top: 5%;
                display: flex;
                flex-direction: row;
            }
            .left, .right{
                background-color: rgb(40, 40, 40);
                width: 560px;
                height: 420px;
                border: 1px solid burlywood;
                border-radius: 10px;
                margin-left: 50px;
                margin-right: 50px;
                margin-top: 40px;
                margin-bottom: 40px;
            }
            h2
            {
                text-align: center;
                color: cyan;
            }
            textarea
            {
                margin-left: 50px;
                width: 460px;
                height: 150px;
                margin-right: 50px;
                background-color: darkgrey;
                margin-bottom: 50px;
                margin-top: 20px;
                font-size: 16px;
            }
            label
            {
                color: antiquewhite; 
                font-size: 17px;
                margin-left : 50px;
                margin-right: 20px;
            }
            input[type="submit"]
            {
                outline: none;
                position: relative;
                left:40%;
                font-size: 14px;
                margin-top: 30px;
                padding-top: 5px;
                padding-bottom: 5px;
                padding-left: 25px;
                padding-right: 25px;
                background: none;
                color: aqua;
                border-radius: 20px;
            }
        </style>
    </head>
    <body>
    <div class="main">
        <div class="left">
            <form method="post" enctype="multipart/form-data" action="savecomplaint.php">
                <h2>Email</h2><br>
                <textarea name="msg"></textarea><br>
                <label for="fileToUpload">Upload Image</label><input type="file" id="fileToUpload" name="fileToUpload"><br>
                <input type="submit">
            </form>
        </div>
    </div>
    </body>
</html>