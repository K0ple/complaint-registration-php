<!DOCTYPE html>
<html>
<?php include "user_sidebar.php"; 
$user = $_SESSION['user'];?>
    <head>
        <title>UserDashBoard</title>
        <style>
            body
            {
                background-repeat: no-repeat;
                background-size: cover;
            }
            table
            {
                margin-left:150px;
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
            h3{
                margin-left:150px;
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
                $edit2 = array();
                $edit4 = array();
                $edit6 = array();
                $edit8 = array();
                $i=0;
                include('config.php');
                $sql = "SELECT complaintid, authorityname, msg, image, status FROM complaints where status='0' and username = '$user'";
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
                        echo "<tr><td class='cid'>".$row["complaintid"]."</td><td>".$row['authorityname']."</td><td>".$row['msg']."</td><td>"."<button onclick='img(\"$edit6[$i]\")'>View Image</button>"."</td><td class='cid' id='status'>".$row['status']."</td><td class='opt'>"."<button id='edit' onclick='edited($edit[$i],\"$edit2[$i]\",\"$edit4[$i]\",\"$edit6[$i]\",$edit8[$i])'><span class='edit'>EDIT</span><img src='edit-regular.svg'></button></td><td class='opt'><button id='del' onclick='deleted($edit[$i])''><span class='del'>DELETE</span><img src='trash-alt-regular.svg'></button></td></tr>";
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