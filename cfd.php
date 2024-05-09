<?php 
$dbhost = "localhost";
$dbuser = "rsokol_coffeeuser1";
$dbpassword = "X;2x1$#^@R(O";
$dbdatabase = "rsokol_coffee1";
$config_basedir = "https://rssokol.com/DDWP/coffee/";//this line
$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase) or die("Error " . mysqli_error($db));
date_default_timezone_set('America/Chicago');
?>
