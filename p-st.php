<?php
include('conn.php');
session_start();
?>
<html>
<head>
	<title>PROFILE DETAILS</title>
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
		#editprofile{
			top: 180px;
			background-color: lightcoral;
		}
		#changepassword{
			top: 240px;
			background-color: lightblue;
		}
		.ex{
			padding: 2%;
	    }
	    table{
	    	width: 100%;
	    	border-collapse: collapse;
	    }

	</style>
</head>
<body>
	<h1 class="ex"> Hostel Management System</h1>
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
		<a href="editpro-ad.php" id="editprofile">Edit Profile</a>
		<a href="changepass-ad.php" id="changepassword">Change Password</a>
	</div>
		<p style="margin-left: 150px;"><b>PROFILE DETAILS</b></p>
		
    	<div style="margin-left:150px;">
		<table border="1px" cellpadding="8%">
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone no</th>
			<th>Category</th>
		</tr>
		<tr>
		<?php
			echo "<td>".$result['username']."</td>";
   			echo "<td>".$result['email']. "</td>";
    		echo "<td>".$result['phone_number']. "</td>";
    		echo "<td>".$result['category']."</td>";
		?>
		</tr>
	</table>
</div>
</body>
</html>