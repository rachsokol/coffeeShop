<?php
session_name('coffee1'); 
session_start();
session_destroy();
require("cfd.php");
header("Location: " . $config_basedir );
?>
