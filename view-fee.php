<?php
include('conn.php');
session_start();
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>VIEW STUDENT FEE DETAILS</title>
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
		form.example input[type=number]{
			padding: 10px;
			font-size: 17px;
			border: none;
			float: left;
			width: 40%;
			border: 1px solid;
			background: #f1f1f1;	
		}
		form.example button {
  			float: left;
  			width: 10%;
 			padding: 10px;
  			background: limegreen;
  			color: white;
  			font-size: 17px;
  			border: 1px solid;
  			border-left: none;
  			cursor: pointer;
		}
		form.example button:hover{
			background-color: lightseagreen;
		}
		form.example::after {
  			content: "";
  			clear: both;
  			display: table;
		}
		table{
			width: 80%;
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<h1 style="padding: 2%;"> Hostel Management System</h1>
	<div id="navbar">
		<?php
			$forname=$_SESSION['welcome'];
			$extract=mysqli_query($db,"SELECT category from register where email='$forname'");
			$result=mysqli_fetch_assoc($extract);
			if($result['category']=="admin")
			{
		?>
		<a href="ad-web.php" id="home"> Home</a>
		<?php
			}
			else
			{
		?>
		<a href="war-web.php" id="home"> Home</a>
		<?php
			}
		?>		
	</div>
	<div style="margin-left:150px;">
		<form class="example" method="POST">
			<input type="number" name="search" placeholder="search..." ><button type="submit" name="submit"><i class="fa fa-search"></i></button>
		</form>
		<?php
			if(isset($_POST['submit']))
			{
				$search=$_POST['search'];
				$_SESSION['wel']=$search;
				$extract=mysqli_query($db,"SELECT * from student_details where fee due >'$search'");
				$num=mysqli_num_rows($extract);
				if($num==0)
				{
				?>
				<span style="background-color:lightgrey; border: none;text-align: center;">No user found,please try again later.</span>
				<?php
				}
				else{
					$name1=mysqli_fetch_assoc($extract)
				?>
					<table border="1px" cellpadding="8%">
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Age</th>
						<th>Gender</th>
						<th>Mobile no</th>
						<th>Father's Mobile no</th>
						<th>Year of Studing</th>
						<th>Branch</th>
						<th>Fee Due</th>
						<th>Address</th>
					</tr>
					<tr>
				<?php
					echo "<td>".$name1['firstname']."</td>";
   					echo "<td>".$name1['lastname']. "</td>";
    				echo "<td>".$name1['email']. "</td>";
    				echo "<td>".$name1['age']. "</td>";
    				echo "<td>".$name1['gender']. "</td>";
    				echo "<td>".$name1['phone_number']. "</td>";
    				echo "<td>".$name1['fathermobileno']. "</td>";
    				echo "<td>".$name1['year_of_study']. "</td>";
    				echo "<td>".$name1['branch']. "</td>";
    				echo "<td>".$name1['fee due']. "</td>";
    				echo "<td>".$name1['address']. "</td>";
				?>
					</tr>
				</table>
				<?php	
				}
			}
		?>
	</div>
</body>
</html>

