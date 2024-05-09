<?php
session_name('coffee1'); 
session_start();
require("cfd.php");
if(isset($_SESSION['USERNAME'])){
require("header.php");

function one_store($db, $id){
    $sql = "select storeid, address, manager from store;";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
    echo "<div class=\"table-responsive\" style=\"width:40%; margin-left: auto; margin-right: auto;\">";
   echo " <table class=\"table table-hover table-sm\">";
   echo " <tr><th>Storeid</th><th>Address</th><th>Manager</th></tr>";
 while($row = mysqli_fetch_assoc($res)){
        echo "<tr><td>".$row['storeid']. "</td><td>".$row['address']."</td><td>".$row['manager']."</td></tr>";
    }//end while
    echo "</table>";
    echo "</div>";
}//end funciton
?>
<h2>Stores</h2>
<?
echo one_store($db,1)
?>  
</div>
<?

require("footer.php");
}else{
header("Location: " . $config_basedir );
}//end login
?>