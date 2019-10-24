<html>
<?php include "bar.php"; ?>
<head>
        <title>
            ADD Complaint
        </title>
        <link rel="import" href="NAVIGATIONBAR.html" >
    </head>
    <body style="background-color:Moccasin">
        <div id="d1">
            <h1>
		<br>
                Through Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </h1>
            <textarea id=t1 rows="10" cols="130">
                
            </textarea></br>
            <h2>Upload Image Here:-<input type="file" name="pic"></br></h2>
            <input id=f2 type="submit">
        </div>
        <div id="d2">
            <h1>
                    Through Message&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </h1>
            <textarea id=t2 rows="10" cols="130">

            </textarea></br> <br> <br>
            <input id=f1 type="submit">
        </div>
        
    </body>
    <style>
        #d1{
            background-image: url("email_pic.jpg");
	    background-size: auto;
            margin: 100px;
            font-weight:bold;
            text-align:center;
            color:#003E00;
        }
        #d2{
            background-image: url("sms_pic.png");
            margin: 100px;
            padding: 1px;
            background-size: auto;
	    font-weight:bold;
            text-align:center;
	    color:#003E00;
        }
        #f1,#f2
	{
            font-weight:bold;
            background-color:lightpink;
            width:300px; 
            height:50px;
            font-size:24;
	}
		
        #t1{
            background-color:#e4d1d1;
        }
        #t2{
            background-color:#e4d1d1;
            
        }
    </style>
</html>
