<?php
session_name('coffee1'); 
session_start();
require("cfd.php");
$title = "Home";
require("header.php");
if(isset($_SESSION['USERNAME'])){
    function announcements($db, $id){
    $sql = "select a.adescription, s.location FROM announcements a INNER JOIN store s ON a.storeid = s.storeid";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
    echo "<div class=\"rounded mt-4 mb-4 col-xl-8 col-lg-8 col-md-8 col-sm-9 col-xs-10\" style=\"border: 2px solid black; box-shadow: 3px 3px; background-color:#CFB997; \">";
    echo "<h2>Announcements</h2>";
    while($row = mysqli_fetch_assoc($res)){
        echo "<ul>";
        echo "<li>".$row['adescription']. " - ".$row['location']. "</li>";
        echo "</ul>";
    }//end while
    echo "</div>";
}//end announcements()
function comments($db, $id){
    $sql = "select  *from comments";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
    echo "<div class=\"table-responsive\">";
    echo "<table table-hover>";
    echo "<tr><th>Username</th><th>Comment</th></tr>";
    while($row = mysqli_fetch_assoc($res)){
        echo "<tr><td>".$row['username']."</td><td>".$row['comment']."</td></tr>";
    }//end while
     echo "</table>";
     echo "</div>";
}//end comment()

?>
<div class="container">
  <div class="row">
    <div class="col" style="60%;">
<?php
echo announcements($db, 1);

?>
</div>
<div class="col" style="60%;">
   <div class="mx-auto mt-5 col-xl-8 col-lg-8 col-md-9 col-sm-10 col-xs-12" style="width:40%;" >
    <form class="rounded" method='POST'>
        <legend>Add Comment</legend>
  <label for="comment">Comment:</label><br>
  <input type="text" id="comment" name="comment"><br><br>
  <input type="submit" name="submit" value="Submit"><br>
    </form>
    </div>
    <br>
    <br>
<?
if(isset($_POST['submit'])){
    $username = $_SESSION['USERNAME'];
	$comment = filter_var($_POST['comment'],FILTER_SANITIZE_STRING);
    $sql = "INSERT INTO comments(username, comment) values('".$username."', '".$comment."')";
  if ( mysqli_query($db, $sql)){
    echo "*Comment has been added.*";
  }
  else {mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);}
}//end if

echo comments($db, 1);
?>
    </div>
<?php
}else{
    $file = 'login.php';
?>

<div class="mx-auto mt-5 col-xl-4 col-lg-5 col-md-7 col-sm-8 col-xs-9"  >
	<form class="form-horizontal rounded p-4 " action='login.php' method='POST' id='otherlogin'>
		<fieldset>
			<legend>Please log in below</legend>
			<div class="form-group">
				<label class="col control-label" for="username">Username</label>  
				<div class="col">
					<input id="username" name="username" type="text" placeholder="username" class="form-control input-md" required="">   
				</div>
			</div>
			<div class="form-group">
				<label class="col control-label" for="password">Password</label>
				<div class="col">
					<input id="password" name="password" type="password" placeholder="password" class="form-control input-md" required="">
				</div>
			</div>
			<div class="form-group">
				<label class="col control-label" for="submit"></label>
				<div class="col">
					<input type='submit' id="submit" name="submit" class="btn btn-outline-dark" value='Login'>
				</div>
				</div>
		</fieldset>
	</form>
	</div>
	<br><br>
<?
}//end login check
require("footer.php");
?>