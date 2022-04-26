<?php
include('conn.php');
session_start();
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADD STUDENT DETAILS</title>
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
		#Back{
			top: 180px;
			background-color: lightcoral;
		}
	</style>
</head>
<body>
	<h1 style="padding:2%">Hostel Management System</h1>
	<div id="navbar">
		<a href="ad-web.php" id="home"> Home</a>
		<a href="view-stu-ad.php" id="back">Back</a>
	</div>
	<div style="margin-left:150px;">
		<h3><b>Add New Student Details</b></h3>
		<form method="POST">
			First name : <input type="text" name="fname"><br><br>
			Last name : <input type="text" name="lname"><br><br>
			Email-id : <input type="text" name="email"><br><br>
			Age : <input type="text" name="age"><br><br>
			Gender : <br>
			<input type="radio" name="gender" value="Male">
			<label for="male">Male</label><br>
			<input type="radio" name="gender" value="Female">
			<label for="female">Female</label><br>
			Mobile number : <input type="tel" name="phoneno"><br><br>
			Father's Mobile No : <input type="tel" name="fatherphone"><br><br>
			Year of studying : <input type="text" name="study"><br><br>
			Branch & sec : <input type="text" name="branch"><br><br>
			Fee Due:<input type="number" name="feedue"><br><br>
			Address : <input type="text" name="address"><br><br>
			<input type="submit" name="submit" style="background-color:lightcoral; border: none; padding: 2%; border-radius: 4%;">
		</form>
		<?php
		if(isset($_POST['submit']))
		{
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$email=$_POST['email'];
			$age=$_POST['age'];
			$gender=$_POST['gender'];
			$mobile=$_POST['phoneno'];
			$fathermob=$_POST['fatherphone'];
			$yos=$_POST['study'];
			$branch=$_POST['branch'];
			$fee=$_POST['feedue'];
			$address=$_POST['address'];
			$query=mysqli_query($db,"SELECT * from student_details where email='$email' ");
			$num=mysqli_num_rows($query);
			if($num==0)
			{
				mysqli_query($db,"INSERT into student_details(firstname,lastname,email,age,gender,phone_number,fathermobileno,year_of_study,branch,feedue,address) value('$fname','$lname','$email','$age','$gender','$mobile','$fathermob','$yos','$branch','$fee','$address')");
		?>
		<span style="background-color:lightgrey;"> Student Details are Added.</span>
		<?php
			}
			else{
		?>
				<span style="background-color:lightgrey;">User already exist,try again later.</span>
		<?php
			}
		}
		?>
	</div>

</body>