<?php
include "connect.php";
session_start();
if(!isset($_SESSION['email'])) 
    header('location:login.php');
$user_id = $_SESSION['user_id'];
if(isset($_POST['submit'])) {
$url = $_POST['comment'];
$category=$_POST['category'];
$urlid=$_POST['urlid'];
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
	$qry1="select * from url where `url`='$url'";
		$sql=mysqli_query($conn,$qry1);
		if(mysqli_num_rows($sql)>0) {
			$warning = "Already added this url";
		}
		else{
echo $qry2 = "INSERT INTO `url` (`user_id`,`username`,`url`,`url_id`,`category` ) VALUES ('$user_id','$user_name','$url','$urlid','$category');";
mysqli_query($conn,$qry2);
}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="home.css">
		<!--<script src="jQuery.js"></script>
		<script src="myScript.js"></script>-->
	</head>
	<body>
		<div class="header">
			<?php include "header.php"?>
		</div>
		<div class="content">
			<div class="disp decription">
				<h3>Add Your URL</h3>
				<form method="post" id="frm" >
					<input type="text" name="comment" id="comment" required><br><br>
					URL(short name):<br><input type="text" name="url_id" id="url_id">
					<br><br>
					CATEGORY:<br><input list="categer">
					<datalist id="categer">
					  <option value="Internet Explorer">
					  <option value="Firefox">
					  <option value="Chrome">
					  <option value="Opera">
					  <option value="Safari">
					</datalist>
					<br><input type="button" value="Submit" onclick="showComments();">
				</form>
				<div id="try"></div>					
				<h4> <?php if(isset($warning)) echo $warning; ?></h4>
		<script>
			function showComments() {
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("try").innerHTML = this.responseText;
					}
				};
				var comment = document.getElementById("comment").value;
				var urlid=document.getElementById("url_id").value;
				var cat=document.getElementById("categer").value;
				document.getElementById("frm").reset();
				xhttp.open("GET","showComments.php?rid=<?php echo $user_id;?>&comment="+comment+"&urlid="+urlid+"&cat="+cat, true);
				xhttp.send();
				document.getElementById("try").innerHTML="";
			}
		</script>
	</div>
</div>
</body>
</html>