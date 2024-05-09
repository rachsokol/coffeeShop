<?php
session_name('coffee1'); 
session_start();
require("cfd.php");
if(isset($_SESSION['USERNAME'])){
require("header.php");

function one_coffee($db, $id){
    $sql = "select p.roast, p.weight, m.mfname, m.location, t.name from product p INNER JOIN manufacturer m ON p.mfid = m.mfid INNER JOIN types t ON p.pid = t.pid";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
    echo "<div class=\"table table-responsive\">";
    echo "<table>";
    echo "<tr><th>Coffee Name</th><th>Roast</th><th>Weight</th><th>Manufacturer Name</th><th>Manufacturer Location</th></tr>";
    while($row = mysqli_fetch_assoc($res)){
        echo "<tr><td>".$row['name']. "</td><td>".$row['roast']."</td><td>".$row['weight']."</td><td>".$row['mfname']."</td><td>".$row['location']."</td></tr>";
    }//end while
     echo "</table>";
}//end one_coffee()
function one_inventory($db, $id){
    $sql = "select i.storeid, i.qty, t.name from inventory i INNER JOIN types t ON i.pid = t.pid ORDER BY storeid ASC;";
    $res = mysqli_query($db,$sql) or die(mysqli_error($db). "<br>".$sql);
    echo "<div class=\"table table-responsive\">";
    echo "<table>";
    echo "<tr><th>Store ID</th><th>Coffee Name</th><th>Quantity</th></tr>";
    while($row = mysqli_fetch_assoc($res)){
        echo "<tr><td>".$row['storeid']. "</td><td>".$row['name']."</td><td>".$row['qty']."</td></tr>";
    }//end while
     echo "</table>";
     echo "</div>";
}//end one_inventory()
?>
<main>
    <div class="wrapper">
<h2>About Our Coffees</h2>
<?php
echo one_coffee($db, 1);
?>
<h2>Inventory</h2>
<?php
echo one_inventory($db, 1);
?>
</div>
</main>
<?php
require("footer.php");
}else{
header("Location: " . $config_basedir );
}//end login
?>