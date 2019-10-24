<!DOCTYPE html>
<?php include("admin_sidebar.php")?>
<html>
    <head>
        <title>AdminDashBoard</title>
        <style>
            body
            {
                background-repeat: no-repeat;
                background-size: cover;
            }
            table
            {
                margin-left:250px;
                border-collapse: collapse;
            }
            #a
            {
                margin-top: 100px;
            }
            h3{
                margin-left:250px;
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
                margin-left:100px;
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
                background: aquamarine;
                border-radius: 3px;
                color:lightgray;
            }
            /* img
            {
                width:40px;
                height:18px;
            } */
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
            /* button:hover img
            {
                visibility: hidden;
                width:0px;
                height:0px;
            } */
        </style>
    </head>
    <body>
        <h3 id='a'>Pending Complaints</h3>
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
                        $img = $row["image"];
                        echo "<tr><td class='cid2'>".$row["complaintid"]."</td><td>".$row['username']."</td><td>".$row['authorityname']."</td><td>".$row['msg']."</td><td>"."<button onclick='img(\"$img\")' ><a href='javascript:void(0)'>View Image</a></button>"."</td><td class='cid2'>".$row['status']."</td></tr>";
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
                        $img = $row["image"];
                        echo "<tr><td class='cid2'>".$row["complaintid"]."</td><td>".$row['username']."</td><td>".$row['authorityname']."</td><td>".$row['msg']."</td><td>"."<button onclick='img(\"$img\")' ><a href='javascript:void(0)'>View Image</a></button>"."</td><td class='cid2'>".$row['status']."</td></tr>";
                    }
                }
            ?>
            <div id="form"></div>
            <script>
                function img(i)
                {
                    document.getElementById('form').innerHTML= '<form "style=display:none;" method="post" target="_blank" action="displayimg.php"><input type="text" id= "imgsrc" name="imgsrc"><input type="submit" id="submit"></form>';
                    document.getElementById('imgsrc').value = i;
                    document.getElementById('submit').click(); 
                }
            </script>
        </table>
        <br><br>
    </body>
</html>