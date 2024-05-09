<?php
session_name('coffee1'); 
session_start();
require("cfd.php");
if($_SESSION['ADMINSTATUS'] >= 1){
/*	if(isset($_SESSION['USERNAME'])){
		header("Location: " . $config_basedir . "index.php");
	}else{
		header("Location: " . $config_basedir . "login.php");
	}//end if*/
if(isset($_SESSION['USERNAME'])){
require('header.php');
?>
<main>
<div class="rounded mt-4 mb-4 col-xl-8 col-lg-8 col-md-8 col-sm-9 col-xs-10" style="border: 2px solid black; box-shadow: 3px 3px; background-color:#CFB997; text-align:center; text-decoration:bold; color:black; font-size:15pt;">
<h2>Update</h2>
<a href="update_address_store.php">Update Store Address</a><br>
<a href="update_emp.php">Update Employee</a><br>
<a href="update_inventory.php">Update Inventory</a><br>
<a href="update_store.php">Update Manager</a><br>
<a href="update_announcements.php">Update Announcement</a><br>
<?
     if($_SESSION['ADMINSTATUS'] >= 2){
                    echo "<a href='update_admin.php'>Change Admin Status</a>";
                    }//end if
                    ?>
</div>
<div class="rounded mt-4 mb-4 col-xl-8 col-lg-8 col-md-8 col-sm-9 col-xs-10" style="border: 2px solid black; box-shadow: 3px 3px; background-color:#CFB997; text-align:center; text-decoration:bold; color:black; font-size:15pt;">
<h2>Add</h2>
<a href="insert_emp.php">Add New Employee</a><br>
<a href="insert_cof.php">Add New Coffee</a><br>
<a href="insert_invcof.php">Add New Inventory</a><br>
<a href="insert_announcements.php">Add New Announcements</a><br>
</div>
<div class="rounded mt-4 mb-4 col-xl-8 col-lg-8 col-md-8 col-sm-9 col-xs-10" style="border: 2px solid black; box-shadow: 3px 3px; background-color:#CFB997; text-align:center; text-decoration:bold; color:black; font-size:15pt;">
<h2>View</h2>
<a href="activitytracker.php">Activity Tracker</a>
<a href="view_admin.php">View Admins</a>
    </div>
</main>
<?
require('footer.php');
}else{
header("Location: " . $config_basedir . "index.php");
}//end user login check
}else{
 header("Location: " . $config_basedir . "index.php");   
}//end admin if
?>