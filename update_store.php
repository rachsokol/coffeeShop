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
	$manager = filter_var($_POST['manager'],FILTER_SANITIZE_STRING);
    $sql = "UPDATE store SET manager = '".$manager."' WHERE storeid = '".$storeid."' ";
  if ( mysqli_query($db, $sql)){
    echo "*Store has been updated.*";
  }
  else {mysqli_query($db,$sql) or die(mysqli_error($db)."<br>".$sql);}
  $username1 = $_SESSION['USERNAME'];
  $s = "INSERT INTO activitytracker(username, activity) VALUES('$username1','Updated Manager of $storeid to $manager');";
  $re = mysqli_query($db, $s) or die(mysqli_error($db));
    }//end if
?>
<main>
    <div class="wrapper">
<?php
function store123($db, $id){
    $sql = "select storeid, manager, location, address from store;";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
    echo "<div class=\"table-responsive\">";
    echo "<table class=\"table table-hover\">";
       echo "<tr><th>Store ID</th><th>Address</th><th>State</th><th>Manager</th></tr>";
    while($row = mysqli_fetch_assoc($res)){
        echo"<tr><td>".$row['storeid']."</td><td>".$row['address']."</td><td>".$row['location']."</td><td>".$row['manager']."</td></tr>";
    }//end while
    echo "</table>";
    echo "</div>";
}//end store123()
    ?>
    <div class="container col-xl-8 col-lg-8 col-md-8 col-sm-11 col-xs-12">
    <form class="rounded" method='POST'>
        <div class="mx-auto" style="width: 200px;">
        <legend>Change Manager of Store</legend>
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
  <label for="manager"class="col">Manager:</label><br>
  <input type="text" id="manager" name="manager" class="col"><br>
  <br>
  <input type="submit" name="submit" value="Submit" class="col">
  </div>
    </form>
    </div>
<h2>Stores</h2>
<?
echo store123($db, 1);
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