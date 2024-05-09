<?php
session_name('coffee1'); 
session_start();
require("cfd.php");
$title = "Insert";
if($_SESSION['ADMINSTATUS'] >= 2){
if(isset($_SESSION['USERNAME'])){
require("header.php");
if(isset($_POST['submit2'])){
    $a_level = filter_var($_POST['a_level'],FILTER_SANITIZE_STRING);
    $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $sql = "UPDATE login SET a_level = '".$a_level."' WHERE username = '".$username."' ;";
  if ( mysqli_query($db, $sql)){
    echo "*Admin status has been changed.*";
  }
  else {mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);}
  $username1 = $_SESSION['USERNAME'];
  $s = "INSERT INTO activitytracker(username, activity) VALUES('$username1','Updated Admin Status of $username');";
  $re = mysqli_query($db, $s) or die(mysqli_error($db));
}//end if
?>
<main>
    <div class="mx-auto mt-5 col-xl-8 col-lg-8 col-md-9 col-sm-10 col-xs-12"  >
    <form class="rounded" method='POST'>
        <div class="mx-auto" style="width: 200px;">
        <legend>Change Admin Status</legend>
	<label for="username">Username:</label>
    <select name="username" id="username">
    <?
    $sql = "SELECT username FROM login order by username;";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        while($row = mysqli_fetch_assoc($res)){
            echo "<option value=".$row['username'].">".$row['username']."</option>";
        }//end while
    ?>
</select><br>
<label for="a_level">Admin Level:</label>
<select name="a_level" id="a_level">
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2">2</option>
</select><br>
  <input type="submit" name="submit2" value="Submit"><br>
    </form>
    </div>
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