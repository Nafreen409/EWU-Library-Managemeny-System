<?php
session_start();
$userloginid = $_SESSION["userid"] = $_GET['userlogid'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>

<style>



body{
    background: linear-gradient(120deg, #1d2671, #c33764); 
    font-family: "Segoe UI", sans-serif;
}


.innerright, label {
    color: #1d2671; 
    font-weight: bold;
}

.container, .row, .imglogo {
    margin: auto;
}


.innerdiv {
    text-align: center;
    margin: 100px;
    background-color: #ffffff; 
    border-radius: 10px;       
}

.leftinnerdiv {
    float: left;
    width: 25%;
}

.rightinnerdiv {
    float: right;
    width: 75%;
}


.innerright {
    background-color: #f3f4ff; 
    padding: 15px;
}


.greenbtn {
    background: linear-gradient(120deg, #1d2671, #c33764); 
    color: #ffffff;                                        
    height: 40px;
    margin-top: 8px;
    border: none;
    font-weight: 600;
}

/* Links */
.greenbtn, a {
    text-decoration: none;
    font-size: large;
}

/* Table header */
th {
    background: linear-gradient(120deg, #1d2671, #c33764); 
    color: #ffffff;                                      

/* Table cells */
td {
    background-color: #ebeefe; 
    color: black;
}

td, a {
    color: #1d2671; 
}


</style>

<body>

<?php include("data_class.php"); ?>

<div class="container">
<div class="innerdiv">

    <div class="row">
        <span class="imglogo" style="font-size:36px;font-weight:bold;">
            EWU Library
        </span>
    </div>

    <!-- LEFT MENU -->
    <div class="leftinnerdiv">
        <br>
        <button class="greenbtn" onclick="openpart('myaccount')">My Account</button>
        <button class="greenbtn" onclick="openpart('requestbook')">Request Book</button>
        <button class="greenbtn" onclick="openpart('issuereport')">Book Report</button>
        <a href="index.php"><button class="greenbtn">LOGOUT</button></a>
    </div>

    <!-- MY ACCOUNT -->
    <div class="rightinnerdiv">
    <div id="myaccount" class="innerright portion">
        <button class="greenbtn">My Account</button>

        <?php
        $u = new data;
        $u->setconnection();
        $recordset = $u->userdetail($userloginid);
        foreach($recordset as $row){
            $name = $row[1];
            $email = $row[2];
            $type = $row[4];
        }
        ?>

        <p><u>Person Name:</u> <?php echo $name ?></p>
        <p><u>Person Email:</u> <?php echo $email ?></p>
        <p><u>Account Type:</u> <?php echo $type ?></p>
    </div>
    </div>

    <!-- ISSUE REPORT -->
    <div class="rightinnerdiv">
    <div id="issuereport" class="innerright portion" style="display:none">
        <button class="greenbtn">BOOK RECORD</button>

        <?php
        $recordset = $u->getissuebook($userloginid);
        $table="<table width='100%'><tr>
        <th>Name</th><th>Book</th><th>Issue</th><th>Return</th><th>Fine</th><th>Action</th></tr>";

        foreach($recordset as $row){
            $table.="<tr>
            <td>$row[0]</td>
            <td>$row[2]</td>
            <td>$row[3]</td>
            <td>$row[6]</td>
            <td>$row[7]</td>
            <td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>
            <button class='btn btn-primary'>Return</button></a></td></tr>";
        }
        $table.="</table>";
        echo $table;
        ?>
    </div>
    </div>

    <!-- REQUEST BOOK -->
 <!-- REQUEST BOOK -->
<div class="rightinnerdiv">
<div id="requestbook" class="innerright portion" style="display:none">
    <button class="greenbtn">Request Book</button>

    <?php
    $recordset = $u->getbookissue();
    $table="<table width='100%'><tr>
    <th>Name</th>
    <th>Author</th>
    <th>Branch</th>
    <th>Price</th>
    <th>Action</th>
    </tr>";

    foreach($recordset as $row){
        $table.="<tr>
        <td>$row[2]</td>
        <td>$row[4]</td>
        <td>$row[6]</td>
        <td>$row[7]</td>
        <td>
            <a href='requestbook.php?bookid=$row[0]&userid=$userloginid'>
                <button class='btn btn-primary'>Request</button>
            </a>
        </td>
        </tr>";
    }
    $table.="</table>";
    echo $table;
    ?>
</div>
</div>


<script>
function openpart(portion){
    var x=document.getElementsByClassName("portion");
    for(var i=0;i<x.length;i++){ x[i].style.display="none"; }
    document.getElementById(portion).style.display="block";
}
</script>

</body>
</html>
