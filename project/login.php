<?php 
include "connect.php";
session_start();
if(isset($_SESSION['email'])) 
    header('location:index.php');

    if(isset($_POST['sub'])) {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $qry = "SELECT * FROM `tbl_user` WHERE  `user_email`='$email' AND `password`='$pass';";
        $sql = mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
        if(mysqli_num_rows($sql)>0) {
            $row=mysqli_fetch_assoc($sql);
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION["user_name"] = $row['user_name'];
            $_SESSION["email"] = $row['user_email'];
            header('location:index.php');
        } else {
            $warning = "Invalid login";
        }
    
    }
?>
<!DOCTYPE html>
<html>
    <head>
            <title>ADD YOUR BOOK MARKS</title>
            <link rel="stylesheet" href="home.css">
    </head>   
    <body>
        <div class="header">
            <?php include "header.php"?>   
        </div>
        <div class="content">
            <div class="disp">
                <h2>Login</h2>
                <h4 style= "color:red"> <?php if(isset($warning)) echo $warning; ?></h4>
                <form class="form" method="post" action="">
                Email<br><input type="text" name="email" style="width:75%"><br>
                <br>Password<br><input type="password" name="pass"><br>
                <input type="submit" name="sub" value="Click to Submit">
            </form>
			<b>If you are a new user click on <a href="register.php">Register</a></b>
    </body> 
		
</html>