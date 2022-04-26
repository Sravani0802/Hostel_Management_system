<?php
include("conn.php");
session_start();
?>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.container{
		overflow: hidden;
		padding: 8% 24%;
		position: absolute;
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
		padding: 4%;
		}
}
	</style>
</head>
<body>
<div class="container">
	<h2>REGISTER</h2>
	<form method="POST">
		<div class="input-field">
			<i class="fa fa-user icon"></i>
			<input type="text" name="name" placeholder="Username">
		</div>
		<div class="input-field">
			<i class="fa fa-envelope icon"></i>
			<input type="text" name="email" placeholder="Email">
		</div>
		<div class="input-field">
			<i class="fa fa-key icon"></i>
			<input type="password" name="password" placeholder="Password">
		</div>
		<div class="input-field">
			<i class="fa fa-phone icon"></i>
			<input type="tel" name="phone" placeholder="Phone number">
		</div>
		<p>Select your category:</p>
		<select name="cate">
			<option value="">---SELECT---</option>
			<option value="student">STUDENT</option>
			<option value="warden">WARDEN</option>
			<option value="admin">ADMIN</option>
		</select>
		<br>
		<input class="btn" type="submit" name="submit">
		<span>Already have an account?<a href="login.php">Login</a></span>
	</form>
	
	<?php
		
		if(isset($_POST["submit"]))
		{
			$name=$_POST["name"];
			$email=$_POST["email"];
			$_SESSION['welcome']=$email;
			$password=$_POST["password"];
			$phone=$_POST["phone"];
			$cate=$_POST["cate"];
			$query=mysqli_query($db,"SELECT * FROM register WHERE email='$email'");
			$num=mysqli_num_rows($query);
			if($num==0)
			{
			mysqli_query($db,"insert into register(username,email,password,phone_number,category) value('$name','$email','$password','$phone','$cate')");
	?>
	<div>
		<p> SUCCESSFULLY REGISTER</p>
		<button type="submit" class="btn"><a href="login.php">OK </a></button>
	</div>
	<?php
			}
			else
			{
	?>
	<div>
		<p>EMAIL IS ALREADY IN USE,USE ANOTHER ONE."</p>
		<button type="submit" class="btn"><a href="register.php">OK</a></button>
	</div>
	<?php
		}
	}
	?>
</div>
<img src="reg-bck.jpg" align="right" width="700" height="700"  >
</body>
</html>