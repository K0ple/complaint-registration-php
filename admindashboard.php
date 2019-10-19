<!DOCTYPE html>
<html>
<?php
    session_start();
    $user = $_SESSION['user'];
 ?>
    <head>
        <title>AdminDashBoard</title>
        <style>
            body
            {
                background: url();
                background-repeat: no-repeat;
                background-size: cover;
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
            .cid
            {
                width:90px;
            }
            .rvw
            {
                width:900px;
            }
            .ra
            {
                width:300px;
            }
            tr
            {
                background-color: aquamarine;
                border: 0;
                border: 2px solid white;
            }
            tr:hover
            {
                background-color: #FFC0CB;
            }
            th
            {
                background-color: lawngreen;
            }
            .opt
            {
                width: 100px;
            }
            button
            {
                outline: none;
                border:0;
                background: transparent;
                border-radius: 3px;
                color:lightgray;
            }
            img
            {
                width:40px;
                height:18px;
            }
            button .edit, .del
            {
                text-align: center;
                visibility: hidden;
                font-size:0;
                
            }
            button:hover .edit
            {
                visibility: visible;
                color: blue;
                font-size:14px;
            }
            button:hover .del
            {
                visibility: visible;
                color: red;
                font-size:14px;
            }
            button:hover img
            {
                visibility: hidden;
                width:0px;
                height:0px;
            }
        </style>
    </head>
    <body>
        <h2>Welcome <?php echo $user;?></h2>
        <h3>Pending Complaints</h3>
        <table>
            <tr>
                <th class="cid">Complaint ID</th>
                <th>User Name</th>
                <th>Authority Name</th>
                <th>Complaint</th>
                <th>Image</th>
                <th class="cid">Status</th>
            </tr>
            <?php 
                include('config.php');
                $sql = "SELECT complaintid, username, authorityname, msg, image, status FROM complaints where status=0";
                $result = $conn->query($sql);
                if($result->num_rows>0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        echo "<tr><td class='cid2'>".$row["complaintid"]."</td><td>".$row['username']."</td><td>".$row['authorityname']."</td><td>".$row['msg']."</td><td>".$row['image']."</td><td class='cid2'>".$row['status']."</td></tr>";
                    }
                }
            ?>
        </table>
        <br><br>
        <h3>Solved Complaints</h3>
        <table>
            <tr>
                <th class="cid2">Complaint ID</th>
                <th>User Name</th>
                <th>Authority Name</th>
                <th>Complaint</th>
                <th>Image</th>
                <th class="cid2">Status</th>
            </tr>
            <?php 
                include('config.php');
                $sql = "SELECT complaintid, username, authorityname, msg, image, status FROM complaints where status=1";
                $result = $conn->query($sql);
                if($result->num_rows>0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        echo "<tr><td class='cid2'>".$row["complaintid"]."</td><td>".$row['username']."</td><td>".$row['authorityname']."</td><td>".$row['msg']."</td><td>".$row['image']."</td><td class='cid2'>".$row['status']."</td></tr>";
                    }
                }
            ?>
        </table>
        <br><br>
        <h3>Reviews given by users</h3>
        <table>
        <tr>
            <th class="cid">Review Id</th>
            <th class="ra">User Name</th>
            <th class="ra">Authority Name</th>
            <th class="rvw">Review</th>
        </tr>
        <?php 
                $sql = "SELECT reviewid, username, authorityname, text FROM reviews";
                $result = $conn->query($sql);
                if($result->num_rows>0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        echo "<tr><td class='cid'>".$row["reviewid"]."</td><td class='ra'>".$row['username']."</td><td class='ra'>".$row['authorityname']."</td><td class='rvw'>".$row["text"]."</td></tr>";
                    }
                }
            ?>
        </table>
    </body>
</html>