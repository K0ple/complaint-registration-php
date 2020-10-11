<!DOCTYPE html>
<html>
<?php include "user_sidebar.php"; 
$user = $_SESSION['user'];?>
    <head>
        <title>UserDashBoard</title>
        <style>
            table
            {
                margin-left:50px;
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
                margin-left:100px;
            }
            tr:hover
            {
                background-color: #FFC0CB;
            }
            th
            {
                background-color: lawngreen;
            }
            button
            {
                outline: none;
                border:0;
                background: transparent;
                border-radius: 3px;
                color: black;
                text-decoration: underline;
            }
            h3
            {
                margin-left:50px;
            }
        </style>
    </head>
    <body>
        <h3>Your Complaints</h3>
        <table>
            <tr>
                <th class='th1' class="cid">Complaint ID</th>
                <th>Authority Name</th>
                <th>Complaint</th>
                <th>Image</th>
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
                $sql = "SELECT complaintid, authorityname, msg, image, status FROM complaints where  username = '$user'";
                $result = $conn->query($sql);
                if($result->num_rows>0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        $edit[$i] = $row["complaintid"]; 
                        $edit2[$i] = $row["authorityname"];
                        $edit4[$i]= $row["msg"];
                        $edit6[$i] = $row["image"];
                        $edit8[$i] = $row["status"];
                        if($row['status']=='0')
                        {
                            echo "<tr><td class='cid'>".$row["complaintid"]."</td><td>".$row['authorityname']."</td><td>".$row['msg']."</td><td>"."<button onclick='img(\"$edit6[$i]\")'>View Image</button>"."</td><td class='cid' id='status'>".$row['status']."</td></tr>";
                        }
                        else{
                            echo "<tr><td class='cid'>".$row["complaintid"]."</td><td>".$row['authorityname']."</td><td>".$row['msg']."</td><td>"."<button onclick='img(\"$edit6[$i]\")'>View Image</button>"."</td><td class='cid' id='status'>".$row['status']."</td></tr>";
                        
                        }
                        $i++;
                    }
                }
            ?>
        </table>
        <br><br>
 
        <div id="delete1"></div>
        <script>
            function edited(i,j,k,l,m)
            {   
                document.getElementById('delete1').innerHTML= '<form "style=display:none;" method="post" action="editcomplaint.php"><input type="text" id= "complaintid" name="complaintid"><input type="text" id="authorityname" name="authorityname"><input type="text" name="complaint" id="complaint"><input type="text" id="image" name="image" ><input type="status" id="status" name="status"><input type="submit" id="submit"></form>';
                document.getElementById('complaintid').value = i;
                document.getElementById('authorityname').value = j;
                document.getElementById('complaint').value = k;
                document.getElementById('image').value = l;
                document.getElementById('status').value = m;
                document.getElementById('submit').click();               
            }
            
            function deleted(i)
            {   
                document.getElementById('delete1').innerHTML= '<form "style=display:none;" method="post" action="delete.php"><input type="text" id= "complaintid" name="complaintid"><input type="submit" id="submit" name="submit1"></form>';
                document.getElementById('complaintid').value = i;
                document.getElementById('submit').click();               
            }
            
            function img(i)
            {
                document.getElementById('delete1').innerHTML= '<form "style=display:none;" target="_blank" method="post" action="displayimg.php"><input type="text" id= "imgsrc" name="imgsrc"><input type="submit" id="submit"></form>';
                document.getElementById('imgsrc').value = i;
                document.getElementById('submit').click(); 
            }
        </script>
    </body>
</html>