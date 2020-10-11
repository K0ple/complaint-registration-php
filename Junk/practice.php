<html>
    <head>
        <title>USER DASHBOARD</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body{
                background-image: url("https://wallpapertag.com/wallpaper/full/e/1/0/118962-best-background-gradient-1920x1200-for-tablet.jpg");
            }
            .main
            {
                margin-top:60px;
            }
            .main1
            {
                display:flex;
                flex-direction: row;
                margin-left: 120px;
            }
            .left,.middle,.right
            {
                box-sizing: border-box;
                padding-top:40px;
                text-align:center;
                background-color: rgb(40, 40, 40);
                width: 300px;
                height: 100px;
                border: 1px;
                margin: 30px;
            }
            button
            {
                background: none;
                border: 0;
                outline: 0;
                font-size: 16px;
            }
            .left:hover, .middle:hover, .right:hover
            {
                width:320px;
                height: 120px;
                padding-top: 50px;
                transition-delay: 0.2s;
            }
            #accidents
            {
                background-color: #007CFF;
            }
            #damage
            {
                background-color:#99A096;
            }
            #drainage
            {
                background-color:#FFF634;
            }
            </style>
    </head>
    <body>
        <div name="dashboard">
            <div class="main">
                <div class="main1">
                    <div class="left" id="accidents"><button onclick="fun('ACCIDENTS')">ACCIDENTS</button></div>
                    <div class="middle" id="damage"><button onclick="fun('DAMAGE')">DAMAGE</button></div>
                    <div class="right" id="drainage"><button onclick="fun('DRAINAGE')">DRAINAGE</button></div>
                </div>
                <div class="main1">
                    <div class="left" id="garbage"><button onclick="fun('GARBAGE')">GARBAGE</button></div>
                    <div class="middle" id="waterleakage"><button onclick="fun('WATER LEAKAGE')">WATER LEAKAGE</button></div>
                    <div class="right" id="waterscarcity"><button onclick="fun('WATER SCARCITY')">WATER SCARCITY</button></div>
                </div>
                <div class="main1">
                    <div class="left" id="drinkingwater"><button onclick="fun('DRINKING WATER')">DRINKING WATER</button></div>
                    <div class="middle" id="corruption"><button onclick="fun('CORRUPTION')">CORRUPTION</button></div>
                    <div class="right" id="theft"><button onclick="fun('THEFT')">THEFT</button></div>
                </div>
            </div>
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