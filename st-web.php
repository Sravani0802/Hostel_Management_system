<?php
	include('conn.php');
	session_start();
?>
<html>
<head>
<title> Hostel Management Student</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style >
	*{
		box-sizing: border-box;
	}
	body{
			background-image:url("lo-bck.jpeg") ;
			background-repeat: no-repeat;
			background-size: cover;
		}
	.nav{
		background-color: lightseagreen;
		overflow: hidden;
		padding: 1%;
		color: white;
	}
	.logout{
		float: right;
	}
	.btn{
		border-radius:4px;
		border: none;
		text-decoration: none;
		text-align: center;
		color: black;
		cursor: pointer;
		padding: 2%;
		margin: 2% 2%;
		background-color: lightcoral;
	}
	.container{
		position: relative;
		padding: 4% 8%;
	}
	.btn:hover{
		background-color: lightgreen;
	}
	a{
		text-decoration: none;
		color: white;
	}
</style>
</head>
<body>
	<h1 style="padding: 2%"> Hostel Management System</h1>
	<div class="nav">
     <?php
     	$forname=$_SESSION['welcome'];
     	$extract=mysqli_query($db,"select * from register where email='$forname'");
     	$name=mysqli_fetch_assoc($extract);
     	$welcome=$name['username'];
     	echo "Welcome  $welcome !";
     ?>
     <a href="logout.php" class="logout">Log Out</a>
	</div>
	<div class="container">
		<button class="btn"><a href="st-web.php">Home</a></button>
		<button class="btn"><a href="p-st.php">View profile</a></button>
		<button class="btn"><a href="changepass-ad.php">Change password</a></button>
		
	</div>
</body>
</html>