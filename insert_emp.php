<?php
session_name('coffee1'); 
session_start();
require("cfd.php");
$title = "Insert";
if($_SESSION['ADMINSTATUS'] >= 1){
if(isset($_SESSION['USERNAME'])){
    require("header.php");
if(isset($_POST['submit'])){
    $storeid = filter_var ($_POST['storeid'],FILTER_SANITIZE_STRING);
	$empname = filter_var ($_POST['empname'],FILTER_SANITIZE_STRING);
	$jobtype = filter_var ($_POST['jobtype'],FILTER_SANITIZE_STRING);
	$hiredate = filter_var ($_POST['hiredate'],FILTER_SANITIZE_STRING);
	$payrate = filter_var ($_POST['payrate'],FILTER_SANITIZE_STRING);
    $sql = "INSERT INTO employee(storeid, empname, jobtype, hiredate, payrate) values(".$storeid.", '".$empname."', '".$jobtype."','".$hiredate."',".$payrate.")";
  if ( mysqli_query($db, $sql)){
    echo "*Employee has been added.*";
  }
  else {mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);}
}//end if
$last_id = mysqli_insert_id($db);
    $isql = "insert into activitytracker(username, dateadded, empid, activity) VALUES('".$_SESSION['USERNAME']."',now(),".$last_id.",'Added an employee with the id of $last_id');";
    mysqli_query($db, $isql);
    ?>
    <main>
   <div class="mx-auto mt-5 col-xl-8 col-lg-8 col-md-9 col-sm-10 col-xs-12"  >
    <form class="rounded" method='post'>
        <div class="mx-auto" style="width: 200px;">
         <legend>Add Employee</legend><br>
    <label for="storeid">Store:</label>
    <select name='storeid'>
        <?
        $sql = "SELECT storeid FROM store order by storeid;";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        while($row = mysqli_fetch_assoc($res)){
            echo "<option value=".$row['storeid'].">".$row['storeid']."</option>";
        }//end while
        ?>
    </select><br>
<label for="empname">Name:</label><br>
  <input type="text" id="empname" name="empname"><br>
  <label for="jobtype">Posistion:</label><br>
  <input type="text" id="jobtype" name="jobtype"><br>
  <label for="hiredate">Hire Date:</label><br>
  <input type="date" id="hiredate" name="hiredate"><br>
  <label for="payrate">Pay Rate:</label><br>
  <input type="number" step="0.01" id="payrate" name="payrate"><br>
  <br>
  <input type="submit" name="submit" value="Submit"><br>
  </div>
</form>
    </div>
    </main>
<?php
function one_employee($db, $id){
    $sql = "select empid, storeid, empname, jobtype, hiredate, payrate from employee;";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
    echo "<div class=\"table-responsive\">";
    echo "<table class=\"table table-hover\">";
    echo "<tr><th>Employee ID</th><th>Store</th><th>Name</th><th>Position</th><th>Hire Date</th><th>Pay Rate</th></tr>";
    while($row = mysqli_fetch_assoc($res)){
        echo "<tr><td>".$row['empid']. "</td><td>".$row['storeid']."</td><td>".$row['empname']."</td><td>".$row['jobtype']."</td><td>".$row['hiredate']."</td><td>$".$row['payrate']."</td></tr>";
    }//end while
     echo "</table>";
     echo "</div>";
}//end one_order3()
?>
<h2>Employees</h2>
<?php
echo one_employee($db, 1);
require("footer.php");
}else{
  header("Location: " . $config_basedir );
}//end login
}else{
header("Location: " . $config_basedir . "index.php");
}//end admin check
?>