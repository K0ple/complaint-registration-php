<html>  
    <head>
    <?php 
        include('user_sidebar.php');
        $user = $_SESSION['user'];
        include('config.php');
        $sql3 = "SELECT COUNT(status) from complaints where status=1 and username='$user'";
        $result3 = $conn->query($sql3);
        if($result3->num_rows>0)
            $row3 = $result3->fetch_assoc();
        $solvedcomplaintscount =  $row3['COUNT(status)'];
        $sql4 = "SELECT COUNT(status) from complaints where status=0 and username='$user'";
        $result4 = $conn->query($sql4);
        if($result4->num_rows>0)
            $row4 = $result4->fetch_assoc();
        $unsolvedcomplaintscount =  $row4['COUNT(status)'];

    ?>
        <title>USER DASHBOARD</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
           #a
           {
               border:0;
           }
           .d1{
               display: flex;
               flex-direction: row;
           }
           .d2{
                position: absolute;
                background-color: lightgreen;
                margin-top: 30px;
                outline: lightpink solid 3px;
                border: 20px solid lightblue;
                width: 600px;
                height: 300px;
                padding: 20px;
                left: 600px;
           }
           table
            {
                border-collapse: collapse;
            }
            td,th
            {
                padding: 10px;   
                width: 280px;
                text-align: center;
                font-size: 16px;
            }
            tr
            {
                background-color: lightgrey;
                border: 0;
                border: 2px solid white;
                width:100%;
            }
            th
            {
                background-color: grey;
                width:100%;
            }
            .cid
            {
                width:100px;
            }
            .rvw
            {
                width:550px;
            }
            .ra
            {
                width:400px;
            }
            .d3, .d4
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
            .d3:hover, .d4:hover
            {
                width: 220px;
                height:200px;
                padding: 40px;
                transition: 0.2s;
            }
            .main1
            {
                display: flex;
                flex-direction: row;
                position: absolute;
                left : 6%;
                top: 40%;
                background-color: transparent;
                width: 1000px;
                height: 250px;
            }
            .d3
            {
                background-color: lightgreen;
            }
            .d4
            {
                background-color: cyan;
            }
            a
            {
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="d1">
            <div class="d2">
                <h3>Your Recent Activity</h3>
        <table>
            <tr>
                <th class="cid">Complaint ID</th>
                <th>Authority Name</th>
                <th>Complaint</th>
                <th class="cid">Status</th>
            </tr>

            <?php 
                $edit = array();
                $edit2 = array();
                $edit4 = array();
                $edit6 = array();
                $edit8 = array();
                $i=0;
                include('config.php');
                $sql = "SELECT complaintid, authorityname, msg, image, status FROM complaints where username = '$user'";
                $result = $conn->query($sql);
                if($result->num_rows>0)
                {
                    $count = 0;
                    while($row = $result->fetch_assoc())
                    {
                        if($count<4)
                        {
                            $edit[$i] = $row["complaintid"]; 
                            $edit2[$i] = $row["authorityname"];
                            $edit4[$i]= $row["msg"];
                            $edit6[$i] = $row["image"];
                            $edit8[$i] = $row["status"]; 
                            echo "<tr><td class='cid'>".$row["complaintid"]."</td><td>".$row['authorityname']."</td><td>".$row['msg']."</td><td class='cid'>".$row['status']."</td></tr>";
                            $i++;
                            $count++;
                        }
                        else
                        {
                            break;
                        }
                    }
                }
            ?>
        </table>
        <form action="user_dashboard(cont).php" method="POST" >
                <input type="submit" value="view more &raquo" name="view comp" class="w3-button w3-theme w3-hover-green w3-hover-shadow">
        </form>
            </div>
            <div class='main1'>
            <a href='user_sol_complaints.php'>
                <div class="d3">
                    <p>Solved Complaints</p>
                    <p><?php echo $solvedcomplaintscount; ?></p>
                </div>
            </a>
            <a href='user_pen_complaints.php'>
                <div class="d4">
                    <p>Pending Complaints</p>
                    <p><?php echo $unsolvedcomplaintscount; ?></p>
                </div>
            </a>
            </div>
        <br><br>
        </div>
    </body>
</html>