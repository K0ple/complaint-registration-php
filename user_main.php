<html>  
    <head>
    <?php 
        include('user_sidebar.php');
        $user_id = $_SESSION['user_id'];
        include('config.php');
        $sql3 = "SELECT COUNT(status) from complaints where status='solved' and user_id='$user_id'";
        $result3 = $conn->query($sql3);
        if($result3->num_rows>0)
            $row3 = $result3->fetch_assoc();
        $solvedcomplaintscount =  $row3['COUNT(status)'];
        $sql4 = "SELECT COUNT(status) from complaints where status!='solved' and user_id='$user_id'";
        $result4 = $conn->query($sql4);
        if($result4->num_rows>0)
            $row4 = $result4->fetch_assoc();
        $unsolvedcomplaintscount =  $row4['COUNT(status)'];
        $sql5 = "SELECT COUNT(review_id) from complaints cp join reviews rw on cp.complaint_id = rw.complaint_id where user_id='$user_id'";
        $result5 = $conn->query($sql5);
        if($result5->num_rows>0)
            $row5 = $result5->fetch_assoc();
        $reviewcount =  $row5['COUNT(review_id)'];

    ?>
        <title>USER DASHBOARD</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
           #a
           {
               border:0;
           }
           .d1{
               display: flex;
               flex-direction: row;
           }
           .d2{
               
                position: absolute;
                background-color: lightgreen;
                margin-top: 30px;
                outline: lightpink solid 3px;
                border: 20px solid lightblue;
                width: 600px;
                height: 300px;
                padding: 20px;
                left: 600px;
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
            tr
            {
                background-color: lightgrey;
                border: 0;
                border: 2px solid white;
                width:100%;
            }
            th
            {
                background-color: grey;
                width:100%;
            }
            .cid
            {
                width:100px;
            }
            .rvw
            {
                width:550px;
            }
            .ra
            {
                width:400px;
            }
            .d3, .d4
            {
                text-align: center;
                box-sizing: border-box;
                width: 200px;
                height: 190px;
                margin: 30px;
                padding: 30px;
                border-radius: 20px;
                font-size: 20px;
            }
            .d3:hover, .d4:hover
            {
                width: 220px;
                height:200px;
                padding: 40px;
                transition: 0.2s;
            }
            .main1
            {
                display: flex;
                flex-direction: row;
                position: absolute;
                left : 6%;
                top: 40%;
                background-color: transparent;
                width: 1000px;
                height: 250px;
            }
            .d3
            {
                background-color: lightgreen;
            }
            .d4
            {
                background-color: cyan;
            }
            a
            {
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="d1">
        
            <div class='main1'>
            <a href='user_sol_complaints.php'>
                <div class="d4">
                    <p>Solved Complaints</p>
                    <p><?php echo $solvedcomplaintscount; ?></p>
                </div>
            </a>
            <a href='user_pen_complaints.php'>
                <div class="d3">
                    <p>Pending Complaints</p>
                    <p><?php echo $unsolvedcomplaintscount; ?></p>
                </div>
            </a>
            <a href='user_reviews.php'>
                <div class="d4">
                    <p>Reviews</p>
                    <p><?php echo $reviewcount; ?></p>
                </div>
            </a>
            <a href='user_add_complaint.php'>
                <div class="d3">
                    <p>Add a new Complaint</p>
                </div>
            </a>
            </div>
        </div>
        <br><br>
       
    </body>
</html>