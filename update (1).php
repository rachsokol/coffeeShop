<?php
session_name('coffee1'); 
session_start();
require("cfd.php");
$title = "Update";
require("header.php");
if(isset($_SESSION['USERNAME'])){
?>
<main>
    <div class="rounded mt-4 mb-4 col-xl-8 col-lg-8 col-md-8 col-sm-9 col-xs-10" style="border: 2px solid black; box-shadow: 3px 3px; background-color:#CFB997; text-align:center; text-decoration:bold; color:black; font-size:15pt;">
<h2>Update</h2>
<a href="update_address_store.php">Update Store Address</a><br>
<a href="update_emp.php">Update Employee</a><br>
<a href="update_inventory.php">Update Inventory</a><br>
<a href="update_store.php">Update Manager</a><br>
<a href="update_announcements.php">Update Announcement</a><br>
</div>
<div class="rounded mt-4 mb-4 col-xl-8 col-lg-8 col-md-8 col-sm-9 col-xs-10" style="border: 2px solid black; box-shadow: 3px 3px; background-color:#CFB997; text-align:center; text-decoration:bold; color:black; font-size:15pt;">
<h2>Insert</h2>
<a href="insert_emp.php">Add New Employee</a><br>
<a href="insert_cof.php">Add New Coffee</a><br>
<a href="insert_invcof.php">Add New Inventory</a><br>
</div>
</main>
<?php
}else{
    $file = 'login.php';
}//end login check
require("footer.php");
?>