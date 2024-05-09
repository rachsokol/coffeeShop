<?php
session_name('coffee1'); 
session_start();
require("cfd.php");
$title = "Insert";
if($_SESSION['ADMINSTATUS'] >= 1){
if(isset($_SESSION['USERNAME'])){
    if($_SESSION['ADMINSTATUS'] == 1){
require("header.php");
if(isset($_POST['submit2'])){
    $pid = filter_var($_POST['pid'],FILTER_SANITIZE_STRING);
    $mfid = filter_var($_POST['mfid'],FILTER_SANITIZE_STRING);
	$roast = filter_var($_POST['roast'],FILTER_SANITIZE_STRING);
	$weight = filter_var($_POST['weight'],FILTER_SANITIZE_STRING);
    $sql = "INSERT INTO product(pid, mfid, roast, weight) values('".$pid."', '".$mfid."', '".$roast."', ".$weight.")";
  if ( mysqli_query($db, $sql)){
    echo "*Product has been added.*";
  }
  else {mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);}
}//end if
$last_id = mysqli_insert_id($db);
    $isql = "insert into activitytracker(username, dateadded, pid, activity) VALUES('".$_SESSION['USERNAME']."',now(),".$last_id.",'Connected a manufacturer with a product with the id of $last_id');";
    mysqli_query($db, $isql);
?>
<?php
function one_coffee($db, $id){
    $sql = "select * from product";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
    echo "<div class=\"table-responsive\">";
    echo "<table table-hover>";
    echo "<tr><th>Product Id</th><th>Manufactuar Id</th><th>Roast</th><th>Weight</th></tr>";
    while($row = mysqli_fetch_assoc($res)){
        echo "<tr><td>".$row['pid']."</td><td>".$row['mfid']."</td><td>".$row['roast']."</td><td>".$row['weight']."</td></tr>";
    }//end while
     echo "</table>";
     echo "</div>";
}//end one_coffee()
?>
<main>
    <div class="mx-auto mt-5 col-xl-8 col-lg-8 col-md-9 col-sm-10 col-xs-12"  >
    <form class="rounded" method='POST'>
        <div class="mx-auto" style="width: 200px;">
        <legend>Add Roast and Weight</legend>
	<label for="mfid">Manufactuar Id:</label>
    <select name="mfid" id="mfid">
    <?
    $sql = "SELECT mfid FROM manufacturer order by mfid;";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        while($row = mysqli_fetch_assoc($res)){
            echo "<option value=".$row['mfid'].">".$row['mfid']."</option>";
        }//end while
    ?>
</select><br>
  	<label for="roast">Roast:</label><br>
  <input type="text" id="roast" name="roast"><br>
  <label for="weight">Weight:</label><br>
  <input type="text" id="weight" name="weight"><br>
  <input type="submit" name="submit2" value="Submit"><br>
    </form>
    </div>
    </div>

<h2>Product</h2>
<?php
echo one_coffee($db, 1);
?>
</main>
<?
require("footer.php");
}else{
  header("Location: " . $config_basedir );
}//end login
}
}else{
header("Location: " . $config_basedir . "index.php");
}//end admin check
?>