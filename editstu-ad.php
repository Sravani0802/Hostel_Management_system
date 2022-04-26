<?php
include('conn.php');
session_start();
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDIT STUDENT DETAILS</title>
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
	<?php
	$forname=$_SESSION['wel'];
	$extract=mysqli_query($db,"SELECT * from student_details where firstname='$forname' ");
	$ex=mysqli_fetch_assoc($extract);
	?>
	<div style="margin-left:150px;">
		<h3><b>Edit Student Details</b></h3>
		<form method="POST">
			First name : <input type="text" name="fname" value="<?php echo $ex['firstname'] ?>"><br><br>
			Last name : <input type="text" name="lname" value="<?php echo $ex['lastname'] ?>"><br><br>
			Age : <input type="text" name="age" value="<?php echo $ex['age'] ?>"><br><br>
			Gender : <input type="text" name="gender" value="<?php echo  $ex['gender'] ?>">
			Mobile number : <input type="tel" name="phoneno" value="<?php echo  $ex['phone_number'] ?>" ><br><br>
			Father's Mobile No : <input type="tel" name="fatherphone" value="<?php echo $ex['fathermobileno'] ?>" ><br><br>
			Year of studying : <input type="text" name="study" value="<?php echo $ex['yos'] ?>" ><br><br>
			Branch & sec : <input type="text" name="branch" value="<?php echo  $ex['branch'] ?>" ><br><br>
			Fee Due:<input type="big-int" name="feedue" value="<?php echo  $ex['fee due'] ?>"><br><br>
			Address : <input type="text" name="address" value="<?php echo  $ex['address'] ?>" ><br><br>
			<input type="submit" name="submit" style="background-color:lightcoral; border: none; padding: 2%; border-radius: 4%;">
		</form>
		<?php
		if(isset($_POST['submit']))
		{
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$email=$ex['email'];
			$age=$_POST['age'];
			$gender=$_POST['gender'];
			$mobile=$_POST['phoneno'];
			$fathermob=$_POST['fatherphone'];
			$yos=$_POST['study'];
			$branch=$_POST['branch'];
			$address=$_POST['address'];
			$query=mysqli_query($db,"SELECT * from student_details where email='$email' ");
			$num=mysqli_num_rows($query);
			if($num!=0)
			{
				mysqli_query($db,"UPDATE student_details SET firstname='$fname',lastname='$lname',age='$age',gender='$gender',phone_number='$mobile',fathermobileno='$fathermob',year_of_study='$yos',branch='$branch',address='$address' Where email='$email' ");
		?>
		<span style="background-color:lightgrey;"> Changes are Saved.</span>
		<?php
			}
			else{
		?>
				<span style="background-color:lightgrey;">Something went wrong ,Please try again later.</span>
		<?php
			}
		}
		?>
	</div>

</body>
</html>