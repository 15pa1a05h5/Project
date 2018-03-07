<?php 
	include "connect.php";
	session_start();
	$auto=$_GET['x'];
	$qry="select distinct category from url where `category` like '$auto%'";
	$sql1 = mysqli_query($conn,$qry);
	if(mysqli_num_rows($sql1)>0) {
		while($row1=mysqli_fetch_assoc($sql1)) {
			$cat=$row1['category'];
			echo "<h3><a href='$cat'>$cat</a></h3>";
			echo "<br>";
		}
	}
?>