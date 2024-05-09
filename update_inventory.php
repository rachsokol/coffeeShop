<?php
session_name('coffee1'); 
session_start();
require("cfd.php");
$title = "Update";
if($_SESSION['ADMINSTATUS'] >= 1){
if(isset($_SESSION['USERNAME'])){
    require("header.php");
    if(isset($_POST['submit'])){
    $iid = filter_var($_POST['iid'],FILTER_SANITIZE_STRING);
    $pid = filter_var($_POST['pid'],FILTER_SANITIZE_STRING);
	$storeid = filter_var($_POST['storeid'],FILTER_SANITIZE_STRING);
	$qty = filter_var($_POST['qty'],FILTER_SANITIZE_STRING);
    $sql = "UPDATE inventory set iid ='".$iid."', storeid = '".$storeid."', pid = '".$pid."', qty=".$qty." WHERE iid = '".$iid."' ;";
  if ( mysqli_query($db, $sql)){
    echo "*Inventory has been added to store.*";
  }
  else {mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);}
  $username1 = $_SESSION['USERNAME'];
  $s = "INSERT INTO activitytracker(username, activity) VALUES('$username1','Updated Inventory of $pid to $qty for $storeid');";
  $re = mysqli_query($db, $s) or die(mysqli_error($db));
}//end if

?>
<main>
    <div class="wrapper">
<?php
function inventory_display($db, $id){
    $sql = "Select i.iid, i.pid, i.storeid, i.qty, t.name from inventory i INNER JOIN product p ON i.pid = p.pid INNER JOIN types t ON p.pid = t.pid ORDER BY storeid;";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
    echo "<div class=\"table-responsive\">";
	echo "<table table-hover>";
    echo "<tr><th>Store Id</th><th>Coffee</th><th>Coffee Id</th><th>Inventory Id</th><th>Quantity</th></tr>";
    while($row = mysqli_fetch_assoc($res)){
       echo "<tr><td> ".$row['storeid']. "</td><td>".$row['name']."</td><td>".$row['pid']."</td><td>".$row['iid']."</td><td>".$row['qty']."</td></tr>";
    }//end while
    echo "</table>";
    echo "</div>";
}//end inventory_display
    ?>
    <div class="col-xl-8 col-lg-8 col-md-9 col-sm-10 col-xs-12">
    <form class="rounded"method='POST' >
        <div class="mx-auto" style="width: 200px;">
        <legend>Update Inventory</legend>
  <label for="iid">Inventory Id:</label><br>
  <select name="iid" id="iid">
    <?
    $sql = "SELECT iid FROM inventory order by iid;";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        while($row = mysqli_fetch_assoc($res)){
            echo "<option value=".$row['iid'].">".$row['iid']."</option>";
        }//end while
    ?>
    </select><br>
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
  <br>
  <label for="qty">Quantity:</label><br>
  <input type="text" id="qty" name="qty"><br>
  <br>
  <input type="submit" name="submit" value="Submit">
  </div>
    </form>
</div>
<h2>Inventory</h2>
<?php
echo inventory_display($db, 1);
?>
</div>
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