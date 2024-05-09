<?php
session_name('coffee1'); 
session_start();
require("cfd.php");
$title = "Insert";
if($_SESSION['ADMINSTATUS'] >= 1){
if(isset($_SESSION['USERNAME'])){
 //   if($_SESSION['ADMINSTATUS'] == 1){
require("header.php");
if(isset($_POST['submit2'])){
    $adescription = filter_var($_POST['adescription'],FILTER_SANITIZE_STRING);
	$storeid = filter_var($_POST['storeid'],FILTER_SANITIZE_STRING);
    $sql = "INSERT INTO announcements(adescription, storeid) values('".$adescription."', '".$storeid."')";
  if ( mysqli_query($db, $sql)){
    echo "*Announcement has been added.*";
  }
  else {mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);}
}//end if
$last_id = mysqli_insert_id($db);
    $isql = "insert into activitytracker(username, dateadded, aid, activity) VALUES('".$_SESSION['USERNAME']."',now(),".$last_id.",'Connected a manufacturer with a product with the id of $last_id');";
    mysqli_query($db, $isql);
?>
<main>
    <div class="mx-auto mt-5 col-xl-8 col-lg-8 col-md-9 col-sm-10 col-xs-12 "  >
    <form class="rounded center" method='POST'>
        <div class="mx-auto" style="width: 200px;">
        <legend>Add Announcement</legend>
	<label for="storeid">Store:</label>
    <select name="storeid" id="storeid">
    <?
    $sql = "SELECT storeid, location FROM store order by storeid;";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        while($row = mysqli_fetch_assoc($res)){
            echo "<option value=".$row['storeid'].">".$row['storeid'].".".$row['location']."</option>";
        }//end while
    ?>
</select><br>
  	<label for="adescription">Announcement:</label><br>
  <input type="text" id="adescription" name="adescription"><br><br>
  <input type="submit" name="submit2" value="Submit"><br>
  </div>
    </form>
    </div>
</main>
<?
require("footer.php");
}else{
  header("Location: " . $config_basedir );
}//end login
}//end admin check
else{
    header("Location: " . $config_basedir . "index.php");
}
?>