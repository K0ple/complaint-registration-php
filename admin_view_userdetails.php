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
        <h3 id='a'>USER DETAILS<h3>
        <table>
            <tr>
                <th class="cid">User Name</th>
                <th class="ra">First Name</th>
                <th>Last Name</th>
                <th>Contact No.</th>
                <th class="rvm">Email ID</th>
            </tr>
        <?php 
            include('config.php');
            $sql = "SELECT * FROM user_details";
            $result = $conn->query($sql);
            if($result->num_rows>0)
            {
                while($row = $result->fetch_assoc())
                {
                    if($row['usertype']=="citizen"){
                    echo "<tr><td class='cid'>".$row["username"]."</td><td class='ra'>".$row['firstname']."</td><td class='ra'>".$row['lastname']."</td><td class='ra'>".$row['contact']."</td><td class='rvw'>".$row["email"]."</td></tr>";
                    }
                }
            }
            ?>
        </table>
    </body>
</html>