<?php
session_name('coffee1'); 
session_start();
require("cfd.php");
if($_SESSION['ADMINSTATUS'] >= 2){
if(isset($_SESSION['USERNAME'])){
require("header.php");

function admin_status($db, $id){
    $sql = "select username, a_level from login;";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
    echo "<div class=\"table-responsive\" style=\"width:40%; margin-left: auto; margin-right: auto;\">";
   echo " <table class=\"table table-hover table-sm\">";
   echo " <tr><th>Username</th><th>Admin Level</th></tr>";
 while($row = mysqli_fetch_assoc($res)){
        echo "<tr><td>".$row['username']. "</td><td>".$row['a_level']."</td></tr>";
    }//end while
    echo "</table>";
    echo "</div>";
}//end funciton
?>
<h2>Admin Status</h2>
<?
echo admin_status($db,1)
?>  
</div>
<?

require("footer.php");
}else{
header("Location: " . $config_basedir );
}//end login
}//end admin
?>