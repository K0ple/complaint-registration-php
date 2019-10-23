<!DOCTYPE html>
<?php include("auth_sidebar.php")?>
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
            a{
                text-decoration: none;
                color:black;
            }
        </style>
    </head>
    <body>
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
                        echo "<tr><td class='cid2'>".$row["complaintid"]."</td><td>".$row['username']."</td><td>".$row['msg']."</td><td>"."<button onclick='img(\"$img\")' ><a href='javascript:void(0)'>View Image</a></button>"."</td><td class='cid2'>".$row['status']."</td></tr>";
                    }
                }
            ?>
        </table>
        <br><br>
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