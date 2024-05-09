<?php
session_name('coffee1'); 
session_start();
require("cfd.php");
if(isset($_SESSION['USERNAME'])){
    require("header.php");
?>

 <div class="row justify-content-center mt-4 ">
     <div class="mt-5 col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-4" >
    <form class="rounded"method='POST'>
        <legend>Select your store to view your inventory</legend>
  	<label for="storeid">Store Id:</label><br>
  <select name="storeid" id="storeid">
<?
$sql = "SELECT storeid, location FROM store order by storeid;";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        while($row = mysqli_fetch_assoc($res)){
            echo "<option value=".$row['storeid'].">".$row['storeid'].". ".$row['location']."</option>";
        }//end while
?>
</select><br>
<br>
  <input type="submit" name="submit1" value="Submit"><br>
    </form>
    </div>
    </div
<?
if(isset($_POST['submit1'])){
    $storeid = filter_var ($_POST['storeid'],FILTER_SANITIZE_STRING);
    $sql = "select * from inventory i INNER JOIN types t ON i.pid = t.pid WHERE i.storeid = '$storeid' ";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
     if ( mysqli_query($db, $sql)){
    echo  "Store has been selected.*";
  }
  else {mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);}
  ?>
<br>
<div class="container text-center">
             <br>
<div class="row">
    
<div class="col" >
<h2>Your Store's Inventory</h2>

<table class="table" border='1' width='300'  height='300' >
<tr><th>Store ID</th><th>Coffee Name</th><th>Quantity</th></tr>
    <?
    while($row = mysqli_fetch_assoc($res)){
        echo "<tr><td>".$row['storeid']. "</td><td>".$row['name']."</td><td>".$row['qty']."</td></tr>";
    }//end while
    ?>
</table>
</div>
</div>
</div>

<?
 echo"</div>";
 echo "</main>";
}//end if 
echo "<br><br>";
require("footer.php");
}else{
header("Location: " . $config_basedir );
}//end login
?>