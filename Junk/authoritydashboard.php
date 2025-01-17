<!DOCTYPE html>
<html>
<?php
    session_start();
    $user = $_SESSION['user'];
 ?>

    <head>
        <title>AuthorityDashBoard</title>
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
            button
            {
                color: black;
                text-decoration: underline;
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
                <th>Complaint</th>
                <th>Image</th>
                <th class="cid">Status</th>
                <th colspan="2"></th>
            </tr>
            <?php 
                $edit = array();
                $i=0;
                include('config.php');
                $sql = "SELECT complaintid, username, msg, image, status FROM complaints where authorityname = 'CHIRU' AND status=0";
                $result = $conn->query($sql);
                if($result->num_rows>0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        $edit[$i] = $row["complaintid"]; 
                        $img = $row["image"];
                        echo "<tr><td class='cid'>".$row["complaintid"]."</td><td>".$row['username']."</td><td>".$row['msg']."</td><td>"."<button onclick='img(\"$img\")'>View Image</button>"."</td><td class='cid'>".$row['status']."</td><td class='opt'>"."<button id='edit' onclick='solved($edit[$i])'><span class='edit'>SOLVED</span><img src='edit-regular.svg'></button></td></tr>";
                        $i++;
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
                <th>Complaint</th>
                <th>Image</th>
                <th class="cid2">Status</th>
            </tr>
            <?php 
                include('config.php');
                $sql = "SELECT complaintid, username, msg, image, status FROM complaints where authorityname = 'CHIRU' AND status=1";
                $result = $conn->query($sql);
                if($result->num_rows>0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        $img = $row["image"];
                        echo "<tr><td class='cid2'>".$row["complaintid"]."</td><td>".$row['username']."</td><td>".$row['msg']."</td><td>"."<button onclick='img(\"$img\")'>View Image</button>"."</td><td class='cid2'>".$row['status']."</td></tr>";
                    }
                }
            ?>
        </table>
        <br><br>
        <h3>Reviews given by users to you</h3>
        <table>
        <tr>
            <th class="cid">Review Id</th>
            <th class="ra">User Name</th>
            <th class="rvw">Review</th>
        </tr>
        <?php 
                $sql = "SELECT reviewid, username, text FROM reviews where authorityname = 'CHIRU'";
                $result = $conn->query($sql);
                if($result->num_rows>0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        echo "<tr><td class='cid'>".$row["reviewid"]."</td><td class='ra'>".$row['username']."</td><td class='rvw'>".$row["text"]."</td></tr>";
                    }
                }
            ?>
        </table>
        <div id="form"></div>
        <script>
            function solved(i)
            {
                document.getElementById('form').innerHTML = '<form "style = display:none;" action="statuschange.php" method="post"><input type="text" id="cid" name="cid"><input type="submit" id="submit"></form>';
                document.getElementById('cid').value = i;
                document.getElementById('submit').click();
            }
            function img(i)
            {
                document.getElementById('form').innerHTML= '<form "style=display:none;" method="post" target="_blank" action="displayimg.php"><input type="text" id= "imgsrc" name="imgsrc"><input type="submit" id="submit"></form>';
                document.getElementById('imgsrc').value = i;
                document.getElementById('submit').click(); 
            }
        </script>
    </body>
</html>