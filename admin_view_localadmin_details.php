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
                margin-left:30px;
                border-collapse: collapse;
                margin-right:30px;
            }
            h3{
                margin-left:250px;
            }
            #a
            {
                margin-top: 100px;
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

        </style>
    </head>
    <body>
    <h3 id='a'>LOCAL ADMIN DETAILS<h3>
        <table>
            <tr>
                <th>S.No</th>
                <th style="width: 100px;">Local Admin ID</th>
                <th style="width: 1500px;">Name</th>
                <th>Location</th>
                <th  style="width: 1500px;">Contact No.</th>
                <th class="rvm">Email ID</th>
            </tr>
        <?php 
            include('config.php');
            $sql = "SELECT * FROM user_details where usertype='local_admin'";
            $result = $conn->query($sql);
            if($result->num_rows>0)
            {
                $i = 1;
                while($row = $result->fetch_assoc())
                {
                  
                    echo "<tr><td>".$i++."</td><td class='cid'>".$row["user_id"]."</td><td class='ra'>".$row['firstname']." ".$row['lastname']."</td><td class='ra'>".$row['location']."</td><td class='ra'>".$row['contact']."</td><td class='rvw'>".$row["email"]."</td></tr>";
                  
                }
            }
            ?>
        </table>
    </body>
</html>