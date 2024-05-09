<?php
session_name('coffee1'); 
session_start();
require("cfd.php");
if(isset($_SESSION['USERNAME'])){
require("header.php");

function one_employee($db, $id){
    $movie_data = "";
    $sql = "select empid, storeid, empname, jobtype, hiredate, round(payrate,2) from employee order by storeid;";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
        echo "<div class=\"table-responsive\">";
    echo "<table class=\"table table-hover\" >";
    echo "<tr><th>Employee ID</th><th>Store</th><th>Name</th><th>Position</th><th>Hire Date</th><th>Pay Rate</th></tr>";
    while($row = mysqli_fetch_assoc($res)){
        echo "<tr><td>".$row['empid']. "</td><td>".$row['storeid']."</td><td>".$row['empname']."</td><td>".$row['jobtype']."</td><td>".$row['hiredate']."</td><td>$".$row['round(payrate,2)']."</td></tr>";
    }//end while
     echo "</table>";
     echo "</div>";
}//end one_order3()
?>

<div class="col " >
<?php
echo "<h2>All Employees</h2>";
echo one_employee($db, 1);
?>
</div>
</div>
</div>
<?
require("footer.php");
}else{
header("Location: " . $config_basedir );
}//end login
?>