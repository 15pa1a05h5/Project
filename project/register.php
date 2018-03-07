<?php 
include "connect.php";
session_start();

if(isset($_POST['sub'])) {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
		$repass=$_POST['repass'];
		if($name==''||$email==''||$pass==''||$repass=='')
			$warning= "****All fields must be filled****";
		else{
		if($pass!=$repass)
			$warning= "passwords not matched";
		else{
		$qry1="select * from tbl_user where `user_name`='$name' or `user_email`='$email'";
		$sql=mysqli_query($conn,$qry1);
		if(mysqli_num_rows($sql)>0) {
			$warning = "You have already registered";
		}
		else{
        $qry = "INSERT INTO `tbl_user` ( `user_name`, `user_email`, `password`) VALUES ('$name', '$email', '$pass')";
        mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
        header('location:login.php');
		}
		}
		}
    }
?>
<html>
    <head>
            <title>ADD YOUR BOOKMARKS</title>
            <link rel="stylesheet" href="home.css">
    </head>   
    <body>
        <div class="header">
            <?php include "header.php";?>   
        </div>
        <div class="content">
            <div class="disp">
                <h2>Register</h2>
				<h4 style= "color:red"><?php if(isset($warning)) echo $warning; ?></h4>
             <form class="form" method="post" action="">
                <label for="Name">Name:</label><input type="text" name="name"><br>
                <label for="Email">Email:</label><input type="text" id="email"  name="email" ><br>
                <label for="Password">Password:</label><input type="password" name="pass"><br>
                <label for="RetypePassword">RetypePassword</label> <input type="text" name="repass"><br>
                <input type="submit" name="sub" value="Click to Submit">
            </form>
			<b>If you have Registered <a href="login.php">Login</a></b>
		</div>
		</div>
      </body>  
</html>
