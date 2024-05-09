<?php
session_name('coffee1'); 
session_start();
require("cfd.php");
if(isset($_SESSION['USERNAME'])){
	require('header.php');
	echo "<div class='row'><div class='col-xs-12 col-sm-6 col-md-4 col-lg-4 '>";
	echo "Welcome!";
	echo "</div><br><br><br><br></div>"; 
//pic
	require('footer.php'); 
}else{
	header("Location: " . $config_basedir . "login.php");
}//end if login check
?>