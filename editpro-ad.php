<?php
include('conn.php');
session_start();
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDIT PROFILE DETAILS</title>
	<style >
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
		#changepassword{
			top: 180px;
			background-color: lightseagreen;
		}
		.button{
			border-radius: 6%;
			padding: 2%;
			background-color: lightcoral;
			border: none;
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
		if($result['category']=="admin"){
		?>
		<a href="ad-web.php" id="home"> Home</a>
		<a href="changepass-ad.php" id="changepassword">Change Password</a>
		<?php
		}
		else if($result['category']=="warden"){
		?>
		<a href="war-web.php" id="home"> Home</a>
		<a href="changepass-ad.php" id="changepassword">Change Password</a>
		<?php
		}
		else{
		?>
		<a href="st-web.php" id="home"> Home</a>
		<a href="changepass-ad.php" id="changepassword">Change Password</a>
		<?php
		}
		?>
	</div>
	<p style="margin-left: 150px;"><b> EDIT PROFILE DETAILS</b></p>
	<div style="margin-left:150px;">
		<form method="POST">
			name : <input type="text" name="name" value="<?php echo $result['username']?>"><br><br>
			Phone no : <input type="tel" name="phone" value="<?php echo $result['phone_number']?>"><br><br>
			<input  class="button" type="submit" name="submit" value="Save">
		</form>
		<?php
			if(isset($_POST['submit']))
			{
				$name1=$_POST['name'];
				$email=$result['email'];
				$phone1=$_POST['phone'];
				$query=mysqli_query($db,"SELECT * from register where email='$email'");
				$num=mysqli_num_rows($query);
				if($num==0){
		?>
            	<span style="background-color:grey; border: none;text-align: center;">Something went wrong,please try again later</span>
        <?php
            }
            else{
				mysqli_query($db,"UPDATE register SET username='$name1',phone_number='$phone1' WHERE email='$email' ");
		?>
				<span style="background-color:grey; border: none;text-align: center;">changes are saved</span>
				
		<?php
				}
			}
		?>
	</div>
</body>