<?php
session_name('coffee1'); 
session_start();
require("cfd.php");
$title = "Update";
if($_SESSION['ADMINSTATUS'] >= 1){
if(isset($_SESSION['USERNAME'])){
    require("header.php");
    if(isset($_POST['submit'])){
    $aid = filter_var($_POST['aid'],FILTER_SANITIZE_STRING);
	$storeid = filter_var($_POST['storeid'],FILTER_SANITIZE_STRING);
	$adescription = filter_var($_POST['adescription'],FILTER_SANITIZE_STRING);
    $sql = "UPDATE announcements SET storeid = '".$storeid."', adescription = '".$adescription."' WHERE aid= ".$aid.";";
  if ( mysqli_query($db, $sql)){
    echo "*Announcement has been updated.*";
  }
  else {mysqli_query($db,$sql) or die(mysqli_error($db)."<br>".$sql);}
  $username1 = $_SESSION['USERNAME'];
  $s = "INSERT INTO activitytracker(username, activity) VALUES('$username1','Updated Announcement for $storeid');";
  $re = mysqli_query($db, $s) or die(mysqli_error($db));
    }//end if
    ?>
<main>
<div class="mx-auto mt-5 col-xl-8 col-lg-8 col-md-9 col-sm-10 col-xs-12"  >
    <form class="rounded"method='POST'>
        <div class="mx-auto" style="width: 200px;">
        <legend>Update Announcement</legend>
  <label for="storeid">Store:</label><br>
  <select name="storeid" id="storeid">
    <?
     $sql = "SELECT storeid,location FROM store order by storeid;";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        while($row = mysqli_fetch_assoc($res)){
            echo "<option value=".$row['storeid'].">".$row['location']."</option>";
        }//end while
    ?>
</select><br>
<label for="aid">Announcement Id:</label><br>
  <select name="aid" id="aid">
    <?
     $sql = "SELECT aid FROM announcements order by aid;";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        while($row = mysqli_fetch_assoc($res)){
            echo "<option value=".$row['aid'].">".$row['aid']."</option>";
        }//end while
    ?>
</select><br>
 <label for="adescription">Announcement:</label><br>
    <input type="text" id="adescription" name="adescription">
  <br> 
  <br>
  <input  type="submit" name="submit" value="Submit">
  </div>
    </form>
</div>
<?
function announcement_update($db, $id){
    $sql = "select a.aid, s.location, s.storeid, a.adescription from announcements a inner join store s on a.storeid = s.storeid;";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
    echo "<div class=\"table-responsive\">";
    echo "<table class=\"table table-hover\" border='1' width='600'  height='600' >";
    echo "<tr><th>Announcement ID</th><th>Announcement</th><th>Store</th></tr>";
    while($row = mysqli_fetch_assoc($res)){
        echo "<tr><td>".$row['aid']. "</td><td>".$row['adescription']."</td><td>".$row['storeid']."- ".$row['location']."</td>."."</tr>";
    }//end while
     echo "</table>";
     echo "</div>";
}//end one_employee()
?>
<h2>Announcements</h2>
<?
echo announcement_update($db, 1);
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