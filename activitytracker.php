<?php
session_name('coffee1'); 
session_start();
require("cfd.php");
if($_SESSION['ADMINSTATUS'] >= 1){
if(isset($_SESSION['USERNAME'])){
require("header.php");

function activitytracker($db, $id){
    $sql = "select username, dateadded, activity from activitytracker;";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
    echo "<div class=\"table table-responsive\">";
    echo "<table>";
    echo "<tr><th>Username</th><th>Date Added</th><th>Activity</th></tr>";
    while($row = mysqli_fetch_assoc($res)){
        echo "<tr><td>".$row['username']. "</td><td>".$row['dateadded']."</td><td>".$row['activity']."</td></tr>";
    }//end while
     echo "</table>";
}//end activitytracker()
?>
<main>
    <div class="wrapper">
<h2>Activity Tracker</h2>
<?php
echo activitytracker($db, 1);
?>
</div>
</main>
<?php
require("footer.php");
}else{
header("Location: " . $config_basedir );
}//end login
}else{
 header("Location: " . $config_basedir . "index.php");   
}//end admin if
?>