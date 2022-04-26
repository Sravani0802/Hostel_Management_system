<?php
include("conn.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> LOGIN</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	body{
			background-image:url("lo-bck.jpeg") ;
			background-repeat: no-repeat;
			background-size: cover;
		}
		.container{
		overflow: hidden;
		padding: 10% 40%;
		position: relative;
		}
		form{
		justify-content: center;
		align-items: center;
		display: flex;
		flex-direction: column;
		}
		.input-field{
		max-width: 280px;
		width: 100%;
		height: 40px;
		background-color: #f0f0f0;
		margin: 10px 0;
		border-radius: 55px;
		display: grid;
		grid-template-columns: 15% 85%;
		}
		.input-field i{
		text-align: center;
		line-height: 40px;
		color: #acacac;
		text-decoration: none;
		}
		.input-field input{
		background: none;
		outline: none;
		border: none;
		line-height: 1;
		font-weight:600 ;
		color: #333;
		}
	    .input-field input::placeholder{
		color: black;
		font-weight: 500;
		}
		.btn{
		border-radius: 8px;
		border: none;
		text-decoration: none;
		text-align: center;
		color: black;
		background-color: lightblue;
		cursor: pointer;
		padding: 6%;
	}
	.button{
		padding:1%;
		border-radius: 4px;
	}
	</style>
</head>
<body>
<form  class="container" method="POST">
	<h2> Login</h2>
	<div class="input-field">
		<i class="fa fa-envelope icon"></i>
		<input type="text" name="email" placeholder="Email">
	</div>
	<div class="input-field">
		<i class="fa fa-key icon"></i>
		<input type="password" name="password" placeholder="Password">
	</div>
	<p>Choose your category:</p>
	<select name="cate">
			<option value="">---SELECT---</option>
			<option value="student">STUDENT</option>
			<option value="warden">WARDEN</option>
			<option value="admin">ADMIN</option>
		</select>
	<br>
	<input class="btn" type="submit" name="submit">
	<span >New Account? <a href="register.php" style="color: blue">Register</a></span>
</form>
	<?php
		
		if(isset($_POST['submit']))
		{
			$email=$_POST["email"];
			$_SESSION['welcome']=$email;
			$password=$_POST["password"];
			$cate=$_POST["cate"];
			$query=mysqli_query($db,"SELECT * FROM register WHERE email='$email' and password='$password' and category='$cate' ");
			$num=mysqli_num_rows($query);
			if($num==0)
			{
	?>
	<div>
		<p>INVAILD EMAIL OR PASSWORD.PLEASE TRY AGAIN."</p>
		<button class="button" type="submit"><a href="login.php">OK</a></button>
	</div>
	<?php	
		}
		else{
	?>
	<div>
	<p>LOGGED IN SUCCESSFULLY."</p>
	<?php
	if($cate=="student")
	{
	?>
	<button class="button" type="submit"><a href="st-web.php">OK</a></button>
	</div>
	<?php
		}
		elseif($cate=="warden")
		{
			
	?>
	<button class="button" type="submit"><a href="war-web.php">OK</a></button>
	<?php
		}
		else{

	?>
	<button class="button" type="submit"><a href="ad-web.php">OK</a></button>
	<?php
			}
		}
	}
	?>
</body>
</html>
