<?php
include "connect.php";


$urls=$_GET['urls'];
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
?>
<html>
<body>
<div id="comments" class="disp decription">
<link rel="stylesheet" href="home.css">
	<?php $qry1 = "SELECT * FROM `url` where `url` like '%$urls%' and `user_id` like '%$user_id%'";
	$sql1 = mysqli_query($conn,$qry1);
	if(mysqli_num_rows($sql1)>0) {
		echo "<table class='pop'>";
			echo "<tr>";
			echo "<th>URL</th>";
			echo "<th>Category</th>";
			echo "<th>URL_ID</th>";
			echo "<th>add_time</th>";
			echo "</tr>";
		while($row1=mysqli_fetch_assoc($sql1)) {
			$uid = $row1['user_id'];
			$qry2 = "SELECT * FROM `tbl_user` where `user_id` = '$uid'";
			$sql2 = mysqli_query($conn,$qry2);
			$row2=mysqli_fetch_assoc($sql2);
			$urls=$row1['url_id'];
			echo <"div id=val">;
			$ur=$row1['url'];
			echo "</div>";
			echo "<div class='disp decription'>";
			echo "<tr>";
			echo "<div class='url' onmouseover=""myfunction()"">";
			echo "<td>";
			echo "<h3><a href='$ur'>$urls</a></h3>";
			echo "$ur";
			echo "</td>";
			echo "</div>"
			echo "<td>";
			echo $row1['category'];
			echo "</td>";
			echo "<td>";
			echo $row1['add_time'];
			echo "</td>";
			echo "</tr>";
			echo "</div>";
		}
	}
	else echo "Nocomments"; ?>
</div>
	<script>
		function myfunction(){
			var x=document.getElementById("val");
			x.classList.toggle("show");
		}
	</script>
</body>
</html>