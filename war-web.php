<?php
	include('conn.php');
	session_start();
?>
<html>
<head>
<title> Hostel Management Warden</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
	.logout:hover{
		text-decoration: underline;
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
	<h1 class="ex"> Hostel Management</h1>
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
	<div>
		<button class="btn"><a href="war-web.php">Home</a></button>
		<button class="btn"><a href="p-st.php">Edit & view profile</a></button>
		<button class="btn"><a href="changepass-ad.php">Change password</a></button>
		<button class="btn"><a href="view-fee.php">Fees Details </a></button>
		
	</div>
</body>
</html>
