<?php
include('conn.php');
session_start();
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>REGISTRATIONS</title>
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
		form.example input[type=text]{
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
		<a href="ad-web.php" id="home"> Home</a>
	</div>
	<div style="margin-left:150px;">
		<form class="example" method="POST">
			<input type="text" name="search" placeholder="search..." ><button type="submit" name="submit"><i class="fa fa-search"></i></button>
		</form>
		<?php
			if(isset($_POST['submit']))
			{
				$search=$_POST['search'];
				$extract=mysqli_query($db,"SELECT * from register WHERE category='$search' ORDER BY date DESC");
				$num=mysqli_num_rows($extract);
				if($num>0)
				{
					echo "<b>"."Total ", $search , "  Registrations : ", $num."</b>" ;
					?>
					<table border="1px" cellpadding="8%">
					<tr>
						<th>Id</th>
						<th>User Name</th>
						<th>Email</th>
						<th>Phone no</th>
					</tr>
					<?php
					while($name1=mysqli_fetch_array($extract))
					{
						echo "<tr>";
						echo "<td>".$name1['id']."</td>";
   						echo "<td>".$name1['username']. "</td>";
    					echo "<td>".$name1['email']. "</td>";
    					echo "<td>".$name1['phone_number']. "</td>";
    					echo "</tr>";
    				}
				?>
				</table>
				<?php
				}
				else{
				?>
				<span style="background-color:lightgrey; border: none;text-align: center;">No registrations found,please try again later.</span>
				<?php	
				}
			}
		?>
	</div>
</body>
</html>