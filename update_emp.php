<?php
session_name('coffee1'); 
session_start();
require("cfd.php");
$title = "Update";
if($_SESSION['ADMINSTATUS'] >= 1){
if(isset($_SESSION['USERNAME'])){
    require("header.php");
    if(isset($_POST['submit'])){
	$storeid = filter_var($_POST['storeid'],FILTER_SANITIZE_STRING);
	$empid = filter_var($_POST['empid'],FILTER_SANITIZE_STRING);
	$jobtype = filter_var($_POST['jobtype'],FILTER_SANITIZE_STRING);
	$payrate = filter_var($_POST['payrate'],FILTER_SANITIZE_STRING);
	$empname = filter_var($_POST['empname'],FILTER_SANITIZE_STRING);
    $sql = "UPDATE employee SET empid = '".$empid."', storeid = '".$storeid."' , jobtype = '".$jobtype."', payrate = ".$payrate.", empname = '".$empname."' WHERE empid = '".$empid."';";
  if ( mysqli_query($db, $sql)){
    echo "*Employee has been updated.*";
  }
  else {mysqli_query($db,$sql) or die(mysqli_error($db)."<br>".$sql);}
  $username1 = $_SESSION['USERNAME'];
  $s = "INSERT INTO activitytracker(username, activity) VALUES('$username1','Updated Employee $empname , $jobtype $hiredate, $payrate');";
  $re = mysqli_query($db, $s) or die(mysqli_error($db));
    }//end if
 
function one_employee($db, $id){
    $sql = "select empid, storeid, empname, jobtype, hiredate, payrate from employee;";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
    echo "<div class=\"table-responsive\">";
    echo "<table class=\"table table-hover\" border='1' width='600'  height='600' >";
    echo "<tr><th>Employee ID</th><th>Store</th><th>Name</th><th>Position</th><th>Hire Date</th><th>Pay Rate</th></tr>";
    while($row = mysqli_fetch_assoc($res)){
        echo "<tr><td>".$row['empid']. "</td><td>".$row['storeid']."</td><td>".$row['empname']."</td><td>".$row['jobtype']."</td><td>".$row['hiredate']."</td><td>$".$row['payrate']."</td></tr>";
    }//end while
     echo "</table>";
     echo "</div>";
}//end one_employee()
?>
<main>
<div class="mx-auto mt-5 col-xl-8 col-lg-8 col-md-9 col-sm-10 col-xs-12"  >
    <form class="rounded"method='POST'>
        <div class="mx-auto" style="width: 200px;">
        <legend>Update Employee Information</legend>
  <label for="empid">Employee Id:</label><br>
  <select name="empid" id="empid">
    <?
     $sql = "SELECT empid FROM employee order by empid;";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        while($row = mysqli_fetch_assoc($res)){
            echo "<option value=".$row['empid'].">".$row['empid']."</option>";
        }//end while
    ?>
</select><br>
 <label for="storeid">Store Id:</label><br>
<select name="storeid" id="storeid">
    <?
     $sql = "SELECT storeid FROM store order by storeid;";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        while($row = mysqli_fetch_assoc($res)){
            echo "<option value=".$row['storeid'].">".$row['storeid']."</option>";
        }//end while
    ?>
</select><br>
 <label for="jobtype">Position:</label><br>
    <input type="text" id="jobtype" name="jobtype">
  <br> 
  <label for="payrate">Pay Rate:</label><br>
    <input type="text" id="payrate" name="payrate">
  <br>
  <label for="empname">Name:</label><br>
    <input type="text" id="empname" name="empname">
  <br> 
  <br>
  <input  type="submit" name="submit" value="Submit">
  </div>
    </form>
</div>
<h2>Employees</h2>
<?
echo one_employee($db, 1);
?>
</main>
<?
require("footer.php");
}else{
  header("Location: " . $config_basedir );
}//end login
}else{
header("Location: " . $config_basedir . "index.php");
}//end admin check
?>