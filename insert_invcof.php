<?php
session_name('coffee1'); 
session_start();
require("cfd.php");
$title = "Insert";
if($_SESSION['ADMINSTATUS'] >= 1){
if(isset($_SESSION['USERNAME'])){
  //  if($_SESSION['ADMINSTATUS'] == 1){
    require("header.php");
if(isset($_POST['submit1'])){
    $pid = filter_var($_POST['pid'],FILTER_SANITIZE_STRING);
	$name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $sql = "INSERT INTO types(pid, name) values(".$pid.", '".$name."')";
  if ( mysqli_query($db, $sql)){
    echo "*Type of coffee has been added.*";
  }
  else {mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);}
}//end if
$last_id = mysqli_insert_id($db);
    $isql = "insert into activitytracker(username, dateadded, typeid, activity) VALUES('".$_SESSION['USERNAME']."',now(),".$last_id.",'A new coffee name has been added to a product with the id of $last_id');";
    mysqli_query($db, $isql);
?>
<main>
     
    <div class="mx-auto mt-5 col-xl-8 col-lg-8 col-md-9 col-sm-10 col-xs-12"  >
    <form class="rounded"action='insert_invcof.php' method='POST'>
        <div class="mx-auto" style="width: 200px;">
        <legend>Give new coffee a name</legend>
  	<label for="pid">Product Id:</label><br>
  <select name="pid" id="pid">
<?
$sql = "SELECT pid FROM product order by pid;";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        while($row = mysqli_fetch_assoc($res)){
            echo "<option value=".$row['pid'].">".$row['pid']."</option>";
        }//end while
?>
</select><br>
  	<label for="name">Name:</label><br>
  <input type="name" id="name" name="name"><br>
  <br>
  <input type="submit" name="submit1" value="Submit"><br>
  </div>
    </form>
    </div>
<?php
function one_inventory($db, $id){
    $sql = "select * from types";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
    echo "<div class=\"table-responsive\">";
    echo "<table table-hover>";
    echo "<tr><th>Product Id</th><th>Name</th></tr>";
    while($row = mysqli_fetch_assoc($res)){
        echo "<tr><td>".$row['pid']."</td><td>".$row['name']."</td></tr>";
    }//end while
     echo "</table>";
     echo "</div>";
}//end one_inventory()
function two_inventory($db, $id){
    $sql = "select m.mfid, m.mfname,p.pid, p.roast, p.weight from manufacturer m INNER JOIN product p ON m.mfid = p.mfid";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
    echo "<div class=\"table-responsive\">";
    echo "<table table-hover>";
    echo "<tr><th>Manufacturer Id</th><th>Manufacturer Name</th><th>Product Id</th><th>Roast</th><th>Weight</th></tr>";
    while($row = mysqli_fetch_assoc($res)){
        echo "<tr><td>".$row['mfid']."</td><td>".$row['mfname']."</td><td>".$row['pid']."</td><td>".$row['roast']."</td><td>".$row['weight']."</td></tr>";
    }//end while
     echo "</table>";
     echo "</div>";
}//end two_inventory()
?>
<h2>Coffee Information</h2>
<?php
echo two_inventory($db, 1);
?>
<h2>Coffee Name</h2>
<?
echo one_inventory($db, 1);

echo "</main>";
require("footer.php");
}else{
  header("Location: " . $config_basedir );
}//end login
}else{
header("Location: " . $config_basedir . "index.php");
}//end admin check

?>