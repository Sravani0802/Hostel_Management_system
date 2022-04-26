<?php
include('conn.php');
session_start();
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CHANGE PASSWORD</title>
	<style>
		body{
			background-image:url("lo-bck.jpeg") ;
			background-repeat: no-repeat;
			background-size: cover;
		}
		#navbar a{
			position: absolute;
			left: -80px;
			border-radius: 0 5px 5px 0;
			transition: 0.3s;
			padding: 15px;
			text-decoration: none;
			font-size: 100%;
			color: white;
			width: 100px;
		}
		#navbar a:hover{
			left: 0;
		}
		#home{
			top: 120px;
			background-color: limegreen;
		}
	</style>
</head>
	<body>
		<h1 style="padding: 2%;"> Hostel Management System</h1>
		<div id="navbar">
			<?php
			$forname=$_SESSION['welcome'];
			$extract=mysqli_query($db,"SELECT * from register where email='$forname'");
			$result=mysqli_fetch_assoc($extract);
			if($result['category']=="admin")
			{
		?>
		<a href="ad-web.php" id="home"> Home</a>
		<?php
			}
			elseif($result['category']=="warden")
			{
		?>
		<a href="war-web.php" id="home"> Home</a>
		<?php
			}
			else{
		?>
		<a href="st-web.php" id="home"> Home</a>
		<?php
			}
		?>		
		</div>
		<p style="margin-left: 150px;"><b> CHANGE PASSWORD</b></p>
		<div style="margin-left:150px;">
			<form method="POST">
				Enter New Password : <input type="password" name="password" placeholder="Password"><br><br>
				Confirm New Password : <input type="password" name="re-password" placeholder="Re-enter password"><br><br>
				<input type="submit" name="submit"><br>
			</form>
			<?php
			if(isset($_POST['submit'])){
				$name=$result['username'];
				$password=$_POST['password'];
				$conpassword=$_POST['re-password'];
				if($password==$conpassword)
				{
					mysqli_query($db,"UPDATE register SET password ='$password' WHERE username='$name'");
			?>
				<span style="background-color:grey; border: none;text-align: center;">password changed</span>
			<?php
				}
				else{
			?>
				<span style="background-color:grey; border: none;text-align: center;">Something went wrong,please try again later</span>
				<?php
				}
			}
			?>
		</div>
</body>
</html>