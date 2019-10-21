<html>
    <head>
        <title>USER DASHBOARD</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body{
                background-image: url("https://wallpapertag.com/wallpaper/full/e/1/0/118962-best-background-gradient-1920x1200-for-tablet.jpg");
            }
            ul{
                width: 250px;
                /* border-bottom:1px solid black; */
                margin-left: -50px;
                background-color: darkmagenta;
                color: antiquewhite;
                 /* height: 579px; */
                border-radius: 20px;
            }
            a{
                margin: 0;
                border: 0;
                outline: none;
                text-decoration: none;
                color: white;
            }

            li {
                border-bottom:1px solid black;
                padding-top: 24px;
                padding-bottom: 20px;
                text-align: center;
                font-size: 20px;
                margin-top: -20px;
                margin-bottom: 10px;
            }
            li:hover, button:hover
            {
                width: 250px;
                color: black;
                background-color: gold;
            }
            ul p{
            
                font-size: 20px;
                text-align: center;
                background-color: lightskyblue;
                padding-top: 20px;
                padding-bottom: 20px;
                margin-top: -10px;
                color: black;
               border-top-right-radius: 20px;
            }
            span .road, .water{
            
                visibility: hidden;
                color: red;
                width:0;
                height:0;
                padding:0;
                margin:0;
               
            }           
            #roadsub:hover .road 
            {
                visibility:visible;
                transition-delay: 0.2s;
                padding-top: 20px;
                padding-bottom: 20px;
                text-align: center;
                font-size: 20px;
                width: 250px;
                height: 20px;
                color: black;
                margin-top: -10px;
                background-color: aqua;
                
            }
            #roadsub .road:hover
            {
                
                width: 250px;
                color: black;
                background-color:gold;
            }
            #watersub:hover .water
            {
                visibility:visible;
                transition-delay: 0.2s;
                padding-top: 20px;
                padding-bottom: 20px;
                text-align: center;
                font-size: 20px;
                width: 250px;
                height: 20px;
                color: black;
                margin-top: -10px;
                background-color: aqua;
                
            }
           #watersub .water:hover{
            
                width: 250px;
                color: black;
                background-color:gold;
           }
           #a
           {
               border:0;
           }
        </style>
    </head>
    <body>
        <div name="dashboard">
                <img src="icons8-pull-down-64.png">
                <ul>
                    <p>Dashboard</p>
                    <span id="roadsub">
                    <li>ROADS  <i class="fa fa-caret-down"></i>
                    </li>
                   <li class="road">
                        <button onclick="fun('ACCIDENTS')">ACCIDENTS</button></li><li class="road">
                        <button onclick="fun('DAMAGE')">DAMAGE</button></li></span>
                    <li><button onclick="fun('DRAINAGE')" id="a">DRAINAGE</button></li>
                    <li><button id="b" onclick="fun('GARBAGE')">GARBAGE</button></li>
                    <span id="watersub">
                    <li>WATER  <i class="fa fa-caret-down"></i></li>
                    <li class="water"><button onclick="fun('WATER LEAKAGE')">WATER LEAKAGE</button></li>
                        <li class="water"><button onclick="fun('WATER SCARCITY')">WATER SCARCITY</button></li>
                        <li class="water"><button onclick="fun('DRINKING WATER')">DRINKING WATER</button></li></span>
                    <li><button onclick="fun('CORRUPTION')">CORRUPTION</button></li>
                    <li id="a"><button onclick="fun('THEFT')">THEFT</button></li>
                </ul>
                <a href="user_dashboard.php">View Complaints and Reviews</a>
            </div>
            <div id="form"></div>
            <script>
                function fun(type)
                {
                    document.getElementById('form').innerHTML = '<form "style= display:none;" action="sendcomplaint.php" method="post"><input type="text" id="type" name="type"><input type="submit" id="submit"></form>'
                    document.getElementById('type').value = type;
                    document.getElementById('submit').click(); 
                }
            </script>
    </body>
</html>