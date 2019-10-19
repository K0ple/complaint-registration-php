<!DOCTYPE html>
<html>
    <head>
        <title>UserDashBoard</title>
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
                width:60px;
            }
            .rvw
            {
                width:550px;
            }
            .ra
            {
                width:400px;
            }
            tr
            {
                background-color: aquamarine;
                border: 0;
                border: 2px solid white;
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
        <h3>Your Complaints</h3>
        <table>
            <tr>
                <th class="cid">Complaint ID</th>
                <th>Authority Name</th>
                <th>Complaint</th>
                <th>Image</th>
                <th class="cid">Status</th>
                <th colspan="2"></th>
            </tr>
            <?php 
                $edit = array();
                $i=0;
                for($x=0; $x<100;$x++)
                {
                    $edit[$x] = $x;
                }
                include('config.php');
                $sql = "SELECT complaintid, authorityname, msg, image, status FROM complaints where username = 'NIKHIL'";
                $result = $conn->query($sql);
                if($result->num_rows>0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        $edit[$i] = $row["complaintid"]; 
                        echo "<tr><td class='cid'>".$row["complaintid"]."</td><td>".$row['authorityname']."</td><td>".$row['msg']."</td><td>".$row['image']."</td><td class='cid'>".$row['status']."</td><td class='opt'>"."<button id='edit' onclick='edit($edit[$i])'><span class='edit'>EDIT</span><img src='edit-regular.svg'></button></td><td class='opt'><button id='del' onclick='deleted($edit[$i])''><span class='del'>DELETE</span><img src='trash-alt-regular.svg'></button></td></tr>";
                        $i++;
                    }
                }
            ?>
        </table>
        <br><br>
        <h3>Your Reviews</h3>
        <table>
        <tr>
            <th class="cid">Review Id</th>
            <th class="ra">Authority Name</th>
            <th class="rvw">Review</th>
            <th colspan="2"></th>
        </tr>
        <?php 
            $edit1 = array();
            $j=0;
            for($x=0; $x<100;$x++)
            {
                $edit1[$x] = $x;
            }
                $sql = "SELECT reviewid, authorityname, text FROM reviews where username = 'NIKHIL'";
                $result = $conn->query($sql);
                if($result->num_rows>0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        $edit1[$j] = $row["reviewid"]; 
                        echo "<tr><td class='cid'>".$row["reviewid"]."</td><td class='ra'>".$row['authorityname']."</td><td class='rvw'>".$row["text"]."</td><td class='opt'>"."<button id='edit' onclick='edit($edit1[$j])'><span class='edit'>EDIT</span><img src='edit-regular.svg'></button></td><td class='opt'><button id='del' onclick='deleted1($edit1[$j])''><span class='del'>DELETE</span><img src='trash-alt-regular.svg'></button></td></tr>";
                        $j++;
                    }
                }
            ?>
        </table>
        <div id="delete1"></div>
        <script>
            // function edit(i)
            // {   
            //     alert("HI");
            //     document.getElementById('delete1').innerHTML= '<form "style=display:none;" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"><input type="text" id= "complaintid" name="complaintid"><input type="submit" id="submit"></form>';
            //     document.getElementById('complaintid').value = i;
            //     // document.getElementById('submit').click();               
            // }
            function deleted(i)
            {   
                document.getElementById('delete1').innerHTML= '<form "style=display:none;" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"><input type="text" id= "complaintid" name="complaintid"><input type="submit" id="submit" name="submit1"></form>';
                document.getElementById('complaintid').value = i;
                document.getElementById('submit').click();               
            }
            function deleted1(i)
            {   
                document.getElementById('delete1').innerHTML= '<form "style=display:none;" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"><input type="text" id= "complaintid" name="reviewid"><input type="submit" id="submit" name="submit2"></form>';
                document.getElementById('complaintid').value = i;
                document.getElementById('submit').click();               
            }
        </script>
        <?php 
        $complaintid;
        $reviewid;
                if(isset($_POST['submit1']))
                {
                    $complaintid = $_POST['complaintid'];
                    
                    include('config.php');
                    $sql = "DELETE FROM complaints where complaintid=$complaintid";
                    $conn->query($sql);
                }
                if(isset($_POST['submit2']))
                {
                    $reviewid = $_POST['reviewid'];
                    $sql = "DELETE FROM reviews where reviewid=$reviewid";
                   $conn->query($sql);
                }
                $conn->close();
        ?>
        <!-- <meta http-equiv="refresh" content="2"/> -->
    </body>
</html>