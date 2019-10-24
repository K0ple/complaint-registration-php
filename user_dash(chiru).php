<html>
    <?php include("bar.php")?>
    <head>
        <title>user-chiru</title>
        <style>
            body{
                /* background-image: url("https://wallpapertag.com/wallpaper/full/e/1/0/118962-best-background-gradient-1920x1200-for-tablet.jpg"); */
                background-color: lightpink;
            }
            .ul2{
                width: 250px;
                /* border-bottom:1px solid black; */
                margin-left: -50px;
                background-color: darkmagenta;
                color: antiquewhite;
                 /* height: 579px; */
                border-radius: 20px;
                margin-top: 0px;
            }
            a{
                margin: 0;
                border: 0;
                outline: none;
                text-decoration: none;
                color: white;
            }

            .li2 {
                border-bottom:1px solid black;
                padding-top: 24px;
                padding-bottom: 20px;
                text-align: center;
                font-size: 20px;
                margin-top: -20px;
                margin-bottom: 10px;
            }
            .li2:hover, button:hover
            {
                width: 250px;
                color: black;
                background-color: gold;
            }
            .ul2 p{
            
                font-size: 20px;
                text-align: center;
                background-color: lightskyblue;
                padding-top: 20px;
                padding-bottom: 20px;
                margin-top: -10px;
                color: black;
               border-top-right-radius: 20px;
            }
            .main{
                font-size:30px;
                margin-left:400px;
            }
        </style>
    </head>
    <body>
    <div class="main">
            <h1>USER DASHBOARD</h1>
        </div>
        <div class="d3">
                    <ul class="ul2">
                        <span id="roadsub">
                        <li class="li2"><a href ="" onclick="">DASHBOARD</a></li>
                        <li class="li2"><a href="" onclick="fun3()" id="a">PROFILE</a></li>
                        <li class="li2"><a href="add_complaint.php" id="b" onclick="fun4()">COMPLAINTS</a></li>
                        <span id="watersub">
                        <li class="li2"><a href ="" onclick="">REVIEW</a></li>
                        <!-- <li class="li2"><a href="add_complaint.php" onclick="fun8()"></a></li> -->
                        <li  class="li2" id="a"><a href="add_complaint.php" onclick="fun9()">LOGOUT</a></li>
                    </ul>
        </div>

            
    </body>
</html>