<!DOCTYPE html>
<?php 
include("user_sidebar.php");
$user=$_SESSION['user'];?>
<html>
    <head>
        <title>USER DashBoard</title>
        <style>
            body
            {
                background-repeat: no-repeat;
                background-size: cover;
            }
            table
            {
                margin-left:0px;
                border-collapse: collapse;
            }
            h3{
                margin-left:250px;
            }
            #a
            {
                margin-top: 30px;
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
        <h3 id='a'>Reviews given by you!!!</h3>
        <table>
        <tr>
            <th class="cid">Review Id</th>
            <th class="ra">User Name</th>
            <th class="ra">Authority Name</th>
            <th class="ra">Rating</th>
            <th class="rvw">Review</th>
            <th colspan="2"></th>
        </tr>
        <?php 
        $edit1 = array();
        $edit3 = array();
        $edit5 = array();
        $j=0;
        include('config.php');
                $sql = "SELECT reviewid, username, authorityname, text FROM reviews";
                $result = $conn->query($sql);
                if($result->num_rows>0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        $edit1[$j] = $row["reviewid"]; 
                        $edit3[$j] = $row["authorityname"];
                        $edit5[$j] = $row["text"];
                        
                        echo "<tr><td class='cid'>".$row["reviewid"]."</td><td class='ra'>".$row['username']."</td><td class='ra'>".$row['authorityname']."</td><td class='ra'>"."Rating HERE"."</td><td class='rvw'>".$row["text"]."</td><td class='opt'>"."<button id='edit' onclick='edited1($edit1[$j],\"$edit3[$j]\",\"$edit5[$j]\")'><span class='edit'>EDIT</span><img src='edit-regular.svg'></button></td><td class='opt'><button id='del' onclick='deleted1($edit1[$j])''><span class='del'>DELETE</span><img src='trash-alt-regular.svg'></button></td></tr>";
                        $j++;
                    }
                }
            ?>
            <div id="delete1"></div>
            <script>
            
            function edited1(i,j,k)
            {
                document.getElementById('delete1').innerHTML = '<form "style=display:none;" method="post" action="editreview.php"><input type="text" id= "reviewid" name="reviewid"><input type="text" id="authorityname" name="authorityname"><input type="text" id="text" name="text"><input type="submit" id="sub"></form>';
                document.getElementById('reviewid').value = i;
                document.getElementById('authorityname').value = j;
                document.getElementById('text').value = k;
                document.getElementById('sub').click(); 
            }
            function deleted1(i)
            {   
                document.getElementById('delete1').innerHTML= '<form "style=display:none;" method="post" action="delete.php"><input type="text" id= "complaintid" name="reviewid"><input type="submit" id="submit" name="submit2"></form>';
                document.getElementById('complaintid').value = i;
                document.getElementById('submit').click();               
            }
        </script>
        </table>
    </body>
</html>