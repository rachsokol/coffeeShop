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
	$address = filter_var($_POST['address'],FILTER_SANITIZE_STRING);
    $sql = "UPDATE store SET address = '".$address."' WHERE storeid = '".$storeid."' ";
  if ( mysqli_query($db, $sql)){
    echo "*Store has been updated.*";
  }
  else {mysqli_query($db,$sql) or die(mysqli_error($db)."<br>".$sql);}
  $username1 = $_SESSION['USERNAME'];
  $s = "INSERT INTO activitytracker(username, activity) VALUES('$username1','Updated Store Address of $storeid to $address');";
  $re = mysqli_query($db, $s) or die(mysqli_error($db));
    }//end if
function store123($db, $id){
    $coffee_data = "";
    $sql = "select storeid, manager, location, address from store;";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);

    echo "<div class=\"table-respnsive{-sm|-md|-lg|-xl|-xxl} mx-auto mt-5 col-xl-5 col-lg-6 col-md-6 col-sm-6 col-xs-6\">";
    echo "<table class=\"table caption-top \">";
    echo "<caption>Our Stores</caption>";
       echo "<tr><th>Store ID</th><th>Address</th><th>State</th><th>Manager</th></tr>";
    while($row = mysqli_fetch_assoc($res)){
        echo"<tr><td>".$row['storeid']."</td><td>".$row['address']."</td><td>".$row['location']."</td><td>".$row['manager']."</td></tr>";
    }//end while
    echo "</table>";
    echo "</div>";
}//end store123()
    ?>
    <div class="container">
        <div class="mx-auto mt-5 col-xl-5 col-lg-6 col-md-6 col-sm-6 col-xs-6"  >
    <form class="form-horizontal rounded p-4" method='POST'>
        <div class="mx-auto" style="width: 200px;">
        <legend>Update Address</legend>
         <label for="storeid" class="col">Store:</label>
 <select name="storeid" id="storeid" class="col">
<?
   $sql = "SELECT storeid FROM store order by storeid;";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        while($row = mysqli_fetch_assoc($res)){
            echo "<option value=".$row['storeid'].">".$row['storeid']."</option>";
        }//end while
?>
</select><br>
  <label for="address"class="col">Address:</label><br>
  <input type="text" id="address" name="address" class="col"><br>
  <br>
  <input type="submit" name="submit" value="Submit" class="col">
  <div class="mx-auto" style="width: 200px;">
    </form>
    </div>
    </div>
<?
echo store123($db, 1);
require("footer.php");
}else{
  header("Location: " . $config_basedir );
}//end login
}else{
header("Location: " . $config_basedir . "index.php");
}//end admin check
?>