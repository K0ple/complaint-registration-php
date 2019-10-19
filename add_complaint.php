<html>
<?php include "bar.php"; ?>
<head>
        <title>
            ADD Complaint
        </title>
    </head>
    <body>
    <div id="main">
        <div id="left">
            <h1>
                Through Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </h1>
            <textarea id=t1 rows="4" cols="40">
                
            </textarea></br>
            Upload Image Here:-<input type="file" name="pic"></br>
            <input type="submit">
        </div>
        <div id="right">
            <h1>
                    Through Message&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </h1>
            <textarea id=t2 rows="4" cols="40">

            </textarea></br>
            <input type="submit">
        </div>
    </div>
    </body>
    <style>
        #d1{
            background-image: url("email_pic.jpg");
            margin: 100px;
        }
        #d2{
            background-image: url("sms_pic.png");
            margin: 100px;
            padding: 1px;
        }
        #t1{
            background-color:aliceblue;
        }
        #t1{
            background-color:aliceblue;
            
        }
    </style>
</html>