<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
     header("location: ../");
    }

$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if($_SESSION['userdata']['status']==0){
    $status = '<b style="color:red"> Not voted</b>';
}
else{
    $status = '<bstyle="color:green "> Voted</b>';
}

?>
<html>
<head>
    <title>Online voting system - Dashboard</title>
</head>
<style>
body{
background-color:#23a2f6;
font-family:georgia;
color:#fff;
}
h1{text-align:center;
}
#backbtn{
    float:left;
    width: 10%;
    padding: 5px;
    background-color: #fff;
    color: #23a2f6;
    font-size: 15px;
    border: 1px solid black;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}
#logoutbtn{
    float:right;
    width: 10%;
    padding: 5px;
    background-color: #fff;
    color: #23a2f6;
    font-size: 15px;
    border: 1px solid black;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}
#Profile{
background-color:#fff;
color:#23a2f6;
width:30%;
padding:20px;
float:left;
}
#Group{
background-color:#fff;
color:#23a2f6;
width:60%;
padding:20px;
float:right;
}
#votebtn{
    float:left;
    width: 10%;
    padding: 5px;
    background-color: #fff;
    color: #23a2f6;
    font-size: 15px;
    border: 1px solid black;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}
#mainpanel{
padding:10px;

}
</style>
<body>
<div id="main">
<a href ="../"><button id="backbtn">Back</button></a>
<a href ="logout.php" ><button id="logoutbtn">Logout</button></a><br>
    <h1>Online Voting system</h1>
    <hr>
    <div id="mainpanel">
 <div id ="Profile">
    <center><img src="../uploads/<?php echo $userdata['photo']; ?>" height ="100" width= "100"></center><br>
    <b>Name: <?php echo $userdata['name'] ?></b><br><br>
    <b>Mobile: <?php echo $userdata['mobile'] ?></b><br><br>
    <b>Address: <?php echo $userdata['address'] ?></b><br><br>
    <b>Status: <?php echo $status ?></b><br><br>

         </div>
    <div id = "Group">
        <?php
            if($_SESSION['groupsdata']){
                for($i=0; $i<count($groupsdata);$i++){
                    ?>
                    <div>
                    <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo']  ?>" height="100" width="100">
                    <b>Group name: </b><?php echo $groupsdata[$i]['name'] ?><br><br>
                    <b>Votes: </b><?php echo $groupsdata[$i]['votes'] ?><br><br>
                    <form action="../api/vote.php" method="POST">
                    <input type="hidden" name="gvotes" value="<?php  echo $groupsdata[$i]['votes'] ?>">
                    <input type="hidden" name="gid" value="<?php  echo $groupsdata[$i]['id'] ?>">

                    <input type="submit" name="votebtn" value="Vote" id="votebtn"><br><br>
                    </form>
                    </div>
                    <hr>
                    <?php
                }
            }
            else{

            }

        ?>
    </div>

    </div>



</div>


</body>
</html>


