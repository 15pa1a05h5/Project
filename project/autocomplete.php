<?php 
	include "connect.php";
	$auto=$_GET['x'];
	$qry="select category from url where `category` like '$auto%'";
	$sql1 = mysqli_query($conn,$qry1);
	if(mysqli_num_rows($sql1)>0) {
		while($row1=mysqli_fetch_assoc($sql1)) {
			echo $row1;
		}
	}
?>