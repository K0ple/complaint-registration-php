<html>
<?php 
    include('config.php');
    $sql1 = "SELECT COUNT(username) from user_details where usertype='citizen'";
    $result1 = $conn->query($sql1);
    if($result1->num_rows>0)
        $row1 = $result1->fetch_assoc();
    $usercount =  $row1['COUNT(username)'];
    $sql2 = "SELECT COUNT(username) from user_details where usertype='authority'";
    $result2 = $conn->query($sql2);
    if($result2->num_rows>0)
        $row2 = $result2->fetch_assoc();
    $authoritycount =  $row2['COUNT(username)'];
    $sql3 = "SELECT COUNT(status) from complaints where status=1";
    $result3 = $conn->query($sql3);
    if($result3->num_rows>0)
        $row3 = $result3->fetch_assoc();
    $solvedcomplaintscount =  $row3['COUNT(status)'];
    $sql4 = "SELECT COUNT(status) from complaints where status=0";
    $result4 = $conn->query($sql4);
    if($result4->num_rows>0)
        $row4 = $result4->fetch_assoc();
    $unsolvedcomplaintscount =  $row4['COUNT(status)'];
    
?>
    <head>
        <title>ADMIN DASH</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body{
                background-image: url("https://wallpapertag.com/wallpaper/full/e/1/0/118962-best-background-gradient-1920x1200-for-tablet.jpg");
                /* background-color: lightpink; */
            }
            .sidebar{
                height:100%;
                background-color: black;
                width: 250px;
                position: fixed;
                top: 0;
                left: 0;
                overflow: hidden;
                padding-top: 100px;
            }
            .sidebar a{
                text-decoration: none;
                font-size:25px;
                color:white;
                padding:10px;
                display:block;
            }
            .sidebar a:hover{
                color: gold;
            }
            .main{
                margin-left:500px;
            }
            img{
                width: 100px;
                height: 100px;
                border-radius: 50%;
                position: absolute;
                top: 20px;
                left: calc(50% - 50px);
            }
            h1{
                font-size: 50px;
                
            }
            .main1
            {
                display: flex;
                flex-direction: row;
                position: absolute;
                left : 22%;
                top: 30%;
                background-color: transparent;
                width: 1000px;
                height: 250px;
            }
            .first, .second, .third, .fourth
            {
                text-align: center;
                box-sizing: border-box;
                width: 200px;
                height: 190px;
                margin: 30px;
                padding: 30px;
                border-radius: 20px;
                font-size: 20px;
            }
            .first:hover, .second:hover, .third:hover, .fourth:hover
            {
                width: 220px;
                height:200px;
                padding: 40px;
                transition: 0.2s;
            }
            .first
            {
                background-color: gray;
            }
            .second
            {
                background-color: gold;
            }
            .third
            {
                background-color: lightgreen;
            }
            .fourth
            {
                background-color: cyan;
            }
        </style>
    </head>
    <body>
        <div class="sidebar">
            <img src="https://www.paceind.com/wp-content/uploads/2016/09/display-14.png"><br>
            <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&#9776; MENU</a><br> -->
            <a href="admin_sidebar.php" ><i class="fa fa-home fa-fw"></i>DASHBOARD</a><br>
            <a href="admindashboard_complaints.php" >VIEW COMPLAINT</a><br>
            <a href="admindashboard_reviews.php" >VIEW REVIEWS</a><br>
            <a href="admin_view_userdetails.php" >USER DETAILS</a><br>
            <a href="admin_view_auth_details.php" >AUTHORITIES</a><br>
            <!-- <a href="" >AUTHORITY DETAILS</a><br> -->
        </div>
        <div class="main">
            <h1>WELCOME &nbsp;&nbsp;ADMIN!!!</h1>
        </div>
        <div class="main1">
            <div class="first">
                <p>Number of Users</p>
                <p><?php echo $usercount; ?></p>
            </div>
            <div class="second">
                <p>Number of Authorities</p>
                <p><?php echo $authoritycount; ?></p>
            </div>
            <div class="third">
                <p>Solved Complaints</p>
                <p><?php echo $solvedcomplaintscount; ?></p>
            </div>
            <div class="fourth">
                <p>Pending Complaints</p>
                <p><?php echo $unsolvedcomplaintscount; ?></p>
            </div>
        </div>
    </body>
</html>